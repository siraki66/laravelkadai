<?php session_start();?>

<?PHP
if (isset($_SESSION['customer'])) {
    require'../require/after-header.php';
    // header('Location: login_input.blade.php');
    // exit();
} else {
    require'../require/before-header.php';
    //  header('Location: customer_input.blade');
    // exit();
}?>
<title>index.blade.php</title>

@extends('layouts.default')


{{-- フラッシュ・メッセージ --}}
       @if (session('success'))
           <div class="container mt-2">
               <div class="alert alert-success">
                   {{ session('success') }}
              </div>
           </div>
     　@endif



@section('content')
<h1><div class="row"></div>スマホ検索</h1>







<div class="search-text"> 
   <div class="container">
        <div class="row text-center">
            <div class="form">
                <form action="/search2" method="post" id="search-form" class="form-search form-horizontal">
                @csrf
                    <input type="text" name="word" class="input-search" placeholder="スマホ名を入力">
                    <button type="submit" class="btn-search">検索</button>
                </form>
            </div>
        </div>         
   </div>     
</div>


<ul>
  @forelse ($posts as $post)
  <li>
    <a >{{ $post->title }}</a>
    <a href="{{ action('PostsController@edit', $post) }}" class="edit">編集</a>
    
    <a href="#" class="del" data-id="{{ $post->id }}">削除</a>
    <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
  </li>
  @empty
  <li>未投稿です。</li>
  @endforelse
</ul>

@endsection

@section('test')


<table class="table table-striped">
  <thead>
    <tr>
      
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">スマホ名</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">中古未使用相場</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">ベンチマーク</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">編集</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">削除</th>
    </tr>
</thead>

<tbody>
    @forelse ($posts as $post)
    <tr>
      
      <td><a >{{ $post->title }}</a></td>
      <td><a >{{ $post->price }}</a></td>
      <td><a >{{ $post->bench }}</a></td>
      <td><a href="{{ action('PostsController@edit', $post) }}" class="edit">編集</a></td>
      <td> <a href="#" class="del" data-id="{{ $post->id }}">削除</a>
      <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
      {{ csrf_field() }}
      {{ method_field('delete') }}
    </form>
      </td>
    </tr>
    @empty
    @endforelse
</tbody>
</table>


</div>





<?PHP
require'../require/footer.php';
?>

@endsection







