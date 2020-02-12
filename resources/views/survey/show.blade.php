@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h1 class="text-center">{{$questionnaire->title}}</h1>
                <form class="" action="/surveys/{{$questionnaire->id}}-{{ Str::slug($questionnaire->title) }}" method="post">
                    @csrf

                    @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{$key+1}}</strong> {{ $question->question }}</div>

                        <div class="card-body">
                            @error ('responses.'. $key. '.answer_id')
                              <small class="text-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach ($question->answers as $answer)
                                <label for="answer{{ $answer->id }}">
                                    <li class="list-group-item">
                                        <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{ $answer->id }}" {{ (old('responses.'. $key. '.answer_id') == $answer->id) ? 'checked' : ''}} class="mr-2" value="{{$answer->id}}">
                                        {{ $answer->answer }}
                                        <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                    </li>
                                </label>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach


                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Please insert your Name</small>
                                @error ('survey.name')
                                  <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">Please insert your Email</small>
                                @error ('survey.email')
                                  <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary">Vote</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
</div>
@endsection
