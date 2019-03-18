@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/partners.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/partners.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <header>
            <h2 class="page__title"><span></span>{{trans('partners.title')}}</h2>
        </header>
        <main>
            <div class="row">
                @foreach($partners as $partner)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <a href="{{$partner->url}}" target="_blank"><div class="thumbnail">

                            @foreach($partner->files as $img)
                                <img src="{{getPathToPartner($partner->id,$img->filename)}}" alt="{{$partner->title}}">
                            @endforeach
                            <div class="caption">
                                <h4>{{$partner->title}}</h4>
                            </div>
                        </div></a>
                    </div>
                @endforeach
            </div>
        </main>
    </article>
@endsection
