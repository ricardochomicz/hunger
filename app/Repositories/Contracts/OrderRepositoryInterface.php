<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function createNewOrder(
        string $identify, 
        float $total, 
        string $status,
        int $company, 
        string $comment = '',
        int $client = null, 
        int $table = null
    );

    public function getOrderByIdentify(string $identify);

    public function registerProductsOrder(int $orderId, array $products);

    public function getOrdersByClientId(int $idClient);
}