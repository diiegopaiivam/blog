<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','description'];

    public function coments(){
        return $this->hasMany(Coment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
