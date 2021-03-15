@extends ('layouts.layout')
@section ('contents')

	<div id="colorlib-page">
		<div id="colorlib-blog">
			<div class="container">
				<div class="row text-center">
                    @guest <h2 class="bold">Albums </h2>@endguest
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @auth <a class="btn btn-success" href="{{ route('albums.create') }}"> Create New Album</a> @endauth
                </div>

                @if(isset($albums) && $albums -> count() > 0)
                    @foreach ($albums as $album)
                        <div class="col-md-4">
                            <div class="article animate-box">
                                @auth
                                    <form action="{{ route('albums.destroy',$album->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('albums.edit',$album->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endauth
                                <a href="{{route('photos.show', $album->id)}}" class="blog-img" style="width:300px;height:250px;object-fit:cover;">
                                <img class="img-responsive" src="{{url($album->img)}}">
                                    <div class="overlay"></div>
                                    <div class="link">
                                        <span class="read">Read more</h2>
                                    </div>
                                </a>
                                <div class="desc" style="width:300px;height:250px;object-fit:cover;">
                                    <span class="meta">04, Mar 2018</span>
                                    <h2><a href="blog.html">{{$album->title}}</a></h2>
                                    <p>{{$album->disc}}</p>
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
							<p><a href="#">admin@info.com</a></p>
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
