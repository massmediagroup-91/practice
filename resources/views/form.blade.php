@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>`
        @endif
        <form class="form-horizontal" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="">Name</label>
            <input type="file" class="form-control" name="name" placeholder="Name" value="{{$post->name ?? ''}}" required>
            <br>
            <label for="">Comment</label>
            <textarea type="text" class="form-control" name="comment" placeholder="Comment" required>{{$post->comment ?? ''}}</textarea>
            <br>
            <label for="">When delete?</label>
            <input type="date" class="form-control" name="deleted_at" placeholder="When delete file?">
            <br>
            <input type="submit" class="btn btn-success" value="Save">
        </form>
    </div>
@endsection
