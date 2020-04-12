<?php session_start();?>

<?PHP
 

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>
 
@extends('layouts.default')

@section('title', 'New Post')

@section('content')
<h1>追加画面</h1>


<form method="POST" action="{{ url('/posts/create') }}"  >
    {{ csrf_field() }}
    <p> 
    <input type="text" name="title" placeholder="スマホ名" value="{{ old('title') }}" required="required" >
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>


  <p> 
    <textarea name="price" placeholder="中古未使用相場" required="required">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>

  <p> 
    <textarea name="bench" placeholder="ベンチマーク" required="required">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>


<a href="{{ url('/') }}" class="back">Back</a>

    <input type="submit">
  </form>

  @endsection

  @section('test')

<?PHP 
require'../require/footer.php';
?>

@endsection





