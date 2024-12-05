@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Item</div>
                    <div class="card-body">
                        <form method="POST" action="/items/ {{ $item->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>  

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="item">Item</label>
                                    <input type="text" class="form-control" name="item" title="item"
                                           value="{{ old('item', $item->title) }}" />        
                                </div>
                            </div>

                            <div class="row text-end">
                                <div class="col-md-12">
                                    {{-- Cancel Button --}}
                                    <a href="/items" class="btn btn-lg btn-block btn-danger" style="margin-top:20px">Cancel</a>
                         
                                    {{-- Save Button --}}
                                    <input type="submit" value="Save" 
                                    class="btn btn-lg btn-block btn-primary" style="margin-top:20px" />
                                </div>
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