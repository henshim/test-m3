@extends('layout.master')
@section('title', 'Shop list')
@section('content')

    <div>
        <a href="{{route('shop.add')}}" class="btn btn-success">Add Shop</a>
        <form action="{{ route('shop.search') }}" method="post" style="float: right">
            @csrf
            <input type="text" name="search" class="form" placeholder="Search shop name">
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Shop Id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Manager</th>
            <th scope="col">Status</th>
            <th scope="col">Function</th>
        </tr>
        </thead>
        <tbody>
        @forelse($shops as $shop)
            <tr id="shop-{{$shop->id}}">
                <th scope="row">{{$shop->id}}</th>
                <td>{{$shop->name}}</td>
                <td>{{$shop->phone}}</td>
                <td>{{$shop->email}}</td>
                <td>{{$shop->address}}</td>
                <td>{{$shop->manager}}</td>
                <td>{{$shop->status}}</td>
                <td>
                    <a href="{{ route('shop.update',$shop->id) }}" class="btn btn-outline-warning">Update</a>
                    <button type="button" class="btn btn-outline-danger delete" data-id="{{$shop->id}}">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
