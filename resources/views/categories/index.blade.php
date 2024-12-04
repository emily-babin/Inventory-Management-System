@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h1 class='text-end'>
                        <a href="/categories/create" class="btn btn-info" role="button">
                        + Add New
                        </a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category}}</td>
                                    <td>
                                        <div style="float:left;">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        </div>

                                        {{-- <div style="float:left;">
                                            <form method="POST" action="/categories/{{ $category->id }}" 
                                                  onsubmit="return confirm('Deleting category. Are you sure you want to proceed?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger" style="margin-left: 5px">

                                            </form>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection

@section('styles')    
@endsection