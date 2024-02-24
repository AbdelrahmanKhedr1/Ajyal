@extends('layouts.master')
@section('title')
    Category
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/buttons.bs.css') }}" />
@endsection
@section('content')
    <div class="table-container">
        <div class="t-header">Categories Tabel</div>
        @can('categories.create')
            <a href="{{ route('dashboard.categories.create') }}" type="submit" class="btn btn-primary">Create</a>
        @endcan
        <a href="{{ route('dashboard.categories.trash') }}" type="submit" class="btn btn-dark">Trashed</a>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>category</th>
                        <th>product_count</th>
                        <th>status</th>
                        <th>Created At</th>
                        <th>Control</th>
                        <th>image</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }} </td>
                            <td> <a href="{{ route('dashboard.categories.show', $category->id) }}">{{ $category->name }}</a>
                            </td>
                            <td>{{ $category->description }} </td>
                            <td>{{ $category->parent->name }} </td>
                            <td>{{ $category->products_count }} </td>
                            <td>{{ $category->status }} </td>
                            <td>{{ $category->created_at }} </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('dashboard.categories.show', $category->id) }}"
                                    class="btn btn-success">Show</a>
                                @can('categories.edit')
                                    <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                        class="btn btn-primary">edit</a>
                                @endcan
                                @can('categories.delete')
                                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class='btn btn-danger ' type="submit">Delete</button>
                                    </form>
                                @endcan

                            </td>
                            <td>
                                <img src="{{ Storage::url($category->image) }}" width="200px" alt="">
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
