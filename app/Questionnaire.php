<?php

namespace App;

use App\User;
use App\Question;
use App\Survey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];

    /**
     * Path() funkcija grąžiną kelią iki klausimyno
    */
    public function path(){
      return url('/questionnaires/' . $this->id);
    }

    /**
     * PublicPath() funkcija grąžiną kelią iki klausimyno kuris bus siunčiamas vartotojams
    */
    public function publicPath(){
      return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }

    /**
     * OneToMany sąryšis tarp Questionnaire ir User modelių.
     * klausimynas priklauso vienam vartotojui.
    */
    public function user(){
      return $this->belongsTo(User::class);
    }

    /**
     * OneToMany sąryšis tarp Questionnaire ir Question modelių.
     * klausimynas turi daug klausimų.
    */
    public function questions(){
      return $this->hasMany(Question::class);
    }

    /**
     * OneToMany sąryšis tarp Questionnaire ir Survey modelių.
     * klausimynas turi daug apklausų.
    */
    public function surveys(){
      return $this->hasMany(Survey::class);
    }
}
