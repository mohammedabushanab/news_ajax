<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function categories(){
     return $this->belongsToMany(Category::class,'
     author_categories',
    'author_id',
'category_id',
'id',
'id');
    }
    public function articals(){
        return $this->hasMany(Artical::class);
    }

}