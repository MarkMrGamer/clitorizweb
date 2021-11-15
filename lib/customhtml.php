<?php
//custom html script wrote by doom,reusing code from some libraries

function CusHtml_getHtml($username,$placement,$conn) {
	$result;
	$q1 = $conn->prepare("SELECT dhtml FROM clitorizweb_users WHERE username = ?");
	$q1->bind_param("s", $username); 
	$q1->execute();
	
	$res1 = $q1->get_result();
	$dhtml = $res1->fetch_assoc();
	
	$q2 = $conn->prepare("SELECT htmlplacement FROM clitorizweb_users WHERE username = ?");
	$q2->bind_param("i", $username); 
	$q2->execute();
	
	$res2 = $q2->get_result();
	$dhPlace = $res2->fetch_assoc();
	
	if ($dhPlace["htmlplacement"] == $placement) {
		echo $dhtml["dhtml"];
	}
}

?>