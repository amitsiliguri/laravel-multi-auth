@extends('admin.layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @include('admin.components.category.form')
        </div>
    </div>
</div>
@endsection
