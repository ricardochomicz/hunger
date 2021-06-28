<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

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

    public function registerProductsOrder(int $orderId, array $products)
    {
        $orderProducts = [];

        //recupar id order
        $order = $this->entity->find($orderId);

        //percorre array products
        foreach ($products as $product) {
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price']
            ];
        }
        //cadastra na tabela utilizando relacionamento
        $order->products()->attach($orderProducts);

        // foreach ($products as $product) {
        //     //cria array multidimensional
        //     array_push($orderProducts, [
        //         'order_id' => $orderId,
        //         'product_id' => $product['id'],
        //         'qty' => $product['qty'],
        //         'price' => $product['price']
        //     ]);
        // }

        // //insere na tabela pivot
        // DB::table('order_product')->insert($orderProducts);
    }

    public function getOrdersByClientId(int $idClient)
    {
        $orders = $this->entity->where('client_id', $idClient)->paginate();

        return $orders;
    }
}
