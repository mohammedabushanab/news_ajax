<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsToMany(Author::class,
    'author_categories',
'author_id',
'category_id',
'id');
    }
    public function articals(){
        return $this->hasMany(Artical::class);
    }
}