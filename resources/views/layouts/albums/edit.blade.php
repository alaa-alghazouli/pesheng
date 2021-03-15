@extends ('layouts.layout')
@section ('contents')

        <div id="colorlib-page">
            <div id="colorlib-blog">
                <div class="container">
                    <div class="row text-center">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Edit Album</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('albums.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('albums.update',$album->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text" name="title" value="{{ $album->title }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Detail:</strong>
                                    <textarea class="form-control" style="height:150px" name="disc" placeholder="Detail">{{ $album->disc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" accept="image/*" />
                            </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
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
