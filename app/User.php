<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function books() {
         return $this->hasMany(Book::class);
    }

    public function favorites() { //複数形
        return $this->belongsToMany(Book::class);
    }
    
    public function is_favorite($book_id) { //お気に入りの中に入っているかのチェック
        return $this->favorites()->where('book_id', $book_id)->exists(); 
    }

    public function favorite($book_id) { //単数形
        $exist = $this->is_favorite($book_id); //引数に入っている本がお気に入りに入っているかどうか
        if ($exist){
            return false; //すでにお気に入りに入ってたらfalseを返す
        } else {
            $this->favorites()->attach($book_id);  //お気に入りに入ってなかったらお気に入りに入れて、trueを返す
            return true;
        }
    }

    public function unfavorite($book_id) { //単数形
        $exist = $this->is_favorite($book_id); //引数に入っている本がお気に入りに入っているかどうか
        if($exist){
            $this->favorites()->detach($book_id);  //お気に入りに入ってたらお気に入りから消して、trueを返す
            return true;
        } else {
            return false; //お気に入りに入ってなかったらfalseを返す
        }
    }
}
