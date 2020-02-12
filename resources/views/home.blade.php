@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-primary">Create New Questionnaire</a>

                </div>

            </div>

            <div class="card mt-4">
                <div class="card-header">My Questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($questionnaires as $questionnaire)
                        <li class="list-group-item">
                            <a href="{{ $questionnaire->path() }}">{{ $questionnaire->title }}</a>

                            <div class="mt-2">
                                <small class="font-weight-bold">Share Url</small>
                                <p>
                                    <a href="{{ $questionnaire->publicPath() }}">
                                        {{ $questionnaire->publicPath() }}
                                    </a>
                                </p>
                            </div>
                        </li>

                        <div class="card-footer d-flex">
                            <form class="justify-content-between" action="/questionnaire/{{$questionnaire->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Questionnaire</button>
                            </form>

                            <a class="justify-content-between btn btn-sm btn-outline-success ml-4" href="{{ route('questionnaires.edit', ['questionnaire' => $questionnaire->id]) }}">Edit Questionnaire</a>
                        </div>

                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="row">
              <div class="col-12 text-center d-flex justify-content-center pt-5">
                {{ $questionnaires->links() }}
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
