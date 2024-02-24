@extends('layouts.master')
@section('title')
    Create Category
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.category._form', ['button_lable' => 'Create'])
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
