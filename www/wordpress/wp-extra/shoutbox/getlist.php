<small>
<?php

// setup db connection
$HOST = "localhost";
$USER = "difamilia";
$PASS = "tetris";
$DB   = "difamilia";

$con = mysql_connect($HOST, $USER, $PASS)
	or die(mysql_error());

$db  = mysql_select_db($DB)
	or die(mysql_error());


function quote($s) {
	return mysql_real_escape_string(
		htmlentities($s, ENT_QUOTES, 'UTF-8'));
}


if(isset($_POST['name']) && isset($_POST['message'])) {
	$name = quote($_POST['name']);
	$msg  = quote($_POST['message']);
	if(strlen($msg) > 0 && strlen($name) > 0) {
		mysql_query(sprintf("INSERT INTO wpsb_list (time, name, message) ".
				    "VALUES (NOW(), '%s', '%s')", $name, $msg))
			or die(mysql_error());
	}
}


// fetch last 10 messages
$list = array();
$result = mysql_query(
	"SELECT * FROM wpsb_list ORDER BY id DESC LIMIT 10")
	or die(mysql_error());

while ($row = mysql_fetch_assoc($result)) {
	printf("%s: %s<br/>", $row['name'], $row['message']);
}


// close db connection
mysql_close($con);


?>
</small>