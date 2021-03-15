@extends ('layouts.layout')
@section ('contents')

	<div id="colorlib-page">
    	<div id="colorlib-blog">
			<div class="container">
                <div class="row text-center">
                    @guest
                        <h2 class="bold">Title</h2>
                    @endguest
                    @auth
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <a class="btn btn-success" href="{{ route('subWorks.create', $work_id)}}"> Add New Article</a>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('works.index') }}"> Back</a>
                        </div>
                    @endauth

                    <div class="work-single-flex js-fullheight">
                        <div class="col-half js-full-height work-img"><iframe width="560" height="315" src="https://www.youtube.com/embed/@foreach($vid as $item){{$item->vid}}@endforeach" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><a href="#pho" class="arrow"><span></span><span></span></a></div>
                            <div class="col-half js-fullheight">
                                <div class="display-t js-fullheight">
                                    <div class="display-tc js-fullheight">
                                        <div class="work-desc">
                                            <h2> @foreach ($vid as $item) {{$item->title}} @endforeach  </h2>
                                            <p>@foreach ($vid as $item) {{$item->disc}} @endforeach</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a name="pho"></a>
                    @guest
                        <div class="cont">
                            <div class="demo-gallery">
                                <ul id="lightgallery">
                                    @if(isset($subWorks) && $subWorks -> count() > 0)
                                        @foreach ($subWorks as $subWorks)
                                            <li data-responsive="{{url($subWorks->img)}} 375, {{url($subWorks->img)}} 480, {{url($subWorks->img)}} 800" data-src="{{url($subWorks->img)}}"data-sub-html="<h4>{{ $subWorks->title }}</h4><p>{{ $subWorks->disc }}</p>">
                                                <a href="{{url($subWorks->img)}}">
                                                    <img src="{{url($subWorks->img)}}"style="object-fit:cover;">
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

                    @auth
                        @if(isset($subWorks) && $subWorks -> count() > 0)
                            @foreach ($subWorks as $subWorks)
                                <div class="col-sm-6 col-md-4">
                                    <div class="article animate-box">
                                        <form action="{{ route('subWorks.destroy',$subWorks->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('subWorks.edit',$subWorks->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <div class="thumbnail">
                                            <img src="{{url($subWorks->img)}}" alt="Park" style="width:300px;height:250px;object-fit:cover;">
                                            <div class="caption">
                                                <h3>{{ $subWorks->title }}</h3>
                                                <div style="height:130px;">{{ $subWorks->disc }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endauth

                </div>
            </div>
    	</div>
    </div>

@endsection