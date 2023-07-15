<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorCategory extends Model
{
    use HasFactory;
    public function AuthorCategory(){
        return $this->hasMany(Category::class,Author::class,'AuthorCategory');
    }
}
