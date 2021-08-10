@extends('layout.master')
@section('title','Update Shop')
@section('content')
    <div class="container">
        <h2 style="text-align: center">Update a Shop</h2>
        <hr>
        <form action="{{ route('shop.edit') }}" method="post">
            @csrf
{{--            <div class="col">--}}
{{--                <label for="">Shop ID</label>--}}
                <input type="hidden" class="form-control" name="id" value="{{ $shop[0]->id }}" required>
{{--            </div>--}}
            <div class="row">

                <div class="col">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" required>{{ $shop[0]->address }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="">Shop Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $shop[0]->name }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" value="{{ $shop[0]->phone }}" required>
                </div>
                <div class="col">
                    <label for="">Manager</label>
                    <input type="text" class="form-control" name="manager" value="{{ $shop[0]->manager }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $shop[0]->email }}" required>
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
