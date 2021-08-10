<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCheckRequest;
use App\Models\Shop;
use App\Models\Status;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::query()->select('shops.id', 'shops.name', 'shops.phone', 'shops.address', 'shops.email', 'shops.manager', 'status.name as status')
            ->join('status', 'shops.status_id', '=', 'status.id')
            ->orderByDesc('id')->get();
//        dd($shops);
        return view('shop.list', compact('shops'));
    }

    public function add()
    {
        $statuses = Status::all();
        return view('shop.add', compact('statuses'));
    }

    public function store(ShopCheckRequest $request)
    {
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $manager = $request->manager;
        $status = $request->status;
        $insert = [
            'id' => $id, 'name' => $name,
            'phone' => $phone, 'email' => $email,
            'address' => $address, 'manager' => $manager,
            'status_id' => $status,
        ];
        Shop::query()->insert($insert);
        return redirect()->route('shop.list');
    }

    public function update($id)
    {
        $statuses = Status::all();
        $shop = Shop::query()->where('shops.id', $id)->get();
//        dd($shop);
        return view('shop.update', compact('shop', 'statuses'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $manager = $request->manager;
        $status = $request->status;
        $update = [
            'name' => $name,
            'phone' => $phone, 'email' => $email,
            'address' => $address, 'manager' => $manager,
            'status_id' => $status,
        ];
        Shop::query()->where('id', $id)->update($update);
        return redirect()->route('shop.list');
    }

    public function delete($id)
    {
        $shop = Shop::query()->where('id', $id);
        $shop->delete();
        return response()->json(['message' => 'done']);
    }

    public function search(Request $request)
    {
        $search = $request->search;
//        dd($search);
        $shop=Shop::query()->where('shops.name', 'like', "$search%")->get();
        return redirect()->route('shop.list',compact('shop'));
    }
}
