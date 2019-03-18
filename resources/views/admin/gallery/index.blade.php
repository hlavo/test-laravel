@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    @forelse($galleries as $gallery)
        <div class="card">
            <a class="card-header" href="{{route('admin.galerie.show',$gallery->id)}}">{{$gallery->title}}</a>
        </div>
        <hr>
    @empty
        <p>Žádne galerie ke zobrazení</p>
    @endforelse
@endsection