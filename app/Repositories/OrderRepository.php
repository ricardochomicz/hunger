<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $company,
        string $comment = '',
        $client = '',
        $table = ''
    ) {
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'company_id' => $company,
        ];

        if ($client) $data['client_id'] = $client;
        if ($table) $data['table_id'] = $table;
        if ($comment) $data['comment'] = $comment;

        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity
            ->where('identify', $identify)
            ->first();
    }
}
