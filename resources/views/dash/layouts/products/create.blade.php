@extends('dash.layouts.app')
@section('title', 'Create Product')
@section('content')
<link rel="stylesheet" href="./css/bootstrap.css">
<script type = "text/javascript"
   src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="col-12">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>


<span id="errorss" class="text-success" id="ziCodeError"></span>

<h6>add country</h6>

    <div class="col-12">
        <form id="ajaxform" action="{{route('dash/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row my-3">

                <div class="col-6">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="name">
                    <span class="text-danger" id="nameError"></span>
                </div>
            </div>
            <div class="form-row my-3">
                <div class="col-4">
                    <input type="text" class="form-control" name="iso" value="{{old('iso')}}" id="iso" placeholder="iso ">
                    <span class="text-danger" id="isoError"></span>

                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="ziCode" value="{{old('ziCode')}}" id="ziCode" placeholder="ziCode">
                    <span class="text-danger" id="ziCodeError"></span>

                </div>

            </div>
            <div class="form-row">
                <div class="col-3 my-3">
                    <button  onclick="submitForm()"  id="country" class="btn btn-outline-primary rounded btn-sm"> add country </button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <h6>add city</h6>



    <div class="col-12">
        <form action="" method="" enctype="multipart/form-data">
            @csrf
            <div class="form-row my-3">

                <div class="col-6">
                    <input type="text" class="form-control" name="cityName" value="{{old('cityName')}}" id="" placeholder="cityName">
                </div>
            </div>

            <div class="form-row my-3">

                <div class="col-4">
                    <label for="id_subcategorie">country</label>
                    <select name="country_id" id="country_id" class="form-control">
                        <option   value="" >NO country</option>
                        @foreach ($countries as $countrie)
                        <option   value="{{$countrie->id}}" >{{$countrie->name}}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="col-3 my-3">
                    <button class="btn btn-outline-primary rounded btn-sm"> add city </button>
                </div>
            </div>
        </form>
    </div>



    <script>
$(document).ready(function () {
$("#country").click(function(e){
e.preventDefault();

          $('#nameError').text(' ');
          $('#isoError').text(' ');
          $('#ziCodeError').text(' ');

          $.ajax({
        url: "/dash/store",
        type:"POST",
        data:{
          name:$("input[name=name]").val(),
          iso:$("input[name=iso]").val(),
          ziCode:$("input[name=ziCode]").val(),
          _token: $('meta[name="csrf-token"]').attr('content')
        },
         success: function (response) {

            return $("#errorss").html("<div class='alert alert-success'>done</div>") ,
            $("input[name=name]").val(" "),
                $("input[name=iso]").val(" "),
                $("input[name=ziCode]").val(" ");

},
        error:function (response) {
          $('#nameError').text(response.responseJSON.errors.name);
          $('#isoError').text(response.responseJSON.errors.iso);
          $('#ziCodeError').text(response.responseJSON.errors.ziCode);
          $("#errorss").empty();

        }


       });



})
;});




    </script>


<script src="./js/popper.min.js"></script>
<script  src="./js/jquery-3.6.0.min.js"></script>
<script src="./js/bootstrap.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
