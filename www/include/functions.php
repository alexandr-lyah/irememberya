<?php


function retrieveRandomConnection($linkedinId){
	
   $randomuser = '';
   do{
	   $randomuser = select("SELECT friend_li_id FROM users_friends uf, users u WHERE uf.friend_li_id = u.linkedin_id and pictureUrl not like '%no_photo%' and user_li_id = ? and headline like '% at %' and done = 0 ORDER BY RAND() LIMIT 0,1", array($linkedinId));
	   $randomuserId = $randomuser[0]['friend_li_id'];
	   $user1 = getUserLimited($randomuserId);
	   $user1Final = array();
	   $user1Final['pic'] = $user1['pictureUrl']; 
	   $pieces = explode(" at ", $user1['headline']);
	   $user1Final['name'] = $user1['firstname']. ' '. $user1['lastname'];
	   $user1Final['job'] = $pieces[0];
	   $user1Final['company'] = $pieces[1];
   }while(isset($user1Final['pic']) && ($user1Final['pic'] == null || $user1Final['pic'] == ''));
      
   update("update users_friends set done = 1 where friend_li_id = ? and user_li_id = ? ", array($randomuser[0]['friend_li_id'],$linkedinId));

   $randomuser2 = '';
   do{
   		$randomuser2 = select("SELECT friend_li_id FROM users_friends uf, users u WHERE uf.friend_li_id = u.linkedin_id and pictureUrl not like '%no_photo%' and user_li_id = ? and headline like '% at %' and friend_li_id <> ? ORDER BY RAND() LIMIT 0,1", array($linkedinId, $randomuserId));
   		$randomuserId2 =  $randomuser2[0]['friend_li_id'];
   		$user2 = getUserLimited($randomuserId2);
   		$user2Final = array();
	   $user2Final['pic'] = $user2['pictureUrl']; 
	   $pieces = explode(" at ", $user2['headline']);
	   $user2Final['job'] = $pieces[0];
	   $user2Final['company'] = $pieces[1];   
   
   }while(isset($user2Final['pic']) && ($user2Final['pic'] == null || $user2Final['pic'] == ''));
 
   $users = array("cool" => $user1Final, "notcool" => $user2Final);
   
   return json_encode($users);
}

function getUserLimited($linkedinId) {
    $users = select("SELECT firstname, lastname, pictureUrl, publicProfileUrl, headline FROM users WHERE linkedin_id = ? and headline like '% at %'", array($linkedinId));
    if (count($users) > 0) {
        return $users[0];
    }

    return null;
}





function checkPermissions() {
    global $salt;

    $loggedIn = true;

    if (!isset($_SESSION['oauth']) || !isset($_SESSION['oauth']['linkedin']) ||
            !isset($_SESSION['oauth']['linkedin']['authorized']) ||
            $_SESSION['oauth']['linkedin']['authorized'] == false) {
        $loggedIn = false;
    }

    if (!isset($_SESSION['userId']) || !isset($_SESSION['authorized']) || !$_SESSION['authorized']) {
        $loggedIn = false;
    }

    if (!$loggedIn) {
        // get url I was trying to access
        $url = $_SERVER["PHP_SELF"];
        $vars = $_SERVER["QUERY_STRING"];

        // Get filename I was trying to access
        $file = explode("/", $url);
        $file = $file[count($file) - 1];

        // check if filename is in whitelist
        $a = whitelistFile($file);
        if ($a === true) {
            $toEncode = $salt . $file;
            $toEncode .= (empty($vars)) ? ('') : urlencode('?' . $vars);
            $url_safe = '?nextu=' . base64_encode($toEncode);
        }
        else {
            $url_safe = '';
        }

        header("Location: login.php" . $url_safe);
        exit();
    }

    return true;
}

function isLoggedIn() {
    if (isset($_SESSION['userId']) && isset($_SESSION['authorized']) && $_SESSION['authorized']) {
        return true;
    }
    return false;
}

function whitelistFile($file) {
    global $whitelistfiles;

    $whitelist = $whitelistfiles;

    if (array_search($file, $whitelist) === false) {
        return false;
    }

    return true;
}

