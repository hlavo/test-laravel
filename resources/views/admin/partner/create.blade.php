@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Tvorba partnera</h4></div>
        <div class="panel-body">
            {!! Form::open(['route' => 'admin.partneri.store','files'=>true ,'method' => 'post']) !!}

            <div class="row form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">URL webu partnera</label>
                <div class="col-md-12">
                    {!! Form::url('url', null,['class' => 'form-control']) !!}
                    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Nadpis partnera</label>
                <div class="col-md-12">
                    {!! Form::text('title', null,['class' => 'form-control']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Obrázek partnera</label>
                <div class="col-md-12">
                    {!! Form::file('img',['class' => 'form-control']) !!}
                    @if ($errors->has('img'))
                        <span class="help-block">
                            <strong>{{ $errors->first('img') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Uložit', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection