@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Tvorba fotogalerie</h4></div>
        <div class="panel-body">
            {!! Form::open(['route' => 'admin.galerie.store','files'=>true ,'method' => 'post']) !!}

            <div class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Název galerie</label>
                <div class="col-md-12">
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Heslo pro galerii</label>
                <div class="col-md-12">
                    {!! Form::text('password', null,['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Fotky</label>
                <div class="col-md-12">
                    {!! Form::file('img[]',['class' => 'form-control','multiple'=>true]) !!}
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