/* ------------------------------------------------------------------------------------------------------------------ */
function getUser($linkedinId) {
    $users = select("SELECT * FROM users WHERE linkedin_id = ?", array($linkedinId));
    if (count($users) > 0) {
        return $users[0];
    }

    return null;
}

function getUserId($linkedinId){
    $users = select("SELECT id FROM users WHERE linkedin_id = ?", array($linkedinId));
    if (count($users) > 0) {
        return $users[0]['id'];
    }

    return null;
}

function getUserByUsername($username) {
    $users = select("SELECT * FROM users WHERE username = ?", array($username));
    if (count($users) > 0) {
        return $users[0];
    }

    return null;
}

function isValidUsername($username, $id) {
    $users = select("SELECT * FROM users WHERE username = ? and id <> ?", array($username, $id));
    if (count($users) > 0) {
        return $users[0];
    }

    return null;
}

function getUserById($id) {
    $users = select("SELECT * FROM users WHERE id = ?", array($id));
    if (count($users) > 0) {
        return $users[0];
    }

    return null;
}

function userExists($linkedinId) {
    $users = select("SELECT linkedin_id FROM users WHERE linkedin_id = ?", array($linkedinId));
    if (count($users) > 0) {
        return true;
    }
    return false;
}


function insertUser($linkedinId, $firstName, $lastName, $headline, $location, $pictureUrl, $publicProfileUrl,
                    $positions, $skills = null) {
    $firstName = trim($firstName);
    $lastName = trim($lastName);

    if (empty($firstName) && empty($lastName)) {
        logAppError("Tried to INSERT user with empty firstname and empty last name. app user id: " .
                $_SESSION['userId'] . " | Data: " . $linkedinId . "," . $firstName . "," . $lastName . "," .
                $headline . "," . $location . "," . $pictureUrl . "," . $publicProfileUrl . "," . $skills);
        return;
    }

    insert("INSERT INTO users (linkedin_id, firstname, lastname, headline, location, pictureUrl, publicProfileUrl, createdAt)
            VALUES(?,?,?,?,?,?,?, NOW())",
        array($linkedinId, $firstName, $lastName, $headline, $location, $pictureUrl, $publicProfileUrl));

    $userId = lastInsertedId();

    if (!empty($skills)) {
        foreach ($skills->skill as $s) {
            insert("INSERT INTO skillslinkedin (user_linkedin_id, skill, proficiency, years) VALUES (?,?,?,?)",
                array($linkedinId, $s->skill->name, $s->proficiency->name, $s->years->name));
        }
    }

    if (!empty($positions)) {
        foreach ($positions->position as $position) {
            $company = getCompany($position->company->name);
            $companyId = $company['id'];
            if ($company == null) {
                $companyId = insertCompany($position->company);
            }
            insertPosition($position, $userId, $companyId);
        }
    }
}

function updateUser($linkedinId, $firstName, $lastName, $headline, $location, $pictureUrl, $publicProfileUrl,
                    $positions, $skills = null) {
    $firstName = trim($firstName);
    $lastName = trim($lastName);

    if (empty($firstName) && empty($lastName)) {
        logAppError("Tried to UPDATE user with empty firstname and empty last name. app user id: " .
                $_SESSION['userId'] . " | Data: " . $linkedinId . "," . $firstName . "," . $lastName . "," .
                $headline . "," . $location . "," . $pictureUrl . "," . $publicProfileUrl . "," . $skills);
        return;
    }

    update("UPDATE users SET firstname = ?, lastname = ?, headline = ?, location = ?, pictureUrl = ?,
            publicProfileUrl = ? WHERE linkedin_id = ?",
        array($firstName, $lastName, $headline, $location, $pictureUrl, $publicProfileUrl, $linkedinId));
    $userId = lastInsertedId();

    // delete all old skills of user
    delete("DELETE FROM skillslinkedin where user_linkedin_id = ?", array($linkedinId));

    // delete all old positions
    delete("DELETE FROM positions where user_id = ?", array($userId));

    if (!empty($skills)) {
        foreach ($skills->skill as $s) {
            insert("INSERT INTO skillslinkedin (user_linkedin_id, skill, proficiency, years) VALUES (?,?,?,?)",
                array($linkedinId, $s->skill->name, $s->proficiency->name, $s->years->name));
        }
    }

    if (!empty($positions)) {
        foreach ($positions->position as $position) {
            $company = getCompany($position->company->name);
            $companyId = $company['id'];
            if ($company == null) {
                $companyId = insertCompany($position->company);
            }
            insertPosition($position, $userId, $companyId);
        }
    }
}

