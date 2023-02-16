@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Relation</div>
                <table class="table">
                    <tr>
                        <th>Category Name</th>
                        <th>Id</th>
                    </tr>
                    @forelse($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr colspan="2">
                        @empty
                            <h2>No Products Relation</h2>
                        @endforelse
                    </tr>
                </table>
            </div>
        </div>
    </div> 
</div>
@endsection