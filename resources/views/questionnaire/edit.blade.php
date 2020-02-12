@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @can ('update', $questionnaire)


            <div class="card">
                <div class="card-header">Edit Questionnaire</div>

                <div class="card-body">
                    <form class="" action="{{ route('questionnaires.update', ['questionnaire' => $questionnaire->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" value="{{ old('title') ?? $questionnaire->title }}" placeholder="Enter title">

                            <small id="titleHelp" class="form-text text-muted">Please insert your questionnaire a title</small>
                            @error ('title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" value="{{ old('purpose') ?? $questionnaire->purpose }}" aria-describedby="purposeHelp" placeholder="Enter purpose">
                            <small id="purposeHelp" class="form-text text-muted">Please insert your questionnaire a purpose</small>
                            @error ('purpose')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
