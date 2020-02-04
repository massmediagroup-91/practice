@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @unless(is_null($file->name))
                    <img width="400px" src="{{ asset('storage/'. $file->name) }}">
                @endif
                <h5>{{ $file->name }}</h5>
                <p>{{ $file->comment }}</p>
                @if(!empty($file->deleted_at))
                    <p>{{ $file->deleted_at }}</p>
                @endif
                <p>Views: {{ $views->view }}</p>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('file.destroy', ['id' => $file->id]) }}" class="btn btn-danger">Delete</a>
                    </div>
                    <div class="col-md-5">
                        <a href="{{ route('file.static.generate', ['id' => $file->id]) }}" class="btn btn-dark">Generate
                            link</a>
                    </div>
                    <label>
                        <input class="form-control generated-link" type="text" readonly value="{{ $link ?? '' }}">
                    </label>
                </div>
                <a href="{{ route('file.disposable.generate', ['id' => $file->id]) }}"
                   class="btn btn-dark disposable-link">Generate disposable link</a>
                <ol class="disposable-link-list">
                    @forelse ($disposableLinks as $disposableLink)
                        <li><input type="text" class="form-control" readonly
                                   value="{{ route('check.disposable.link', [$disposableLink->token]) }}"></li>
                    @empty
                        <p>Nothing to show</p>
                    @endforelse
                </ol>
            </div>
        </div>
    </div>
@endsection
