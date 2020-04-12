<?php session_start(); ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=phptest;charset=utf8', 
	'root', '');



foreach($pdo->query("select*from test") as $row ){
    echo $row["name"];
}
?>

