<?php

namespace App;

use App\Questionnaire;
use App\SurveyResponse;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    /**
     * OneToMany sąryšis tarp Survey ir Questionnaire modelių.
     * Apklausa priklauso vienam klausimynui.
    */
    public function questionnaire(){
      return $this->belongsTo(Questionnaire::class);
    }

    /**
     * OneToMany sąryšis tarp Survey ir SurveyResponse modelių.
     * Apklausa turi daug apklausos atsakymų.
    */
    public function responses(){
      return $this->hasMany(SurveyResponse::class);
    }
}
