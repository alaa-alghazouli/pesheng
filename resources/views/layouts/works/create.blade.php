@extends('layouts.layout')
@section('contents')

    <div id="colorlib-page">
        <div id="colorlib-work">
            <div class="container">
                <div class="row text-center">
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
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('subWorks.index') }}"> Back</a>
                    </div>
                </div>


                <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="title" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <textarea class="form-control" style="height:150px" name="disc" placeholder="Detail"></textarea>
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

@endsection
