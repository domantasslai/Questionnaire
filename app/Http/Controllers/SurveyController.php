<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

  /**
   * Show() funkcija atsakinga už apklausos atvaizdavimą
  */
  public function show(Questionnaire $questionnaire, $slug){

    $questionnaire->load('questions.answers');
    return view('survey.show', compact('questionnaire'));
  }

  /**
   * Store() funkcija atsakinga už vartotojo atsakymų į klausimus sukurimą ir įrašymą į duomenų bazę
  */
  public function store(Questionnaire $questionnaire){

    $data = request()->validate([
      'responses.*.answer_id' => 'required',
      'responses.*.question_id' => 'required',
      'survey.name' => 'required',
      'survey.email' => 'required|email',

    ]);

    $survey = $questionnaire->surveys()->create($data['survey']);
    $survey->responses()->createMany($data['responses']);
    return redirect($questionnaire->path());
  }
}
