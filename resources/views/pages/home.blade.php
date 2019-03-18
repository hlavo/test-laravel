@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/home.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Courgette&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div>
        <header class="container">
            <h2 class="quote text-center">{{trans('home.title')}}</h2>
        </header>
        <main>
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach($books as $book)
                        @foreach($book->files as $file)
                            <div class="swiper-slide" style="background-image:url('{{getPathToBook($book->id,$file->filename)}}')"></div>
                        @endforeach
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach($books as $book)
                        @foreach($book->files as $file)
                            <div class="swiper-slide" style="background-image:url('{{getPathToBook($book->id,$file->filename)}}')"></div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <footer>
                <h2 class="quote text-center">{{trans('home.title2')}}</h2>
            </footer>
        </main>
    </div>
@endsection
