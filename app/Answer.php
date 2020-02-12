<?php

namespace App;

use App\Question;
use App\SurveyResponse;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question(){
      return $this->belongsTo(Question::class);
    }

    public function responses()
    {
      return $this->hasMany(SurveyResponse::class);
    }
}
