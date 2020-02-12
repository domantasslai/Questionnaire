<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
      return ;
    }

    /**
     * Create() funkcija atsakinga už klausimo create formos atvaizdavimą
    */
    public function create(Questionnaire $questionnaire)
    {
      return view('question.create', compact('questionnaire'));
    }

    /**
     * Store() funkcija atsakinga už naujo klausimo ir galimų atsakymų sukūrymą ir įrašymą į duomenų bazę
    */
    public function store(Questionnaire $questionnaire)
    {
      $data = $this->validateData();
      $question = $questionnaire->questions()->create($data['question']);
      $question->answers()->createMany($data['answers']);
      return redirect('/questionnaires/'.$questionnaire->id);
    }

    /**
     * Edit() funkcija atsakinga už klausimo edit formos atvaizdavimą
    */
    public function edit(Questionnaire $questionnaire, Question $question)
    {

      $this->authorize('update', $question->questionnaire);
      $questionnaire->load('questions.answers.responses');

      return view('question.edit', compact('questionnaire', 'question'));
    }

    /**
      * Update() funkcija skirta už klausimo ir jo galimų atsakymų informacijos atnaujinimą.
    */
    public function update(Questionnaire $questionnaire, Question $question){

      $this->authorize('update', $question->questionnaire);
      $question->load('answers');
      $data = $this->validateData();
      $questionnaire->questions()->update($data['question']);

      foreach ($question->answers as $key => $answers)
      {
        $question->answers[$key]->update($data['answers'][$key]);
      }
      return redirect($questionnaire->path());
    }

    /**
      * Destroy() funkcija skirta už klausimo ir jo atsakymų ištrinimą iš duomenų bazės.
    */
    public function destroy(Questionnaire $questionnaire, Question $question)
    {

      $this->authorize('update', $question->questionnaire);
      foreach ($question->answers as $key => $answers)
      {
        $question->answers[$key]->delete();
      }
      $question->delete();
      return redirect($questionnaire->path());
    }

    /**
      * ValidateData() funkcija skirta už klausimo, įvedamos informacijos validavimą.
    */
    public function validateData()
    {
      return request()->validate([
        'question.question' => 'required',
        'answers.*.answer' => 'required',
      ]);
    }
}
