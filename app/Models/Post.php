<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    //relasi user dan post
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi likes dan post
    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

}
