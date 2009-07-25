<small>
<?php

include('quotes.php');

// setup db connection
$HOST = "localhost";
$USER = "difamilia";
$PASS = "tetris";
$DB   = "difamilia";

$QUOTE_FILE     = "last_quote.dat";
$QUOTE_TIME_MAX = 12*60*60;

$WRAP_WIDTH = 60;



$con = mysql_connect($HOST, $USER, $PASS)
	or die(mysql_error());

$db  = mysql_select_db($DB)
	or die(mysql_error());


function wrap($s) {
	global $WRAP_WIDTH;
	return wordwrap($s, $WRAP_WIDTH, "\n", true);
}

function quote($s) {
	return 	str_replace("\\n", "\n",
		mysql_real_escape_string(
			    htmlentities(wrap($s), ENT_QUOTES, 'UTF-8')));
}

function insert($name, $msg) {
	if(strlen($msg) > 0 && strlen($name) > 0) {
		$name = quote($name);
		$msg  = quote($msg);
		mysql_query(sprintf("INSERT INTO wpsb_list (time, name, message) ".
				    "VALUES (NOW(), '%s', '%s')", $name, $msg))
			or die(mysql_error());
	}
}


// insert quote
$rndquote = false;
$time = file_get_contents($QUOTE_FILE);
if(time() - $time > $QUOTE_TIME_MAX) {
	shuffle($quotes);
	$name = $quotes[0][0];
	$msg  = $quotes[0][1];
	insert($name, $msg);
	file_put_contents($QUOTE_FILE, time());
}


// insert new message
if(isset($_POST['name']) && isset($_POST['message'])) {
	$name = $_POST['name'];
	$msg  = $_POST['message'];
	insert($name, $msg);
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