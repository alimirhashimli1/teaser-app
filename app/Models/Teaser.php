<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaser extends Model
{
    use HasFactory;

     protected $fillable = ['headline', 'body', 'image_path', 'user_id'];

   public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

}
