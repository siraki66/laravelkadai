<?php session_start(); ?>

<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$db_name = substr($url["path"], 1);

$db_host = $url["host"];

$user = $url["user"];

$password = $url["pass"];

$dsn = "mysql:dbname=".$db_name.";host=".$db_host;

$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));



if (isset($_SESSION['customer'])) {
    $id = $_SESSION['customer']['id'];
    $sql = $pdo->prepare('select * from customer where id!=? and email=?');
    $sql->execute([$id, $_REQUEST['email']]);
} else {
    $sql = $pdo->prepare('select * from customer where email=?');
    $sql->execute([$_REQUEST['email']]);
}

if (empty($sql->fetchAll())) {
    if (isset($_SESSION['customer'])) {
        $sql = $pdo->prepare('update customer set name=?, email=?, '.
            ' password=? where id=?');
        $sql->execute([
            $_REQUEST['name'],
            $_REQUEST['email'], $_REQUEST['password'], $id, ]);
        $_SESSION['customer'] = [
            'id' => $id, 'name' => $_REQUEST['name'],
             'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'], ];
        echo 'お客様情報を更新しました。';
        header('Location: https://laravel242342.herokuapp.com/');
        exit();
    } else {
        $sql = $pdo->prepare('insert into customer values(null,?,?,?)');
        $sql->execute([
            $_REQUEST['name'],$_REQUEST['email'],
            $_REQUEST['password'], ]);
        echo 'お客様情報を登録しました。';
        header('Location: https://laravel242342.herokuapp.com/');
        exit();
    }
} else {
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>



