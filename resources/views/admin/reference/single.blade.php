@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-xs-12">
                <h1>{{$reference->title}}</h1>
                <hr>
            </div>
            <div class="col-xs-12">
                <p>{{$reference->text_cs}}</p>
                <p>{{$reference->text_en}}</p>
                <hr>
            </div>
            @forelse($reference->files as $index=>$file)
                <div class="col-md-4 col-xs-12">
                    <div class="card__img" style="background: url('{{ getPathToReference($reference->id,$file->filename)}} ')"></div>
                </div>
            @empty
                <p class="col-xs-12">Žádne obrázky</p>
            @endforelse
            <div class="col-xs-12">
                <p><i>{{$reference->signature}}</i></p>
            </div>
        </div>
    </div>
    <div class="row">
        {!! Form::model($reference, array('route' => array('admin.reference.destroy', $reference->id), 'method'=>'delete','id'=>'delete')) !!}
        <div class="col-xs-12 col-sm-6">
            <p>
                <a class="btn btn-primary btn-block" href="{{route('admin.reference.edit',$reference->id)}}"><strong>Úprava reference</strong></a>
            </p>
        </div>
        <div class="col-xs-12 col-sm-6">
            <p>
                {!! Form::submit('Smazat', ['class' => 'form-control']) !!}
            </p>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
