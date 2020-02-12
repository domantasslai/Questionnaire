<?php

namespace App\Http\Controllers;

use App\User;
use App\Questionnaire;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function create(){
      return view('questionnaire.create');
    }

    public function store(){
      $data = $this->validateInput();

      $questionnare = auth()->user()->questionnaires()->create($data);

      return redirect('questionnaires/'.$questionnare->id);
    }

    public function show(Questionnaire $questionnaire){
      $questionnaire->load('questions.answers.responses');
      return view('questionnaire.show', compact('questionnaire'));
    }

    public function edit(Questionnaire $questionnaire){
      $this->authorize('update', $questionnaire);
      return view('questionnaire.edit', compact('questionnaire'));
    }

    public function update(Questionnaire $questionnaire){
      $this->authorize('update', $questionnaire);
      $questionnaire->update($this->validateInput());
      return redirect('home');
    }


    public function destroy(Questionnaire $questionnaire)
    {
      $this->authorize('update', $questionnaire);
      $questionnaire->load('questions.answers');
      $questionnaire->questions()->delete();
      $questionnaire->delete();
      return redirect('/home');
    }

    public function validateInput(){
      return request()->validate([
        'title' => 'required',
        'purpose' => 'required',
      ]);
    }
}
