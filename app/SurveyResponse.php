<?php

namespace App;

use App\Survey;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    public function survey(){
      return $this->belongsTo(Survey::class);
    }
}
