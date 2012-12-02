<?php
/*
global $location;
global $cookiearr;
global $ch;

$letters = array();


for($a = 97; $a <= 122; $a++)
{
				$letters[] = chr($a);

}


for($a = 97; $a <= 122; $a++)
{
	for($b = 97; $b <= 122; $b++)
	{
				$letters[] = chr($a).chr($b);
	}
}


for($a = 97; $a <= 122; $a++) 
{
	for($b = 97; $b <= 122; $b++)
	{
		for($c = 97; $c <= 122; $c++)
		{	
				$letters[] = chr($a).chr($b).chr($c);
		}
	}
}


$ch = curl_init();

$count = 0;

$finalskills = array();
$longskills = array();

foreach($letters as $i) {
	curl_setopt($ch, CURLOPT_URL,"http://www.linkedin.com/ta/skill?query=".$i);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADERFUNCTION, 'read_header');
	$html=curl_exec ($ch);
	
	$skilllist = json_decode($html);
	
	foreach($skilllist as $skills){
		foreach($skills as $skill){
				$finalskills[$count] = array('id' => $skill->id, "displayName" => $skill->displayName);
			
			if(strlen($skill->displayName) > 22){
				$longskills[] = array('id' => $skill->id, "displayName" => $skill->displayName);				
			}			
			$count++;
		}
	}

}


// $finalskills = array_unique($finalskills);
// print_r($finalskills);
 sort($finalskills);

echo "<br />Total Skills: " . count($finalskills) . "<br />";

foreach($finalskills as $skill){
	echo $skill['id'] . ' , ' .$skill['displayName'] . "<br />";
}

echo "<br />Total Long Skills: " . count($longskills) . "<br />";

foreach($longskills as $skill){
	echo $skill['id'] . ' , ' .$skill['displayName'] . "<br />";
}


#read_header is essential as it processes all cookies and keeps track of the current location url
function read_header($ch, $string) {
        global $location;
        global $cookiearr;
        global $ch;

        $length = strlen ( $string );
        if (! strncmp ( $string, "Location:", 9 )) {
                $location = trim ( substr ( $string, 9, - 1 ) );
        }
        if (! strncmp ( $string, "Set-Cookie:", 11 )) {
                $cookiestr = trim ( substr ( $string, 11, - 1 ) );
                $cookie = explode ( ';', $cookiestr );
                $cookie = explode ( '=', $cookie [0] );
                $cookiename = trim ( array_shift ( $cookie ) );
                $cookiearr [$cookiename] = trim ( implode ( '=', $cookie ) );
        }
        $cookie = "";
        if (trim ( $string ) == "") {

                curl_setopt ( $ch, CURLOPT_COOKIE, $cookie );
        }

        return $length;
}

*/

?>