function updateUserLastLogin($userId) {
    update("update users set friendsLastUpdate = NOW(), lastLoginAt = NOW() where id = ?", array($userId));
}

function parseLIUser($person) {
    // Add default image if picture url is empty
    if ($person->{'picture-url'} == '') {
        $person->{'picture-url'} = 'tpl/img/icon_no_photo_80x80.png';
    }
    // Add Search if public profile is not available
    if ($person->{'public-profile-url'} == '') {
        $person->{'public-profile-url'} =
                'http://www.linkedin.com/search/fpsearch?type=people&keywords=' . $person->{'first-name'} . "+" .
                        $person->{'last-name'};
    }
    return $person;
}

function getSkills($from, $to) {
    $skills = select("SELECT * FROM skills WHERE from_id = ? and to_id = ?", array($from, $to));
    if (count($skills) > 0) {
        return $skills[0];
    }

    return null;
}

function getCompany($name) {
    $company = select("SELECT * FROM companies WHERE name = ?", array($name));

    if (count($company) > 0) {
        return $company[0];
    }

    return null;
}

function getCompaniesPopularUser($linkedin_id, $limit = -1, $orderBycount = true) {
    $limitQ = '';
    if ($limit != -1){
        $limit = (int) $limit;
        $limitQ = ' LIMIT '. $limit;
    }

    if ($orderBycount){
        $order = ' 3 ';
    }
    else{
        $order = ' 2 ';
    }
    $companies = select("SELECT c.id, c.name, count(distinct u.id) as 'count'
                FROM  `users_friends` uf
                    JOIN users u ON u.linkedin_id = uf.friend_li_id, companies c, positions p
                WHERE p.user_id = u.id
                    AND p.company_id = c.id
                    AND uf.user_li_id = ?
                GROUP BY c.id
                ORDER BY $order desc" . $limitQ, array($linkedin_id));
    if (count($companies) > 0) {
        uasort($companies, 'sortCompaniesByName');
        return $companies;
    }

    return null;
}

function insertPosition($position, $userId, $companyId) {
    $startDate = null;
    $endDate = null;

    if (property_exists($position, "start-date")) {
        if (property_exists($position->{'start-date'}, "month")) {
            $month = (int) $position->{'start-date'}->month;
        }
        else {
            $month = 1;
        }
        if (property_exists($position->{'start-date'}, "year")) {
            $year = (int) $position->{'start-date'}->year;
        }
        else {
            $year = 1970;
        }
        $startDate = mktime(0, 0, 0, $month, 1, $year, 0);
        $startDate = date("Ymd", $startDate);
    }
    if (property_exists($position, "end-date")) {
        if (property_exists($position->{'end-date'}, "month")) {
            $month = (int) $position->{'end-date'}->month;
        }
        else {
            $month = 1;
        }
        if (property_exists($position->{'end-date'}, "year")) {
            $year = (int) $position->{'end-date'}->year;
        }
        else {
            $year = 1970;
        }
        $endDate = mktime(0, 0, 0, $month, 1, $year, 0);
        $endDate = date("Ymd", $endDate);
    }

    insert("INSERT INTO positions
        (user_id, company_id, linkedin_id, title, summary, startdate, endDate, isCurrent, createdAt) VALUES
        (?,?,?,?,?,?,?,?,NOW())",
        array($userId, $companyId, $position->id, $position->title, $position->summary, $startDate, $endDate,
            ($position->{'is-current'} == "true" ? 1 : 0)));
}

function insertCompany($companyLiObject) {
    $name = $companyLiObject->name;
    $type = property_exists($companyLiObject, "type") ? $companyLiObject->type : null;
    $size = property_exists($companyLiObject, "size") ? $companyLiObject->size : null;
    $industry = property_exists($companyLiObject, "industry") ? $companyLiObject->industry : null;
    $ticker = property_exists($companyLiObject, "ticker") ? $companyLiObject->ticker : null;

    insert("INSERT INTO companies (name, type, size, industry, ticker, createdAt) VALUES (?,?,?,?,?, NOW())",
        array($name, $type, $size, $industry, $ticker));

    return lastInsertedId();
}

/*---- Validations --------- */
function check_email_address($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
            $local_array[$i])) {
            return false;
        }
    }
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}

