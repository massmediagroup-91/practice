@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @unless(is_null($file->name))
                    <img width="400px" src="{{ asset('storage/'. $file->name) }}">
                @endif
                <h2>{{ $file->name }}</h2>
                <p>{{ $file->comment }}</p>
                @if(!empty($file->deleted_at))
                    <p>{{ $file->deleted_at }}</p>
                @endif
            </div>
            <div class="col-md-4">
                <a href="{{ route('file.destroy', ['id' => $file->id]) }}" class="btn btn-danger">Delete</a>
                <a href="{{ route('file.generate', ['id' => $file->id]) }}" class="btn btn-dark">Generate link</a>
            </div>
        </div>

    </div>
@endsection
