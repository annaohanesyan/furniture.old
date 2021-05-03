@extends('admin/layouts.main')

@section('title')
<h1 class="m-0 text-dark">Լոգարանի կահույք</h1>
@endsection
    <!-- Main content -->
@section('content')

<section class="content">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bathroom.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i></a>
                <a class="btn btn-danger" id ="deleteAllSelectedRecord" href="" title="Delete Selected"> <i class="fas fa-trash"></i></a>
               
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered yajra-datatable">
        <tr>
            <th><input type="checkbox"  id="checkAll"></th>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Color</th>
            <th>Image</th>
            <th>Tops</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bath_furnitures as $bath_furniture)
            <tr id = "sid{{$bath_furniture->id}}">
                <td><input type="checkbox" name = "ids" id = "selected_input" class="checkBoxClass" value = "{{ $bath_furniture->id }}">
                <input type="hidden" name="_token" value="<?php Session::token() ?>">
            </td>
                
                <td>{{ $bath_furniture->id }}</td>
                <td>{{ $bath_furniture->name }}</td>
                <td>{{ $bath_furniture->description }}</td>
                <td>{{ $bath_furniture->price }}</td>
                <td>{{ $bath_furniture->color }}</td>
                <td><img  class="image_content" src="images/{{ $bath_furniture->image}}" style="width:120px; height:80px"></td>
                <td>
                <!-- @if ($bath_furniture->tops == 1)
                    <div class="form-check">
                        <i class="fa fa-check" style="font-size:26px; color: #007bff"></i>
                    </div>
                @else
                    <div class="form-check">
                    <i class="fa fa-minus-square" style="font-size:26px; color: #007bff"></i>
                    </div>
                @endif -->
                </td>
                <td>
                    <form action="{{ route('bathroom.destroy', $bath_furniture->id) }}" method="POST">

                        <a href="{{ route('bathroom.show', $bath_furniture->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('bathroom.edit', $bath_furniture->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>
                        <a class="action_item" href="{{ route('bathroomfur_duplicate', $bath_furniture->id) }}">
                            <i class="fas fa-copy  fa-lg"></i>
                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </section>
  
     
   
@endsection

@section('js_function')

<script>
    $(function(e){
        $("#checkAll").click(function(){
            $(".checkBoxClass").prop('checked', $(this).prop('checked'))
        })
    })

    $("#deleteAllSelectedRecord").click(function(e){
        e.preventDefault();
        var allids = [];

        $("input:checkbox[name=ids]:checked").each(function(){
            allids.push($(this).val());
           
        })
       
        $.ajax({
            url:"{{route('deleteAllSelectedBathroomFur')}}",
            type:"DELETE",
            data:{
                _token:$("input[name=_token]").val(),
                ids:allids
            },
            success:function(response){
        
                $.each(allids, function(key,val){
                    $("#sid" + val).remove();
                })
            }
        })
    })
</script>

@endsection