function insertFriend($toUserLiId) {
    insert("insert into users_friends (user_li_id, friend_li_id) VALUES (?,?)", array($_SESSION['linkedinId'],
        $toUserLiId));
}

function isFriend($toUserLiId) {
    $friends = select("select * from users_friends WHERE user_li_id = ? AND friend_li_id = ?",
        array($_SESSION['linkedinId'], $toUserLiId));

    if (count($friends) > 0) {
        return true;
    }

    return false;
}

function updateUserFriendsFromLi($userLiId = -1) {

    if ($userLiId == -1) {
        $user = $_SESSION['user'];
    }
    else {
        $user = getUser($userLiId);
    }

    if (empty($user['friendsLastUpdate'])) {
        // first time user enters 3s
        $liFriends = getLIFriendsData();
    }
    else {
        $liFriends = getLIFriendsData(strtotime($user['friendsLastUpdate']));
    }

    foreach ($liFriends as $friend) {
        if (!userExists($friend['linkedin_id'])) {
            // add user
            insertUser($friend['linkedin_id'], $friend['firstname'], $friend['lastname'], $friend['headline'],
                $friend['location'], $friend['pictureUrl'], $friend['profile'], $friend['positions'],
                $friend['skills']);
        } else {
            // if user exists, it was updated
            updateUser($friend['linkedin_id'], $friend['firstname'], $friend['lastname'], $friend['headline'],
                $friend['location'], $friend['pictureUrl'], $friend['profile'], $friend['positions'],
                $friend['skills']);
        }

        // check if friendship exists, otherwise add it
        if (!isFriend($friend['linkedin_id'])) {
            insertFriend($friend['linkedin_id']);
        }
    }

    updateUserLastLogin($user['id']);
}

function getFriends($activeInApp = true, $limit = 10, $linkedInId = -1) {
    $linkedInId = ($linkedInId === -1) ? $_SESSION['linkedinId'] : $linkedInId;
    $limit = (int) $limit;

    return select("select uf.friend_li_id AS linkedin_id, uf.user_li_id, u.id, u.firstname, u.lastname, u.pictureUrl from users_friends uf, users u
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id AND
            3sactive = ? LIMIT $limit",
        array($linkedInId, $activeInApp ? 1 : 0));
}


function getAllFriends($linkedInId, $limit = -1, $random = false) {
    $order = " ORDER BY u.firstname, u.lastname desc ";

    if ($limit === -1) {
        $sql = "select uf.user_li_id, u.* from users_friends uf, users u
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id";
    }
    else {
        $limit = (int) $limit;
        $sql = "select uf.user_li_id, u.* from users_friends uf, users u
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id";
        if ($random) {
            $order = " ORDER BY RAND() LIMIT $limit";
        }
        else {
            $order .= " LIMIT $limit";
        }
    }
    return select($sql . $order, array($linkedInId));
}

function getAllFriendsByCompany($userId, $companyId, $onlyFriendsWithSkillsNotGiven = false, $limit = -1, $random = false) {
    $order = " ORDER BY u.firstname, u.lastname desc ";
    $filter = "";
    if ($onlyFriendsWithSkillsNotGiven) {
        $filter = " AND u.id NOT IN (
            select s.to_id from users_friends uf, users u join
            skills s on s.to_id = u.id
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id)";
    }

    if ($limit === -1) {
        $sql = "select distinct uf.user_li_id, u.linkedin_id, u.pictureUrl, u.firstname, u.lastname
            from users_friends uf, positions p, companies c, users u left join skills s on s.to_id = u.id
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id
            AND p.user_id = u.id AND p.company_id = c.id AND c.id = ?" . $filter;
    }
    else {
        $limit = (int) $limit;
        $sql = "select distinct uf.user_li_id, u.linkedin_id, u.pictureUrl, u.firstname, u.lastname
            from users_friends uf, positions p, companies c, users u left join skills s on s.to_id = u.id
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id
            AND p.user_id = u.id AND p.company_id = c.id AND c.id = ? " . $filter;
        if ($random) {
            $order = " ORDER BY RAND() LIMIT $limit";
        }
        else {
            $order .= " LIMIT $limit";
        }
    }

    if ($onlyFriendsWithSkillsNotGiven) {
        return select($sql . $order, array($userId, $companyId, $userId));
    }

    return select($sql . $order, array($userId, $companyId));
}

