@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('content') 
<div class="row"> 
<div class="col-md-6 "> 
<h3>Welcome to the home page.</h3>
<p>
    <a href="{{ route('category.create') }}" class="text-primary">Create</a> a category or see the 
    <a href="{{ route('category.index') }}" class="text-primary">List</a> of all categories in the database.
</p>

</div> 
</div> 
@endsection