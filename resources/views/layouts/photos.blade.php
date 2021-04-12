@extends ('layouts.layout')
@section ('contents')



    <div id="colorlib-page">
        <div id="colorlib-work">
            <div class="container">
                <div class="row text-center">
                    @guest
                        <h2 class="bold">Photos</h2>
                    @endguest
                    @auth
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="row text-center">
                            <a class="btn btn-success" href="{{ route('photos.create', $album_id)}}"> Create New Photo</a>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('albums.index') }}"> Back</a>
                        </div>
                    @endauth
                </div>

                @guest
                    <div class="cont">
                        <div class="demo-gallery">
                            <ul id="lightgallery">
                                @if(isset($photos) && $photos -> count() > 0)
                                    @foreach ($photos as $photos)
                                        <li data-responsive="{{url($photos->img)}} 375, {{url($photos->img)}} 480, {{url($photos->img)}} 800" data-src="{{url($photos->img)}}"data-sub-html="<h4>{{ $photos->title }}</h4><p>{{ $photos->disc }}</p>">
                                            <a href="{{url($photos->img)}}">
                                                <img src="{{url($photos->img)}}"style="object-fit:cover;">
                                                <div class="demo-gallery-poster">
                                                    <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                @endguest

                <div class="container gallery-container" style="width: 93%; margin-top: 100px">
                    <div class="tz-gallery">
                        <div class="row">

                            @auth
                                @if(isset($photos) && $photos -> count() > 0)
                                    @foreach ($photos as $photo)
                                        @if ($photo->album_id == $album_id)

                                            <div class="col-sm-6 col-md-4">
                                                <div class="article animate-box">
                                                    @auth
                                                        <form action="{{ route('photos.destroy',$photo->id) }}" method="POST">
                                                            <a class="btn btn-primary" href="{{ route('photos.edit',$photo->id) }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    @endauth
                                                    <div class="thumbnail">
                                                        <a class="lightbox" href="{{url($photo->img)}}">
                                                            <img src="{{url($photo->img)}}" alt="Park">
                                                        </a>
                                                        <div class="caption">
                                                            <h3>{{ $photo->title }}</h3>
                                                            <div style="height:130px;">{{ $photo->disc }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
