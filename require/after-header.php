<link rel="stylesheet" href="/css/bootstrap-new.css">
<link rel="stylesheet" href="/css/styles.css">


	
<script src="../js/jquery-3.4.1.slim.min.js"></script>
<script src="../js/bootstrap.bundle.js"></script>


<!DOCTYPE html>
  <html lang="ja">
        
  <head>
        
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
        
  </head>
        

<body >
  <header class="masthead" > 
</body>




 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="https://laravel242342.herokuapp.com/">スマホコスパの館</a>

    <div class="loginname">
    <?php echo $_SESSION["customer"] ["name"],"でログイン中";?>
    </div>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


      <li class="nav-item active">
        <a class="nav-link" href="https://laravel242342.herokuapp.com/posts/create">情報追加<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="https://laravel242342.herokuapp.com/posts/logout">ログアウト</a>
      </li>
    </ul>

  </div>
</nav>