function getAllFriendsAndSkillsGiven($linkedInId, $limit = -1, $random = false) {
    $order = " ORDER BY u.firstname, u.lastname desc ";

    if ($limit === -1) {
        $sql = "select uf.user_li_id, u.*, s.skill1 from users_friends uf, users u left join skills s on s.to_id = u.id
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id
            AND (s.id = (SELECT id FROM skills WHERE to_id = u.id LIMIT 1) OR s.id IS NULL) ";
    }
    else {
        $limit = (int) $limit;
        $sql = "select uf.user_li_id, u.*, s.skill1 from users_friends uf, users u left join skills s on s.to_id = u.id
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id
            AND (s.id = (SELECT id FROM skills WHERE to_id = u.id LIMIT 1) OR s.id IS NULL) ";
        if ($random) {
            $order = " ORDER BY RAND() LIMIT $limit";
        }
        else {
            $order .= " LIMIT $limit";
        }
    }
    return select($sql . $order, array($linkedInId));
}

function getRandomFriend($linkedInId) {
    return select("select u.* from users_friends uf, users u
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id ORDER BY RAND() LIMIT 1",
        array($linkedInId));
}

function getAllActiveFriends($linkedInId) {
    return select("select uf.user_li_id, u.* from users_friends uf, users u
            WHERE uf.user_li_id = ? AND uf.friend_li_id = u.linkedin_id AND u.3sactive = 1",
        array($linkedInId));
}

function getSkillsReceived($userId) {
    return select("
	    	select  u.*,s.*
	    	from skills s, users u where s.to_id = ? and s.from_id = u.id order by s.id desc
	    	", array($userId));
}

function getSkillsSent($userId) {
    return select("
	    	select  u.*,s.*
	    	from skills s, users u where s.from_id = ? and s.to_id = u.id order by s.id desc
	    	", array($userId));
}

function sentSkillsTo($userIdFrom, $userIdTo) {
    $skills = select("select * from skills s where s.from_id = ? and s.to_id = ? order by s.id desc
	    	", array($userIdFrom, $userIdTo));
    if (count($skills) > 0) {
        return true;
    }
    return false;
}

function getTopSkills($userId) {
    $sql = "select skill, count(skill) as count from ((select skill1 as skill from skills where to_id = :id)
	union all
	(select skill2 as skill from skills where to_id = :id)
	union all
	(select skill3 as skill from skills where to_id = :id)
	) AS b group by b.skill order by 2 desc limit 10";

    return select($sql, array(':id' => $userId));
}

function getTopSkillsGiven($userId) {
    $sql = "select skill, count(skill) as count from ((select skill1 as skill from skills where from_id = :id)
	union all
	(select skill2 as skill from skills where from_id = :id)
	union all
	(select skill3 as skill from skills where from_id = :id)
	) AS b group by b.skill order by 2 desc limit 10";

    return select($sql, array(':id' => $userId));
}

function getSkillsLinkedIn($linkedinId) {
    select("select * from skillslinkedin WHERE user_linkedin_id = ? ORDER by RAND() LIMIT 3", array($linkedinId));
}

function sendInvitation($linkedinId, $name) {
    update("update users_friends set invitation_sent = 1 where user_li_id = ? and friend_li_id = ? ",
        array($_SESSION['linkedinId'], $linkedinId));

    sendMessage($linkedinId, $name . ', what are your Top 3 Skills?',
        "Hello $name,

            If you want to know your Top 3 Skills, just go to http://Top3Skills.com and kindly ask your connections to write the Top 3 Skills and professional strengths that best describe you.

            What is great here is that if your connections write down that you are really skilled at something, you'll make your way up to the top of the Leaderboards. This will certainly increase your chances of receiving job offers and getting a better (paid) job or, from another point of view, this can be the perfect statement to ask your boss for a raise.

            
            And always remember to write back to your connections.
            Politeness is a great skill.
            ");
}

function invitationSent($linkedinId) {
    return select("select * from users_friends WHERE user_li_id = ? and friend_li_id = ? and invitation_sent = 1",
        array($_SESSION['linkedinId'], $linkedinId));
}


/********
 * FUNCTIONS FOR STATISTICS
 */

function getConnectionsTopSkills($linkedinId) {
    $sql = "select skill, count(skill) as count from (
    (select skill1 as skill from skills where to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id) )
	union all
	(select skill2 as skill from skills where to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id) )
	union all
	(select skill3 as skill from skills where to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id) )
	) AS b group by b.skill order by 2 desc limit 10";

    return select($sql, array(':id' => $linkedinId));
}

