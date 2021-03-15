@extends('layouts.layout')
@section('contents')

    <div id="colorlib-page">
        <div id="colorlib-work">
            <div class="container">
                <div class="row text-center">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center">
                                <h2>Edit Photo</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('photos.index') }}"> Back</a>
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

                </div>
                <div class="container gallery-container" style="width: 93%; margin-top: 100px">
                    <div class="tz-gallery">
                        <div class="row">
                            <form action="{{ route('photos.update',$photo->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="title" value="{{ $photo->title }}" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Detail:</strong>
                                            <textarea class="form-control" style="height:150px" name="disc" placeholder="Detail">{{ $photo->disc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Album ID:</strong>
                                            <input type="text" name="album_id" value="{{ $photo->album_id }}" class="form-control" readonly placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
