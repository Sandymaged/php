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
$soft = $_POST['softdr'];
$f = $_POST['frenchco'];
$n = $_POST['s'];
$d = date("Y/m/d");
$s = "insert into orders(total,note,room,user_id,date,staus,tea,coffe,soft,french)values({$x},'{$y}','{$z}','{$n}','{$d}','processing','{$t}','{$c}','{$soft}','{$f}')";
$stmt = $db->prepare($s);
$stmt->execute();
$up1 = "update products set amount=amount-{$t} where {$t}>0 && product_name='tea'";
$up2 = "update products set amount=amount-{$c} where {$c}>0 && product_name='coffe'";
$up3 = "update products set amount=amount-{$soft} where {$soft}>0 && product_name='soft drink'";
$up4 = "update products set amount=amount-{$f} where {$f}>0 && product_name='french coffe'";

$stmt = $db->prepare($up1);
$stmt->execute();

$stmt = $db->prepare($up2);
$stmt->execute();

$stmt = $db->prepare($up3);
$stmt->execute();

$stmt = $db->prepare($up4);
$stmt->execute();

header("location:index.php");
