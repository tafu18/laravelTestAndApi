@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products Index</div>
                    <table class="table">
                        @if(auth()->user() && auth()->user()->is_admin)
                            <a href=" {{route('product.create')}} " class="btn btn-info">Create</a>
                        @endif
                            <tr>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th></th>
                                <th></th>
                            </tr>
                        @forelse($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->type}}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description}}</td>
                            @if(auth()->user() && auth()->user()->is_admin)
                                <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a></td>
                                <td><a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger">Delete</a></td>
                            @endif
                        </tr>
                        <tr colspan="5">
                            @empty
                                <h2>No Products</h2>
                            @endforelse
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection