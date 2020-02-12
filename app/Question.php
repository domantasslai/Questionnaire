<?php

namespace App;

use App\Questionnaire;
use App\Answer;
use App\SurveyResponse;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    /**
     * OneToMany sąryšis tarp Question ir Questionnaire modelių.
     * Klausimas prikaluso klausimynui.
    */
    public function questionnaire()
    {
      return $this->belongsTo(Questionnaire::class);
    }

    /**
     * OneToMany sąryšis tarp Question ir Answer modelių.
     * Klausimas turi daug atsakymų.
    */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * OneToMany sąryšis tarp Question ir SurveyResponse modelių.
     * Klausimas turi daug apklausos atsakymų.
    */
    public function responses()
    {
      return $this->hasMany(SurveyResponse::class);
    }
}
