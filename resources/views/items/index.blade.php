@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">
                    <h1 class='text-end'>
                        <a href="/items/create" class="btn btn-info" role="button">
                        + Add New
                        </a>
                    </h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SKU</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title}}</td>
                                    <td>${{number_format($item->price, 2)}}</td>
                                    <td>{{ $item->quantity}}</td>
                                    <td>{{ $item->sku}}</td>
                                    <td>
                                        {{-- Edit Button --}}
                                        <div style="float:left;">
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        </div>

                                        {{-- Delete Button --}}
                                        <div style="float:left;">
                                            <form method="POST" action="/items/{{ $item->id }}" 
                                                  onsubmit="return confirm('Deleting {{ $item->title }}. Are you sure you want to proceed?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger" style="margin-left: 5px">

                                            </form>
                                        </div>
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