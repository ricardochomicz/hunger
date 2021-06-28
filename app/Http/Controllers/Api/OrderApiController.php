<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUpdateOrder;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    protected $ordeService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(StoreUpdateOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());

        return new OrderResource($order);
    }

    public function show($identify)
    {
        if(!$order = $this->orderService->getOrderByIdentify($identify)){
            return response()->json(['message' => 'Not found'], 404);
        }

        return new OrderResource($order);

    }
}
