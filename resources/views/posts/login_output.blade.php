<?php session_start();?>

<?php


unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');


$sql=$pdo->prepare('select * from customer where email=? and password=?');

$sql->execute([$_REQUEST['email'], $_REQUEST['password']] );


foreach($sql->fetchAll() as $row){
$_SESSION['customer']=[

    'id'=>$row['id'], 'name'=>$row['name'],
    'email'=>$row['email'],
    'password'=>$row['password'] ];
    
}

if (isset($_SESSION['customer'])){
      
    header('Location: https://laravel242342.herokuapp.com/');
    exit();
}

else{
        $_SESSION['miss']="ログイン名またはパスワードが違います";

header('Location: https://laravel242342.herokuapp.com/posts/login');
    exit();
}
?>
