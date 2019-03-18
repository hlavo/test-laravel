@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/references.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/references.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <header>
            <h2 class="page__title"><span></span>{{trans('references.title')}}</h2>
        </header>
        <main>
            <div class="row">
                @foreach($references as $reference)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="thumbnail">

                            @foreach($reference->files as $img)
                                <img src="{{getPathToReference($reference->id,$img->filename)}}" alt="{{$reference->title}}">
                            @endforeach
                            <div class="caption">
                                <h4>{{$reference->title}}</h4>
                                @if($reference->{$text})
                                    <p>{{  $reference->{$text} }}</p>
                                @endif
                                @if($reference->signature)
                                    <p><i>{{$reference->signature}}</i></p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </article>
@endsection
