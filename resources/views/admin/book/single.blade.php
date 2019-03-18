@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="card">
        {{ Form::open(['route' => array('admin.swiper-kniha.destroy', $book->id), 'method' => 'delete']) }}
            <img src="{{getPathToBook($book->id,$book->files[0]->filename)}}">
            {!! Form::submit('Vymazat', ['class' => 'form-control btn btn-primary']) !!}
        {{ Form::close() }}
    </div>
@endsection
