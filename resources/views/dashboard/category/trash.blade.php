@extends('layouts.master')
@section('title')
    Trashed Categories
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/buttons.bs.css') }}"  />
@endsection
@section('content')
    <div class="table-container">
        <div class="t-header">Trashed Categories Tabel</div>
        <a href="{{ route('dashboard.categories.index') }}" type="submit" class="btn btn-primary">Back</a>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        {{-- <th>category</th> --}}
                        <th>status</th>
                        <th>Deleted At</th>
                        <th>Control</th>
                        <th>image</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }} </td>
                            <td>{{ $category->name }} </td>
                            <td>{{ $category->description }} </td>
                            {{-- <td>{{ $category->parent_name }} </td> --}}
                            <td>{{ $category->status }} </td>
                            <td>{{ $category->deleted_at }} </td>
                            <td  class="d-flex justify-content-center">


                                <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class='btn btn-info ' type="submit">Restore</button>
                                </form>

                                <form action="{{ route('dashboard.categories.forceDelete', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class='btn btn-danger ' type="submit">Force Delete</button>
                                </form>
                            </td>
                            <td >
                                <img src="{{Storage::url($category->image)}}" width="200px" alt="">
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <!-- Data Tables -->
    <script src="{{ URL::asset('vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ URL::asset('vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ URL::asset('vendor/datatables/custom/fixedHeader.js') }}"></script>
@endsection
