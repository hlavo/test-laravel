@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/contact.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <h2 class="page__title"><span></span>{{trans('contact.title')}}</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                    {!! Form::open(['route' => 'admin.store' ,'method' => 'post', 'id' => 'contactForm', "data-toggle" => "validator"]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="row form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.jmeno')}}</label>
                                <div class="col-md-12">
                                    {!! Form::text('firstname',null, ['required' => true, 'class' => 'form-control', "data-error" => "Zadejte prosím jméno", "data-minlength" => "5"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.prijmeni')}}</label>
                                <div class="col-md-12">
                                    {!! Form::text('surname',null, ['required' => true, 'class' => 'form-control', "data-error" => "Zadejte prosím příjmení", "data-minlength" => "5"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.telefon')}}</label>
                                <div class="col-md-12">
                                    {!! Form::text('phone',null, ['required' => true, 'class' => 'form-control', "data-error" => "Zadejte prosím telefon", "data-minlength" => "5"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-md-6">

                            <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.mail')}}</label>
                                <div class="col-md-12">
                                    {!! Form::email('email',null, ['required' => true, 'class' => 'form-control', "data-error" => "Zadejte prosím email"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.datum')}}</label>
                                <div class="col-md-12">
                                    {!! Form::text('date',null, ['required' => true, 'class' => 'form-control datepicker', "data-error" => "Zadejte prosím datum akce", "data-minlength" => "5"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.typ')}}</label>
                                <div class="col-md-12">
                                    {!! Form::select('type',['Fotozrcadlo'=>'Fotozrcadlo','Printerka'=>'Printerka', 'Svatba'=>'Svatba', 'Maturitní ples'=>'Maturitní ples', 'Rodinné focení'=>'Rodinné focení'],null,['required' => true, 'class' => 'form-control']) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="row form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label">{{trans('contact.sprava')}}</label>
                                <div class="col-md-12">
                                    {!! Form::textarea('message',null, ['required' => true, 'class' => 'form-control', "rows"=>7, "data-error" => "Zadejte prosím správu", "data-minlength" => "5"]) !!}
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit(trans('contact.button'), ['class' => 'btn btn-primary pull-right']) !!}
                {{ Form::close() }}
            </div>
        </div>
    </article>
@endsection
