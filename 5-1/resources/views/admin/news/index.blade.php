@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
    <h1></h1>
        <div class="row">
            <table class="table table-dark2">
                <tr>
                    <th>ホーム</th>
                </tr>
            </table> 
        </div>
        <div class="row">
            <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
                <table class="table table-dark1">
                    <tr>
                        <div class="col-md-10">
                            <input type="hidden" class="form-control" name="user_id" value={{ Auth::user()->id }}>
                        </div>      
                        <td>
                            <input type="text" placeholder="いまどうしてる？" class="form-control" name="body" value="{{ old('body') }}">
                       
                            <div class="col-md-3" >
                                {{ csrf_field() }}
                                <input type="submit"  class="btn btn-primary" style="color:black;border-color:white;" value="つぶやく">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark3">
                        <tbody>
                            <?php
                                //記事を最新順に取得
                                $posts = DB::table('posts')->latest()->get();
                            ?>
                            @foreach ($posts as $news)
                                <tr>
                                    <td>
                                        {{DB::table('users')->where('id', $news->user_id)->value('name')}}<br>{{ str_limit($news->body, 250) }}
                                    </td> 
                                    <td>
                                        <div class="daletecreated">    
                                            {{ str_limit($news->created_at) }}<br>
                                        
                                            @if(DB::table('users')->where('id', $news->user_id)->value('name') == Auth::user()->name)
                                                <a class="dalete" href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection