@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Tvorba reference</h4></div>
        <div class="panel-body">
            {!! Form::open(['route' => 'admin.reference.store','files'=>true ,'method' => 'post']) !!}

            <div class="row form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Název reference</label>
                <div class="col-md-12">
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('text_cs') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Text reference v češtine</label>
                <div class="col-md-12">
                    {!! Form::textarea('text_cs', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('text_cs'))
                        <span class="help-block">
                            <strong>{{ $errors->first('text_cs') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('text_en') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Text reference v angličtine</label>
                <div class="col-md-12">
                    {!! Form::textarea('text_en', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('text_en'))
                        <span class="help-block">
                            <strong>{{ $errors->first('text_en') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('signature') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Jméno</label>
                <div class="col-md-12">
                    {!! Form::text('signature', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('signature'))
                        <span class="help-block">
                            <strong>{{ $errors->first('signature') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Fotky</label>
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