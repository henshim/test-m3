@extends('layout.master')
@section('title','Add Shop')
@section('content')
    <div class="container">
        <h2 style="text-align: center">Add New Shop</h2>
        <hr>
        <form action="{{ route('shop.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="">Shop ID</label>
                    <input type="number" class="form-control" name="id" required>
                    @error('id')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" required></textarea>
                    @error('address')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="">Shop Name</label>
                    <input type="text" class="form-control" name="name" required>
                    @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" required>
                    @error('phone')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Manager</label>
                    <input type="text" class="form-control" name="manager" required>
                    @error('manager')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" required>
                    @error('email')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control">
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="{{ route('shop.list') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
