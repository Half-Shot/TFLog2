<?
include("../core/config.php");
include("../core/functions.php");
if(!$_SESSION){
session_start();
}
//Make sure to comment this out when done.
$_SESSION['loggedin'] = false;
$_SESSION['username'] = ""; //Reset Session
if(!isset($_REQUEST["user"]) || !isset($_REQUEST["pass"]) || !isset($_REQUEST["page"]) )
{
	echo "Malformed request.";
	return;
}

$username = $_REQUEST["user"];
$pass = $_REQUEST["pass"];
$lastlocation = $_REQUEST["page"];
//Do SQLite Connection
$db = new PDO("sqlite:../" . $databasefile);

if (!$db) die ("Could not find database file :(");

//Check against values
$statement = "SELECT * FROM user_auth WHERE user = " . $db->quote($username);

$query = $db->query($statement);
#if (!$query) die ($db->errorInfo()[2]); 
$result = $query->fetchAll(0);
if(!$result)
{
	$res_url = "login=false&lreason=user";
}
else
{
	if($pass == $result[0]["pass"])
	{
		$res_url = "login=true";
		$_SESSION['username'] = $username;
		$_SESSION['loggedin'] = true;
	}
	else
	{
		$res_url = "login=false&lreason=pass";
	}
	 
}
$header = "../" . $lastlocation . "?"  . $res_url;
$header_str = "Location: " . $header;
header($header_str);
?>

<h2> Logging in...</h2>