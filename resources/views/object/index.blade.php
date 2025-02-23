@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card"> 
  <div class="card-header"> 
    List of all categories 
  </div> 
  <div class="card-body"> 
    <table class="table table-bordered table-striped"> 
      <thead> 
        <tr> 
          <th scope="col">ID</th> 
          <th scope="col">Name</th> 
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($viewData["objects"] as $object) 
        <tr> 
        <td><a class="nav-link active" href="{{ route('object.show', ['id'=> $object->getId()]) }}">{{ $object->getId() }}</a></td>  
          <td>{{ $object->getName() }}</td>  
        </tr> 
        @endforeach 
        </tbody> 
    </table> 
  </div> 
</div> 
@endsection