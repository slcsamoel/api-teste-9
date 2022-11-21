<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title','url','imageUrl','newsSite','summary', 'publishedAt'
    ];

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function launches(){
        return $this->hasMany(Launche::class);
    }

}
