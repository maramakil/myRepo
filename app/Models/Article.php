<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'author',
        'description',
        'image',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class , 'article_tag' , 'article_id' , 'tag_id');
    }

}
