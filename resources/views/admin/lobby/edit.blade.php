@extends('admin/layouts.main')

@section('title')
<h1 class="m-0 text-dark">Edit Lobby Furniture</h1>
@endsection

@section('content')
  <section class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lobby.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

    <form action="{{ route('lobby.update', $lobbyfurniture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{$lobbyfurniture->name}}" vplaceholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" value="{{ $lobbyfurniture->description }}" placeholder="Description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" value="{{ $lobbyfurniture->price }}" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Color:</strong>
                    <input type="text" name="color" class="form-control" value="{{ $lobbyfurniture->color }}" placeholder="Color">
                </div>
            </div>
            <div class="form-group">
                    <strong>Image:</strong>
                    <img  class="image_content" src="../../images/{{ $lobbyfurniture->image}}" style="width:120px; height:80px; border:5px solid white;">
                    <input type="file" name="image" id="fileToUpload" 
                        value="{{ $lobbyfurniture->image }}">
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <!-- <div class="form-group">
                    <strong>Tops:</strong>
                    @if ($lobbyfurniture->tops == 1)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tops" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" name="tops" type="checkbox" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                    </div>
                    @endif
                </div> -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
  </section>
  @endsection
    