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
                            @method('PATCH') 

                            {{-- Category Selection --}}
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled>Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Item Name --}}
                            <label for="title" style="margin-top: 20px;">Item</label>
                            <input type="text" class="form-control" name="title" title="title" value="{{ old('item', $item->title) }}" />

                            {{-- Item Description --}}
                            <label for="description" style="margin-top: 20px;">Description</label>
                            <input type="text" class="form-control" name="description" title="description" value="{{ old('description', $item->description) }}"/>

                            {{-- Item Price --}}
                            <label for="price" style="margin-top: 20px;">Price</label>
                            <input type="number" class="form-control" name="price" id="price" step="0.01" min="0" placeholder="0.00" value="{{ old('price', $item->price) }}"/>

                            {{-- Item Quantity --}}
                            <label for="quantity" style="margin-top: 20px;">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" step="1" min="0" placeholder="0" value="{{ old('quantity', $item->quantity) }}"/>

                            {{-- SKU --}}
                            <label for="sku" style="margin-top: 20px;">SKU</label>
                            <input type="text" class="form-control" name="sku" title="sku" value="{{ old('sku', $item->sku) }}"/>

                            {{-- Image --}}
                            <label for="picture" style="margin-top: 20px;">Image</label>
                            <input type="file" class="form-control" name="picture" id="picture" accept="image/*" />


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