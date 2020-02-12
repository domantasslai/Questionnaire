<?php

namespace App;

use App\Survey;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    /**
     * OneToMany sąryšis tarp SurveyResponse ir Survey modelių.
     * Apklausos atsakymas priklauso vienai apklausai.
    */
    public function survey(){
      return $this->belongsTo(Survey::class);
    }
}
