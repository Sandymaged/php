<?php
$dsn = 'mysql:dbname=cafeteria;host=127.0.0.1;port=3306;';
$user = 'root';
$password = '';
$db = new PDO($dsn, $user, $password);
$x = (int) $_POST['total'];
$z = (int) $_POST['room'];
$y = $_POST['note'];
$t = $_POST['tea'];
$c = $_POST['coffe'];
$s = $_POST['softdr'];
$f = $_POST['frenchco'];
//$n = $_POST['nn'];
//var_dump($n);
$d = date("Y/m/d");
$s = "insert into orders(total,note,room,user_id,date,staus,tea,coffe,soft,french)values({$x},'{$y}','{$z}',1,'{$d}','ss','{$t}','{$c}','{$s}','{$f}')";
$stmt = $db->prepare($s);
$stmt->execute();
header("location:index.php");
