<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




<?php

// db proof-of-concept
// connecting to old db for my class last semester
// prints out everything from the "Items"

$user= "csciremote";
$pass= "";
try {
    $db = new PDO('mysql:host=23.236.194.106:3306;dbname=itec305', $user, $pass);
    foreach($db->query('SELECT * FROM trivia1') as $row) {
        print_r($row);
        ?><br><?php
    }
    $db = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>


</body>
</html>
