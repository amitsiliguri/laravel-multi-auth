@extends('admin.layouts.app')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
                <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->name}}</td>
                  <td>{{$category->enable}}</td>
                  <td>
                    <a href="{{ route('admin.category.edit',$category->id) }}">Edit</a> | 
                    Delete
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{$categories->links()}}
        </div>
    </div>
</div>
@endsection
