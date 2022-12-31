<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
//use App\News;

use App\Posts;

use App\History;

// 以下を追記することでCarbon Model(日付操作ライブラリ)が扱えるようになる
use Carbon\Carbon;

class NewsController extends Controller
{
  public function add()
  {
      return view('admin.news.create');
  }

  public function create(Request $request)
  {
      // 入力値のVaridationを行う!!
      $this->validate($request, Posts::$rules);

      $news = new Posts;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      //unset($form['image']);

      // データベースに保存する
      $news->fill($form);
      $news->save();
      
      return redirect('admin/news');
  } 
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;//$requestの中のcond_titleの値を代入
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          //newsテーブルの中のtitleカラムで$cond_title（ユーザーが入力した文字）に一致するレコードを全て取得
          $posts = Posts::where('body', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          //Newsモデルで、データベースに保存されている、newsテーブルのレコードを全て取得し、変数$postsに代入
          $posts = Posts::all();
      }
      //index.blade.phpに、取得したレコード（$posts）と、ユーザーが入力した文字列（$cond_title）を渡し、
      //ページOPEN
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = Posts::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.news.edit', ['news_form' => $news]);
  }

  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Posts::$rules);
      // News Modelからデータを取得する
      $news = Posts::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      if ($request->input('remove')) {
        $news_form['image_path'] = null;
      } elseif ($request->file('image')) {
        $path = $request->file('image')->store('public/image');
        $news_form['image_path'] = basename($path);
      } else {
        $news_form['image_path'] = $news->image_path;
      }

      unset($news_form['_token']);
      unset($news_form['image']);
      unset($news_form['remove']);

      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      $history = new History;
      $history->news_id = $news->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/news');
  }

  public function delete(Request $request)
  {
      // 該当するPosts Modelを取得
      $news = Posts::find($request->id);
      // 削除する
      $news->delete();
      return redirect('admin/news/');
  }
  
  public function user_name(Request $request)
  {
      // 現投稿のユーザーIDを取得
      $user_id = posts::select('user_id')->get();
      // 取得したユーザーIDから名前を取得
      $user_name = users::select('name')->where('id', $user_id)->get();
      
      //index.blade.phpに、取得したユーザーネームを渡す。
      return ['user_name' => $user_name];
  }

}
