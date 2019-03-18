@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/about.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <header>
            <h2 class="page__title"><span></span>{{trans('about.title')}}</h2>
        </header>
        <main>
            {!! trans('about.text') !!}
        </main>
        <footer>
            {!! trans('about.footer') !!}
            <div class="text-center">
                <img class="img--team img-responsive img-thumbnail" src="{{asset('img/pages/team.jpg')}}" alt="team">
            </div>
        </footer>
    </article>
@endsection
