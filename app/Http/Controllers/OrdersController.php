<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrdersResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $orders = OrdersResource::collection(Order::
            with(['status', 'user', 'service'])
            ->search(trim($request->search))
            ->orderBy('id', 'desc')
            ->paginate(30));

        return inertia('Orders/Orders', compact('orders'));
    }

    public function show(Order $order): OrdersResource
    {
        return new OrdersResource($order);
    }

    public function store(OrderRequest $request): OrdersResource
    {
        $order = Order::create($request->validated());

        return new OrdersResource($order);
    }

    public function changeStatus(Request $request)
    {
        $order = Order::find($request->order_id);

        $order->status = $request->status;

        $order->save();

        return redirect()->back();
    }
}
