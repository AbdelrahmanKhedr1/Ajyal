@extends('layouts.master')
@section('title')
    Edit Role
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.roles.update', $role->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('dashboard.role._form', ['button_lable' => 'Update'])
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
