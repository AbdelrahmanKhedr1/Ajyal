@extends('layouts.master')
@section('title')
    edit Category
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('dashboard.category._form', ['button_lable' => 'Update'])
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
