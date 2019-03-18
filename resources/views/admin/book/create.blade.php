@extends('../../layouts/adminLayout')

@section('title','Fotozrcadlo')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>Pridanie obrázku do swiper - fotoknihy</h4></div>
        <div class="panel-body">
            {!! Form::open(['route' => 'admin.swiper-kniha.store','files'=>true ,'method' => 'post']) !!}
            <div class="row form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                <label class="col-md-12 control-label">Obrázek</label>
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