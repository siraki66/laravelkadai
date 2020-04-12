<?php session_start(); ?>

<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
    echo 'ログアウトしました。';
     header('Location: https://laravel242342.herokuapp.com/');
     exit();

} else {
    echo 'すでにログアウトしています。';
    
     header('Location: https://laravel242342.herokuapp.com/');
     exit();
}
?>
