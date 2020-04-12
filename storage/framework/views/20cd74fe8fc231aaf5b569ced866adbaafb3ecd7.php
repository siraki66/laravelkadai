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
      
    header('Location: http://192.168.33.10:8000/');
    exit();
}

else{
        $_SESSION['miss']="ログイン名またはパスワードが違います";

header('Location: http://192.168.33.10:8000/posts/login');
    exit();
}
?>
<?php /**PATH /home/vagrant/laravel_lessons_copy_laravel/myblog/resources/views/posts/login_output.blade.php ENDPATH**/ ?>