@extends('dash.layouts.app')
@section('title', 'All Products')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')


<div class="col-12">
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h1>coutries have cities</h1>
    </div>
    <div class="col-12">
        <table id="datatable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>id </th>
                    <th>name</th>
                    <th>iso</th>
                    <th>ziCode</th>
                    <th>city</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($shows as $show)

                    <tr>
                        <td>{{$show->id}}</td>
                        <td>{{$show->name }}</td></td>
                        <td>{{$show->iso}}</td>
                        <td>{{$show->ziCode}}</td>

                        <td>{{$show->cityName}}</td>


                        <td>
                            <a class="btn btn-outline-primary btn-sm rounded" href="{{route('dash.edit',['id'=>$show->id])}}">Edit</a>
                            <form action="{{route('dash.delete',['id'=>$show->id])}}"
                                method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded"> Delete </button>
                            </form>
                        </td>


                    </tr>
                    @endforeach

            </tbody>
        </table>
    </div>



    <h1>coutries </h1>


    <div class="col-12">
        <table id="datatable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>id </th>
                    <th>name</th>
                    <th>iso</th>
                    <th>ziCode</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withoutCitys as $withoutCity)
                    <tr>
                        <td>{{$withoutCity->id}}</td>
                        <td>{{$withoutCity->name }}</td></td>
                        <td>{{$withoutCity->iso}}</td>
                        <td>{{$withoutCity->ziCode}}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm rounded" href="{{route('dash.edit',['id'=>$withoutCity->id])}}">Edit</a>
                            <form action="{{route('dash.delete',['id'=>$withoutCity->id])}}"
                                method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded"> Delete </button>
                            </form>
                        </td>


                    </tr>
                    @endforeach

            </tbody>
        </table>
    </div>




    <h1>cities</h1>



    <div class="col-12">
        <table id="datatable" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>id </th>
                    <th>cityName</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $citie)
                    <tr>
                        <td>{{$citie->id}}</td>
                        <td>{{$citie->cityName }}</td>
                        <td>
                            <form action="{{route('dash.deleteCity',['id'=>$citie->id])}}"
                                method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

            </tbody>
        </table>
    </div>




@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>

    </script>
@endsection
