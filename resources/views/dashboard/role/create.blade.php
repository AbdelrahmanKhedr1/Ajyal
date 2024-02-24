@extends('layouts.master')
@section('title')
    Create Role
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.roles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.role._form', ['button_lable' => 'Create'])
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
