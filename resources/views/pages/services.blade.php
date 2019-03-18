@extends('../layouts/layout')
@section('script')
    <script src="{{ asset('js/services.js') }}" xmlns="http://www.w3.org/1999/html"></script>
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
@endsection

@section('content')
    <article class="container">
        <header>
            <h2 class="page__title"><span></span>{{trans('services.title')}}</h2>
            <ul class="nav nav-tabs">
                @foreach(trans('services.tabs') as $key=>$tab)
                    <li class="{{$key===0 ? 'active' : ''}}"><a data-toggle="tab" href="#item-{{$key}}">{{$tab['title']}}</a></li>
                @endforeach
            </ul>
        </header>

        <div class="tab-content">
            @foreach(trans('services.tabs') as $key=>$tab)
                <div id="item-{{$key}}" class="tab-pane fade text-justify {{$key===0 ? 'in active' : ''}}">
                    <header>
                        <h3>{{$tab['title']}}</h3>
                    </header>
                    <main>
                        {!! $tab['text'] !!}
                        <hr>
                        @if($tab['conclusionTitle'])
                            <h4 class="list-group-item active">{{$tab['conclusionTitle']}}</h4>
                        @endif
                        @if($tab['conclusionText'])
                            {!! $tab['conclusionText'] !!}
                            <hr>
                        @endif
                        @if(!in_array($tab['title'],["Printerka","Fotograf","Rodinné focení"]) )
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6">
                                    <h4>Video</h4>
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/9Y3lmwdSMSw" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        <hr>
                        @endif
                    </main>
                    <footer>
                        <h4>{{trans('services.gallerieTitle')}}</h4>
                        <div class="links">
                            @foreach($tab['img'] as $key=>$img)
                                <a class="img__wrapper pull-left" href="{{asset('img/pages/'.$img['src'])}}">
                                    <img class="img-thumbnail img-responsive" src="{{asset('img/pages/'.$img['src'])}}" alt="">
                                </a>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                </div>
            @endforeach
            <div id="blueimp-gallery" class="blueimp-gallery">
                <div class="slides"></div>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
            </div>
        </div>
    </article>

@endsection
