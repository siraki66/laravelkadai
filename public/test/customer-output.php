<?php

// $pdo=new PDO("mysql:host=localhost;dbname=phptest;charset=utf8","root","");
// // $sql=$pdo->prepare("insert into test values(null,?,?)");
// $sql=$pdo->prepare("update test set name=?,password=? where id=4");

// if($sql->execute([ $_REQUEST["name"],$_REQUEST["password"] ])){
// 	echo"yes";
// }else{
// 	echo "no";
// }


// if($sql->execute([ $_REQUEST["name"],$_REQUEST["password"] ])){
// 	echo "insert ";

// }else{
// 		echo "miss";
// }



$pdo=new PDO("mysql:host=localhost;dbname=phptest;charset=utf8","root","");
$sql=$pdo->query("delete from test where id=4")

?>