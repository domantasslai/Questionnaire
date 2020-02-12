@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>
                <div class="card-body">
                  @can ('update', $questionnaire)

                    <a class="btn btn-primary" href="/questionnaires/{{ $questionnaire->id }}/questions/create">Add New Question</a>
                  @endcan
                    <a class="btn btn-primary" href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}">Take Survey</a>
                </div>
            </div>
            @foreach ($questionnaire->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ $question->question }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($question->answers as $answer)
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="">{{ $answer->answer }}</div>
                            @if ($question->responses->count()>0)
                            <div class="">{{ intval($answer->responses->count() * 100 / $question->responses->count()) }}%</div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                @can ('update', $questionnaire)
                <div class="card-footer d-flex">
                    <form class="" action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    <a href="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}/edit" class="btn btn-sm btn-outline-success ml-4">Edit Question</a>
                </div>
                @endcan
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
