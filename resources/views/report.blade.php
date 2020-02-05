@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Reports</h3>
        <p>Count of view: {{ $countOfView }}</p>
        <p>Count of files: {{ $countOfFiles }}</p>
        <p>Count of deleted files: {{ $countOfDeletedFiles }}</p>
        <p>Count of disposable link: {{ $countOfDisposableLink }}</p>
        <p>Count of deleted disposable link: {{ $countOfDeletedDisposableLink }}</p>
    </div>
@endsection
