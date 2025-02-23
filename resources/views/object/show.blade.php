@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
<div class="card mb-3">
<div class="row g-0"> 
    <div class="col-md-8"> 
      <div class="card-body"> 
        <h5 class="card-title"> 
        {{ $viewData["object"]->getName() }}
        </h5> 
        <h6 class="card-subtitle">ID: {{ $viewData["object"]->getId() }} </h6>
        <p class="card-text">{{ $viewData["object"]->getDescription() }}</p>
        <p class="card-text">Created at: {{ $viewData["object"]->getCreatedAt() }}</p>
        <p class="card-text">Updated at: {{ $viewData["object"]->getUpdatedAt() }}</p>
        
        <form action="{{ route('object.delete', [$viewData["object"]->getId()]) }}" method="POST"> 
              @csrf 
              @method('DELETE') 
            <button class="btn btn-danger">Delete</button> 
          </form> 
      </div> 
    </div> 
  </div> 
</div> 
@endsection