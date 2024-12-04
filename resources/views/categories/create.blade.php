@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a Category</div>
                    <div class="card-body">
                        <form method="POST" action="/categories">
                            @csrf
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" title="category" />
                            <div class="text-end">
                                <a href="/categories" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
                                <input type="submit" value="Add" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px" />
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection