@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="content">
                <p><a href="{{ route('file.create') }}" class="btn btn-primary float-right">Add files</a></p>

                {{ 'Count of files: ' . $countOfFiles }}
                @forelse ($files as $file)
                    <li><a href="{{ route('file.details', ['id' => $file->id]) }}">{{ $file->name }}</a></li>
                @empty
                    <p>Nothing to show</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
