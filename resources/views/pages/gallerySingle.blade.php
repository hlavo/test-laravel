@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/gallerySingle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/gallerySingle.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <header>
            <h2 class="page__title"><span></span>{{$gallery->title}}</h2>
        </header>
        <main id="links">
            @foreach($gallery->files as $file)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <a href="{{getPathToGallery($gallery->id,$file->filename)}}" title="Banana">
                        <img src="{{getPathToGallery($gallery->id,$file->filename)}}" class="img-thumbnail img-responsive">
                    </a>
                </div>
            @endforeach
            <div id="blueimp-gallery" class="blueimp-gallery">
                <div class="slides"></div>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
            </div>
        </main>
        <footer class="text-center">
            <div class="clearfix"></div>
            <a href="{{route('gallery.downloadZip',$gallery->id)}}" class="btn btn-primary button__zip">{{trans("single.btnText")}}</a>
        </footer>
    </article>
@endsection
