@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/gallerySingle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/gallerySingle.css') }}">
@endsection

@section('content')
    <article class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-xs-offset-0">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Heslo do galérie</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'gallery.requestForm', 'method' => 'post']) !!}
                        {!! Form::hidden('id',$id) !!}
                        <div class="row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-12 control-label">Heslo</label>
                            <div class="col-md-12">
                                {!! Form::password('password',['class' => 'form-control']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Odeslat', ['class' => 'pull-right btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
