<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // определяем поля, которые будут заполнены в форме, другие игнорируются
    protected $fillable = ['name', 'body'];
}
