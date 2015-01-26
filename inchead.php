<?php
session_start();
$db = mysqli_connect("localhost","root","","juitieee_ppp",3306);
if(!$db){
	die('Connection failed. Terminating session.');
}
?>