@extends('layouts.app')


@section('content')
<div class="container">
<a href="{{ url('/articles/add') }}" class="btn btn-primary">
                   New Category &raquo;  
</a>
@if(session('info'))

        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    @foreach($categories as $category)
        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $category->name }}
                    <span class="badge bg-secondary">{{ $category->articles->count() }}</span>
                </h5>
                <a href="{{ url('/articles/detail/'.$category->id) }}" class="card-link">
                    View Detail &raquo;
                </a>
            </div>
        </div>
    @endforeach
  

</div>
@endsection


