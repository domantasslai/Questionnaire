<?php

namespace App;

use App\Question;
use App\SurveyResponse;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    /**
     * OneToMany sąryšis tarp Answer ir Question modelių.
     * Atsakymas turi daug klausimų.
    */
    public function question(){
      return $this->belongsTo(Question::class);
    }

    /**
     * OneToMany sąryšis tarp Answer ir SurveyResponse modelių.
     * Atsakymas turi daug apklausos atsakymų.
    */
    public function responses()
    {
      return $this->hasMany(SurveyResponse::class);
    }
}
