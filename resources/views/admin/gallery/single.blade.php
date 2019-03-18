@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')'
    <div class="card">
        <div class="row">
            <div class="col-xs-12">
                <h1>{{$gallery->title}}</h1>
            </div>
            @forelse($gallery->files as $index=>$file)
                <div class="col-md-4 col-xs-12">
                    <div class="card__img" style="background: url('{{ getPathToGallery($gallery->id,$file->filename)}} ')"></div>
                </div>
            @empty
                <p>Žádne fotografie</p>
            @endforelse
        </div>
    </div>
    <div class="row">
        {!! Form::model($gallery, array('route' => array('admin.galerie.destroy', $gallery->id), 'method'=>'delete','id'=>'delete')) !!}
        <div class="col-xs-12 col-sm-6">
            <p>
                <a class="btn btn-primary btn-block" href="{{route('admin.galerie.edit',$gallery->id)}}"><strong>Úprava galerie</strong></a>
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
