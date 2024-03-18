<?php
$dsn ="mysql:host=wvulqmhjj9tbtc1w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=vhnv769j2d04wurh";
$username = 'vdmrkq9nc5te7aws';
$password = 'icm3lxx2cxk96pse';

try{
$db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
$error_message = 'Database Error!';
$error_message .= $e->getMessage();
echo $error_message;
include('view/error.php');
exit();
}
