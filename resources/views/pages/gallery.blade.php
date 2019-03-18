@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/gallery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endsection

@section('content')
    <article class="container text-justify">
        <header>
            <h2 class="page__title"><span></span>{{trans('gallery.text')}}</h2>
        </header>
        <main class="row">
            @foreach($gallerys as $gallery)
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="{{route('gallery.show',$gallery->id)}}">
                                @if(isset($gallery->files[0]) && isset($gallery->files[0]->filename))
                                    <img src="{{getPathToGallery($gallery->id,$gallery->files[0]->filename,true)}}" class="img-thumbnail img-responsive">
                                @endif
                            </a>
                        </div>
                        <div class="panel-footer">
                            {{$gallery->title}}
                        </div>
                    </div>
                </div>
            @endforeach
        </main>
    </article>
@endsection
