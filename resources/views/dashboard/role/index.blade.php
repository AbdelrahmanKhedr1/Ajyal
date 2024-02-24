@extends('layouts.master')
@section('title')
    Role
@endsection
@section('css')
    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bs4-custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/buttons.bs.css') }}"  />
@endsection
@section('content')
    <div class="table-container">
        <div class="t-header">Roles Tabel</div>
        @can('roles.create')

        <a href="{{ route('dashboard.roles.create') }}" type="submit" class="btn btn-primary">Create</a>
        @endcan
        {{-- <a href="{{ route('dashboard.roles.trash') }}" type="submit" class="btn btn-dark">Trashed</a> --}}
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Created At</th>
                        <th>Control</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }} </td>
                            <td> <a href="{{route('dashboard.roles.show',$role->id)}}">{{ $role->name }}</a>  </td>
                            <td>{{ $role->created_at }} </td>
                            <td  class="d-flex justify-content-center">
                                <a href="{{route('dashboard.roles.show',$role->id)}}" class="btn btn-success">Show</a>
                                @can('products.edit')
                                <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>

                                @endcan
                                @can('products.delete')
                                <form action="{{ route('dashboard.roles.destroy', $role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class='btn btn-danger ' type="submit">Delete</button>
                                </form>
                                @endcan

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