function mostReferencedConnections($linkedinId) {
    $sql = "select concat(u.firstname, ' ',u.lastname), count(s.skill1), u.*  from skills s, users u where s.to_id = u.id and to_id in
	(select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id) 
	group by u.id order by 2 desc limit 10";

    return select($sql, array(':id' => $linkedinId));
}

function getSharedSkillsGraph($skills, $linkedinId) {

    $connskills = array();
    $sharedSkillsExist = false;

    foreach ($skills as $skill) {
        $sql = "select distinct u.firstname, u.lastname,u.linkedin_id  from skills s, users u where s.to_id = u.id and (s.skill1 = :skill OR s.skill2 = :skill OR s.skill3 = :skill ) and to_id in
	(select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id)";

        $sskills = select($sql, array(':id' => $linkedinId, 'skill' => $skill['skill']));

        if (!empty($sskills)) {
            $connskills[] = array('skill' => $skill['skill'], 'conns' => $sskills);
            $sharedSkillsExist = true;
        }
    }

    if (!$sharedSkillsExist) {
        $connskills = '';
    }

    return $connskills;
}

function getAllConnectionsSkills($linkedinId) {
    $sql = "select concat(u.firstname, ' ',u.lastname), s.skill1 from skills s, users u where s.to_id = u.id and to_id in
	(select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id)";

    return select($sql, array(':id' => $linkedinId));
}

function getAllConnectionsSkillsSent($linkedinId) {
    $sql = "select concat(u.firstname, ' ',u.lastname), s.skill1 from skills s, users u where s.from_id = u.id and from_id in
	(select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id)";

    return select($sql, array(':id' => $linkedinId));
}

function getRandomSkillFromDefaults() {
    require_once('../skillsHint.php');
    $i = rand(0, count($items) - 1);
    $randomSkills = array();
    $randomSkills[] = $items[$i];
    $i = rand(0, count($items) - 1);
    $randomSkills[] = $items[$i];
    $i = rand(0, count($items) - 1);
    $randomSkills[] = $items[$i];
    return $randomSkills;
}

function getSystemTopSkills() {
    $sql = "select skill, count(skill) as count from (
    (select skill1 as skill from skills)
	union all
	(select skill2 as skill from skills)
	union all
	(select skill3 as skill from skills)
	) AS b group by b.skill order by 2 desc limit 10";

    return select($sql, array());
}

function countActiveUsers() {
    $sql = "select count(*)  as count from users where 3sactive = 1";
    return select($sql, array());
}

function countConnections() {
    $sql = "select count(*)  as count from users_friends";
    return select($sql, array());
}

function countTotalSkills() {
    $sql = "select count(*)  as count from skills";
    return select($sql, array());
}

function countDifferentSkills() {
    $sql = "select count(distinct s.skill) as count from (
    (select skill1 as skill from skills) 
	union all
	(select skill2 as skill from skills)
	union all
	(select skill3 as skill from skills)) s";
    return select($sql, array());
}

function countDifferentCities() {
    $sql = "select count(distinct location)  as count from users";
    return select($sql, array());
}

/****
 * Leaderboards
 */
