@extends('layouts.master')
@section('title')
    Category - {{$category->name}}
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/buttons.bs.css') }}"  />
@endsection
@section('content')
    <div class="table-container">
        <div class="t-header">{{$category->name}}</div>
        {{-- <a href="{{ route('dashboard.product.create') }}" type="submit" class="btn btn-primary">Create Product</a> --}}
        <a href="{{ route('dashboard.categories.index') }}" type="submit" class="btn btn-info">Back to all Category</a>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>category</th>
                        <th>store</th>
                        <th>status</th>
                        <th>Created At</th>
                        <th>Control</th>
                        <th>image</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->products()->with('store')->get() as $product)   {{--   عملتها كدا عشان ميفضلش كل شويه يعمل استعلام في الداتابيز عن الستور $category->products()->with('store')->get()   --}}
                        <tr>
                            <td>{{ $product->id }} </td>
                            <td>{{ $product->name }} </td>
                            <td>{{ $product->description }} </td>
                            <td>{{ $product->category->name }} </td>
                            <td>{{ $product->store->name }} </td>
                            <td>{{ $product->status }} </td>
                            <td>{{ $product->created_at }} </td>
                            <td  class="d-flex justify-content-center">

                                <a href="{{ route('dashboard.product.edit', $product->id) }}"
                                    class="btn btn-primary " >edit</a>

                                <form action="{{ route('dashboard.product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class='btn btn-danger ' type="submit">Delete</button>
                                </form>
                            </td>
                            <td >
                                <img src="{{Storage::url($product->image)}}" width="200px" alt="">
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
