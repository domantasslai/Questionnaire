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

    /**
     * Create() funkcija atsakinga už klausimyno create formos atvaizdavimą
    */
    public function create(){
      return view('questionnaire.create');
    }

    /**
     * Store() funkcija atsakinga už naujo klausimyno sukurimą ir įrašymą į duomenų bazę
    */
    public function store(){
      $data = $this->validateInput();

      $questionnare = auth()->user()->questionnaires()->create($data);

      return redirect('questionnaires/'.$questionnare->id);
    }

    /**
     * Show() funkcija atsakinga už klausimyno atvaizdavimą
    */
    public function show(Questionnaire $questionnaire){
      $questionnaire->load('questions.answers.responses');
      return view('questionnaire.show', compact('questionnaire'));
    }

    /**
     * Edit() funkcija atsakinga už klausimyno edit formos atvaizdavimą
    */
    public function edit(Questionnaire $questionnaire){
      $this->authorize('update', $questionnaire);
      return view('questionnaire.edit', compact('questionnaire'));
    }

    /**
      * Update() funkcija skirta už klausimyno informacijos atnaujinimą.
    */
    public function update(Questionnaire $questionnaire){
      $this->authorize('update', $questionnaire);
      $questionnaire->update($this->validateInput());
      return redirect('home');
    }

    /**
      * Destroy() funkcija skirta už klausimyno ir jo klausimų ištrinimą iš duomenų bazės.
    */
    public function destroy(Questionnaire $questionnaire)
    {
      $this->authorize('update', $questionnaire);
      $questionnaire->load('questions.answers');
      $questionnaire->questions()->delete();
      $questionnaire->delete();
      return redirect('/home');
    }

    /**
      * ValidateInput() funkcija skirta už klausimyno, įvedamos informacijos validavimą.
    */
    public function validateInput(){
      return request()->validate([
        'title' => 'required',
        'purpose' => 'required',
      ]);
    }
}
