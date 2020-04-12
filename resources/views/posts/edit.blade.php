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

@section('title', 'Edit Post')

@section('content')
<h1>
   <div class="container">
      <div class="row o-3column">
        <div class="col-md-4">
  更新画面
</h1>

<form method="post" action="{{ url('/posts', $phone->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <input type="text" name="title" placeholder="スマホ名" value="{{ old('title', $phone->title) }} ">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>

  <p>
    <textarea name="body" placeholder="中古未使用相場">{{ old('body', $phone->price) }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>


 
  <p>
    <input type="text" name="bench" placeholder="ベンチマーク" value="{{ old('bench', $phone->bench) }}">
    @if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
    @endif
  </p>


  <a href="{{ url('/') }}" class="back">Back</a>

  <p><input type="submit" value="更新"></p>
</form>


@endsection

@section('test')

<?PHP
require'../require/footer.php';
?>

@endsection


