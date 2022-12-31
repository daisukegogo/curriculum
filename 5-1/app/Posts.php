<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array('id');

    // 入力値のバリデーション
    public static $rules = array(
        'body' => 'required|max:255',
    );

    // Postsモデルに関連付けを行う
    public function histories()
    {
      return $this->hasMany('App\History');

    }

}
