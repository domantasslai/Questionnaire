@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Question</div>

                <div class="card-body">
                    <form class="" action="{{ route('question.update', ['questionnaire' => $questionnaire->id, 'question' => $question->id] ) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]"
                             value="{{old('question.question') ?? $question->question }}" class="form-control"
                            id="question" aria-describedby="questionHelp"
                            placeholder="Enter question">
                            <small id="questionHelp" class="form-text text-muted">
                              Please insert your question
                            </small>

                            @error ('question.question')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend>Choices</legend>
                            <small id="choicesHelp" class="form-text text-muted">Give choices that gives answers</small>

                            <div class="">
                              <div class="form-group">
                                  <label for="answer1">Choice 1</label>
                                  <input name="answers[][answer]"
                                  value="{{ old('answers.0.answer') ?? $question->answers[0]->answer }}"
                                  type="text" class="form-control"
                                  id="answer1" aria-describedby="choicesHelp"
                                  placeholder="Enter choice 1">

                                  @error ('answers.0.answer')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                              </div>
                            </div>

                            <div class="">
                              <div class="form-group">
                                  <label for="answer2">Choice 2</label>
                                  <input name="answers[][answer]" type="text"
                                  class="form-control"
                                  value="{{ old('answers.1.answer') ?? $question->answers[1]->answer }}"
                                  id="answer2" aria-describedby="choicesHelp"
                                  placeholder="Enter choice 2">

                                  @error ('answers.1.answer')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                              </div>
                            </div>

                            <div class="">
                              <div class="form-group">
                                  <label for="answer3">Choice 3</label>
                                  <input name="answers[][answer]" type="text"
                                   class="form-control"
                                   value="{{ old('answers.2.answer') ?? $question->answers[2]->answer}}"
                                  id="answer3" aria-describedby="choicesHelp"
                                  placeholder="Enter choice 3">

                                  @error ('answers.2.answer')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                              </div>
                            </div>

                            <div class="">
                              <div class="form-group">
                                  <label for="answer4">Choice 4</label>
                                  <input name="answers[][answer]" type="text"
                                  value="{{ old('answers.3.answer') ?? $question->answers[3]->answer }}"
                                  class="form-control"
                                  id="answer4" aria-describedby="choicesHelp"
                                  placeholder="Enter choice 4">

                                  @error ('answers.3.answer')
                                    <small class="text-danger">{{$message}}</small>
                                  @enderror
                              </div>
                            </div>

                          </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit question</button>
                    </form>
                    @foreach ($question->answers() as $answers)
                      @foreach ($answers as $answer)
                        <p>{{$answer}}</p>
                      @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>



@endsection
