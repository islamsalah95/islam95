@extends('dash.layouts.app')
@section('title', 'Create Product')
@section('content')

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
<h6>add country</h6>
@foreach ($countries as $countrie)

@endforeach
    <div class="col-12">
        <form action="{{route('dash.update',['id'=>$countrie->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-row my-3">

                <div class="col-3">
                    <input type="text" class="form-control" name="name" value="{{$countrie->name}}" id="" placeholder="name">
                </div>
            </div>
            <div class="form-row my-3">
                <div class="col-3">
                    <input type="text" class="form-control" name="iso" value="{{$countrie->iso}}" id="" placeholder="iso ">
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" name="ziCode" value="{{$countrie->ziCode}}" id="" placeholder="ziCode">
                </div>



                        {{-- <div class="col-4">
                            <label for="id_subcategorie">City</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach ($cities as $citie)
                                <option   value="{{$citie->id}}" >{{$citie->name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div> --}}





            </div>
            <div class="form-row">
                <div class="col-3 my-3">
                    <button class="btn btn-outline-primary rounded btn-sm"> update country </button>
                </div>
            </div>
        </form>
    </div>


@endsection
