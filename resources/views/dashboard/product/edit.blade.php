@extends('layouts.master')
@section('title')
    edit product
@endsection
@section('css')
{{-- <link href="{{ asset('css/tagify.css') }}" rel="stylesheet" type="text/css" /> --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.products.update', $product->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('dashboard.product._form', ['button_lable' => 'Update'])
            </form>
        </div>
    </div>
@endsection
@section('js')
{{-- <script src="{{ asset('js/tagify.min.js') }}"></script>
<script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]'),
    tagify = new Tagify (inputElm);
</script> --}}
@endsection
