@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="card">
        {!! Form::model($partner, array('route' => array('admin.partneri.destroy', $partner->id), 'method'=>'delete','id'=>'delete')) !!}

        <img src="{{getPathToPartner($partner->id,$partner->files[0]->filename)}}">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p>
                    <a class="btn btn-primary btn-block" href="{{route('admin.partneri.edit',$partner->id)}}"><strong>Úprava partnera</strong></a>
                </p>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p>
                    {!! Form::submit('Smazat partnera', ['class' => 'form-control']) !!}
                </p>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
