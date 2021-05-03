@extends('admin/layouts.main')
@section('title')
<h1 class="m-0 text-dark"> {{ $lobbyfurniture->name }} </h1>
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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $lobbyfurniture->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $lobbyfurniture->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $lobbyfurniture->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color:</strong>
                {{ $lobbyfurniture->color }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img  class="image_content" src="../images/{{ $lobbyfurniture->image}}" style="width:120px; height:80px">
            </div>
        </div>
    </div>
    </section>
@endsection
    