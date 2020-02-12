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

    public function create(Questionnaire $questionnaire)
    {
      return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
      // $this->authorize('update', $question->questionnaire);
      $data = $this->validateData();
      $question = $questionnaire->questions()->create($data['question']);
      $question->answers()->createMany($data['answers']);
      return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function edit(Questionnaire $questionnaire, Question $question)
    {

      $this->authorize('update', $question->questionnaire);
      $questionnaire->load('questions.answers.responses');

      return view('question.edit', compact('questionnaire', 'question'));
    }

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

    public function validateData()
    {
      return request()->validate([
        'question.question' => 'required',
        'answers.*.answer' => 'required',
      ]);
    }
}
