@extends ('layouts.layout')
@section ('contents')

    <div id="colorlib-page">
        <div id="colorlib-work">
            <div class="container">
                <div class="row text-center">
                    @guest<h2 class="bold">Videos</h2>@endguest
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @auth <a class="btn btn-success" href="{{ route('works.create') }}"> Create New Article</a> @endauth
                </div>
                <div class="row">

                    @if(isset($works) && $works -> count() > 0)
                        @foreach ($works as $work)
                            <div class="col-md-12">
                                <div class="work-entry-flex animate-box js-fullheight">
                                    <div class="col-three-forth js-fullheight">
                                        <div class="row no-gutters">
                                            <div class="col-md-12 no-gutters">
                                                @auth
                                                    <form action="{{ route('works.destroy',$work->id) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('works.edit',$work->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endauth
                                                <a href="{{route('subWorks.show', $work->id)}}"><div class="work-img js-fullheight " style="background-image: url({{url($work->img)}});"></div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-one-forth js-fullheight">
                                        <div class="row no-gutters">
                                            <div class="col-md-12 no-gutters">
                                                <div class="display-t js-fullheight">
                                                    <div class="display-tc js-fullheight">
                                                        <div class="text-inner">
                                                            <h2>{{$work->title}}</h2>
                                                            <p> {{$work->disc}} </p>
                                                            <p><a href="{{route('subWorks.show', $work->id)}}" class="btn-view">View</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>

        <footer>
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-pb-sm text-center">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2>Office</h2>
                                    <p>291 South 21th Street, <br> Suite 721 New York NY 10016</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-pb-sm text-center">
                            <h2>Get in Touch</h2>
                            <p><a href="#">noah@info.com</a></p>
                        </div>
                        <div class="col-md-4 col-pb-sm text-center">
                            <h2>Social</h2>
                            <p class="colorlib-social-icons">
                                <a href="#"><i class="icon-facebook4"></i></a>
                                <a href="#"><i class="icon-twitter3"></i></a>
                                <a href="#"><i class="icon-googleplus"></i></a>
                                <a href="#"><i class="icon-dribbble2"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p>
								<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br></span>
                                <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection