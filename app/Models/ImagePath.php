<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePath extends Model
{
    // 他の名前を明示的に指定しない限り、クラス名を複数形の「スネークケース」にしたものが、テーブル名として使用される。
    // 以下のように、tableプロパティを定義し、カスタムテーブル名を指定することもできる。
    protected $table = 'image_paths';
}
