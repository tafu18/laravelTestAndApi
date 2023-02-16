@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category Index</div>
                    <table class="table">
                        <tr>
                            <th>Category Name</th>
                            <th>Id</th>
                        </tr>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                        </tr>
                        <tr colspan="2">
                            @empty
                                <h2>No Categories</h2>
                            @endforelse
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection