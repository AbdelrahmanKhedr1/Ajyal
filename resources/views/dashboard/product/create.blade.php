@extends('layouts.master')
@section('title')
    Create Product
@endsection
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('dashboard.product._form', ['button_lable' => 'Create'])
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
