<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    public function thisIsUserObject(){
        /**
         * Belongs to nes rysys - vienas user turi daug postu, vienas prie daug -> post:user
         * Antras argumentas stulpelio pavadinimas is lenteles posts (nes cia modelis Post),
         * pagal kuri prijungiam kita lentele -> App\User tai User modelis, t.y. lentele users.
         */
        return $this->belongsTo('App\User', 'user');
    }
    public function cat(){
        return $this->belongsToMany('App\Category', 'category');
    }
}