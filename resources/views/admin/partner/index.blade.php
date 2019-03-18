@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    @forelse($partners as $partner)
        <div class="card text-center">
            <a class="card-header" href="{{route('admin.partneri.show',$partner->id)}}">
                @foreach($partner->files as $file)
                <img src="{{getPathToPartner($partner->id,$file->filename)}}">
                @endforeach
            </a>
        </div>
        <hr>
    @empty
        <p>Žádní partneři ke zobrazení</p>
    @endforelse
@endsection