function doSearch($skill, $location, $connsonly, $linkedinId) {

    // Search only for Connections
    if ($connsonly) {
        if ($skill != '' && $location == '') { //Skill, No Location
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.skill1 = :skill and s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id) )
			union all
			(select u.* as id from skills s, users u where s.skill2 = :skill and s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.skill3 = :skill and s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':skill' => $skill, ':id' => $linkedinId));
        }
        elseif ($skill != '' && $location != '') { // Location and Skill
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.skill1 = :skill and s.to_id = u.id and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.skill2 = :skill and s.to_id = u.id  and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.skill3 = :skill and s.to_id = u.id  and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':skill' => $skill, ':loc' => $location, ':id' => $linkedinId));
        }
        elseif ($skill == '' && $location != '') { // No Skill, Location
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.to_id = u.id and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id  and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id  and u.location = :loc and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':loc' => $location, ':id' => $linkedinId));
        }
        elseif ($skill == '' && $location == '') { // No location, No Skill
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id and to_id in (select u.id from users_friends uf, users u WHERE uf.user_li_id = :id AND uf.friend_li_id = u.linkedin_id))	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':id' => $linkedinId));
        }
    }
    else { // Every users
        // Search without Location

        if ($skill != '' && $location == '') { //Skill, No Location
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.skill1 = :skill and s.to_id = u.id)
			union all
			(select u.* as id from skills s, users u where s.skill2 = :skill and s.to_id = u.id)
			union all
			(select u.* as id from skills s, users u where s.skill3 = :skill and s.to_id = u.id)	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':skill' => $skill));
        }
        elseif ($skill != '' && $location != '') { //Skill, Location
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.skill1 = :skill and s.to_id = u.id and u.location = :loc)
			union all
			(select u.* as id from skills s, users u where s.skill2 = :skill and s.to_id = u.id  and u.location = :loc)
			union all
			(select u.* as id from skills s, users u where s.skill3 = :skill and s.to_id = u.id  and u.location = :loc)	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':skill' => $skill, ':loc' => $location));
        }
        elseif ($skill == '' && $location != '') { // No Skill, Location
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.to_id = u.id and u.location = :loc )
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id  and u.location = :loc )
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id  and u.location = :loc )	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array(':loc' => $location));
        }
        elseif ($skill == '' && $location == '') { // No location, No Skill
            $sql = "select count(id) as ref, u.* from (
		    (select u.* as id from skills s, users u where s.to_id = u.id )
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id )
			union all
			(select u.* as id from skills s, users u where s.to_id = u.id )	
			) AS u group by id order by 1 desc limit 20";

            return select($sql, array());
        }
    }

    return '';
}

function createChartTicker($maxvalue) {

    if ($maxvalue == 0) {
        return '';
    }

    // Get multiplier
    $mult = 0;
    $CONSTANT = 20;

    if ($maxvalue < 5) {
        $mult = 1;
    } else if ($maxvalue < 5) {
        $mult = 2;
    } else {
        $mult = (int) (($maxvalue + $CONSTANT) / 10);
    }

    $ticker = '[';
    for ($i = 0; ; $i += $mult) {
        $ticker .= $i . ",";
        if ($i > $maxvalue) {
            break;
        }
    }
    $ticker = substr($ticker, 0, -1);
    $ticker .= "]";

    return $ticker;
}


function getDistinctCities($input) {
    $sql = "select distinct location from users where location like ? order by location asc";
    return select($sql, array("%" . $input . "%"));
}


function isTaskComplete($userId, $taskId) {
    $task = select("SELECT * FROM users_tasks WHERE user_id = ? and task_id = ?", array($userId, $taskId));
    if (count($task) > 0) {
        return true;
    }
    return false;
}

function completeTask($userId, $taskId) {
    if (!isTaskComplete($userId, $taskId)) {
        insert("insert into users_tasks (user_id, task_id) VALUES (?,?)", array($userId, $taskId));
    }
}

function completeTasks($userId, $level = 1) {
    $tasks =
            select("SELECT t.description FROM users_tasks ut, tasks t WHERE ut.user_id = ? and ut.task_id = t.id and t.level = ?",
                array($userId, $level));

    if (count($tasks) > 0) {
        return $tasks;
    }
    return '';
}

function incompleteTasks($userId, $level = 1) {
    $tasks =
            select("SELECT description FROM tasks WHERE id not in (SELECT task_id FROM users_tasks ut WHERE ut.user_id = ? ) and level = ? ",
                array($userId, $level));

    if (count($tasks) > 0) {
        return $tasks;
    }
    return '';
}

function sortCompaniesByName($a, $b){
    return strcmp($a['name'], $b['name']);
}

?>