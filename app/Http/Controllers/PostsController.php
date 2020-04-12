<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; //付け加えた
use App\Http\Requests\ProfileRequest; //画像ファイルアップのため付け加えた
use Illuminate\Support\Facades\Auth; //ログイン認証のため付け加えた
use Illuminate\Support\Facades\Storage; //画像ファイルアップのため付け加えた

use Illuminate\Http\Request;
use App\Phone;
use App\Http\Requests\PostRequest;
use App\Http\Requests\IdRequest;

class PostsController extends Controller
{
    public function index() { 
     
      $posts = Phone::latest()->get(); 
      $postdescs = Phone::orderBy('id', 'asc')->get();

      return view('posts.index')->with([
        'posts' => $posts,
        'postdescs' => $postdescs
        ]);

    }

  
    public function show(Phone $phone) {
    
      return view('posts.show')->with([
        'phone' => $phone
        
        ]);
     }


    public function edit(Phone $phone) {
      // var_dump($phone);
      return view('posts/edit')->with('phone', $phone); 
    }

    public function update(PostRequest $request, Phone $phone) {
      $phone->title = $request->title;
      $phone->price = $request->body;
      $phone->bench = $request->bench;
      $phone->save();
      return redirect('/');
      
    }


    public function destroy(Phone $phone) {

      $phone->delete();
      return redirect('/');
    }


    public function search2(Request $request){

      $posts = Phone::latest()->get();
      
      $record = $request->word;
      $recordwords= Phone::where('title', 'like', "{$record}%")->get();

      return view('posts.search2')->with([
        'posts' => $posts,
        'recordwords' => $recordwords
        ]);
      }


      
      // 新規登録＆ログイン
    public function signup(){
   
      return view('posts.customer_input');
          }

    public function signup_out(){
   
      return view('posts.customer_output');
          }


    public function login(){
   
      return view('posts.login');
          }

    public function login_out(){
   
      return view('posts.login_output');
               }


      //ログアウト
    public function logout(){
      return view('posts.logout');
         }



    public function create() {
      return view('posts.create');

    }


 /**
     * プロフィール登録フォームの表示
     *
     * @return Response
     */
    public function img_index()
    {
      $is_image = false;
      if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
          $is_image = true;
      }
        return view('/posts/create', ['is_image' => $is_image]);
    }


    public function post_create(Request $request)
    {
      $post = new Phone(); 
      $post->title = $request->title;
      $post->price = $request->price;
      $post->bench = $request->bench;
      $post->save();
      return redirect('/')->with('success', '登録しました。');
    }
}


