<?php session_start();?>

<?php


unset($_SESSION['customer']);
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$db_name = substr($url["path"], 1);

$db_host = $url["host"];

$user = $url["user"];

$password = $url["pass"];

$dsn = "mysql:dbname=".$db_name.";host=".$db_host;

$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));



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
