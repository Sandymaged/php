<?php
$dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
$user = 'root';
$password = '';
$db = new PDO($dsn, $user, $password);
$x = (int) $_POST['total'];
$y = $_POST['note'];
$d = date("Y/m/d");
$s = "insert into orders(amount,note,user_id,date)values({$x},'{$y}',1,'{$d}')";
$stmt = $db->prepare($s);
$stmt->execute();
header("location:index.php");
