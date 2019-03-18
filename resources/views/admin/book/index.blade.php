@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    @forelse($books as $book)
        <div class="card text-center">
            <a class="card-header" href="{{route('admin.swiper-kniha.show',$book->id)}}">
                @foreach($book->files as $file)
                <img src="{{getPathToBook($book->id,$file->filename)}}">
                @endforeach
            </a>
        </div>
        <hr>
    @empty
        <p>Žádne obrázky ke zobrazení</p>
    @endforelse
@endsection