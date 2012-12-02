<?php

class Hooks {
    static function user_login_endOK($liConn) {
        $user = getUser($_SESSION['linkedinId']);

        if ($user == null) {
            $liUser = getLinkedinUser($liConn);

            $skills = null;
            if (property_exists($liUser, "skills")){
                $skills = $liUser->skills;
            }

            insertUser($liUser->id, $liUser->{'first-name'}, $liUser->{'last-name'}, $liUser->headline,
                $liUser->location->name, $liUser->{'picture-url'}, $liUser->{'public-profile-url'}, $liUser->positions, $skills);

            $user = getUser($_SESSION['linkedinId']);

            
            // synch linkedin friends
            $friends = getLIFriends();
            foreach ($friends as $friend) {
                // TODO isto n está já a ser feito no updateUserFriendsFromLi ?
                // TODO optimizar pedidos ao linkedin
                // see if friend is registered in app
                $friendsInDb = select("select id, linkedin_id from users where linkedin_id = ?", array($friend));
                if (count($friendsInDb) > 0) {
                    insert("insert into users_friends (user_li_id, friend_li_id) VALUES(?,?) ",
                        array($_SESSION['linkedinId'], $friend));
                }
            } 

        }

        $_SESSION['userId'] = $user['id'];
        $_SESSION['user'] = $user;
        $_SESSION['authorized'] = true;

        updateUserFriendsFromLi();
    }

    static function user_registered_endOK(){
    	$user = getUser($_SESSION['linkedinId']);
        $_SESSION['userId'] = $user['id'];
        $_SESSION['user'] = $user;
        $_SESSION['authorized'] = true;    	        
    }
}

?>