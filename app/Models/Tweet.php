<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // ファクトリーを使用して、モデルのインスタンスを生成します。これはテストやデータベースシーディングでよく使われます。
    use HasFactory;
}
