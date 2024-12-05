@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create an New Item</div>
                    <div class="card-body">
                        <form method="POST" action="/items" enctype="multipart/form-data">
                            @csrf
                        
                            {{-- Category Selection --}}
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled {{ old('category_id') === null ? 'selected' : '' }}>Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Item Name --}}
                            <label for="title" style="margin-top: 20px;">Item</label>
                            <input type="text" class="form-control" name="title" title="title" value="{{ old('title') }}" />

                            {{-- Item Description --}}
                            <label for="description" style="margin-top: 20px;">Description</label>
                            <input type="text" class="form-control" name="description" title="description" value="{{ old('description') }}"/>

                            {{-- Item Price --}}
                            <label for="price" style="margin-top: 20px;">Price</label>
                            <input type="number" class="form-control" name="price" id="price" step="0.01" min="0" placeholder="0.00" value="{{ old('price') }}"/>

                            {{-- Item Quantity --}}
                            <label for="quantity" style="margin-top: 20px;">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" step="1" min="0" placeholder="0" value="{{ old('quantity') }}"/>

                            {{-- SKU --}}
                            <label for="sku" style="margin-top: 20px;">SKU</label>
                            <input type="text" class="form-control" name="sku" title="sku" value="{{ old('sku') }}"/>

                            {{-- Image --}}
                            <label for="picture" style="margin-top: 20px;">Image</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/*" />

                            <div class="text-end">
                                {{-- Cancel Button --}}
                                <a href="/items" class="btn btn-lg btn-danger btn-block" style="margin-top:20px">Cancel</a>
                                
                                {{-- Add Button --}}
                                <input type="submit" value="Add" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px" />
                            </div> <!-- text-end -->
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