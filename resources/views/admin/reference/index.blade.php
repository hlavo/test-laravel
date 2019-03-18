@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    @forelse($references as $refernce)
        <div class="card">
            <a class="card-header" href="{{route('admin.reference.show',$refernce->id)}}">{{$refernce->title}}</a>
        </div>
        <hr>
    @empty
        <p>Žádne reference ke zobrazení</p>
    @endforelse
@endsection