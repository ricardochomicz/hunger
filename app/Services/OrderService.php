<?php

namespace App\Services;

use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TableRepositoryInterface;

class OrderService
{

    protected $orderRepository, $companyRepository, $tableRepository, $productRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        CompanyRepositoryInterface $companyRepository,
        TableRepositoryInterface $tableRepository,
        ProductRepositoryInterface $productRepository) {
        $this->orderRepository = $orderRepository;
        $this->companyRepository = $companyRepository;
        $this->tableRepository = $tableRepository;
        $this->productRepository = $productRepository;
    }

    public function createNewOrder(array $order)
    {
        $productsOrder = $this->getProductsByOrder($order['products'] ?? []);

        $identify = $this->getIdentifyOrder();
        $total = $this->totalOrder($productsOrder);
        $status = 'open';
        $company = $this->getCompanyOrder($order['token_company']);
        $comment = isset($order['comment']) ? $order['comment'] : '';
        $client = $this->getClientOrder();
        $table = $this->getTableOrder($order['table'] ?? '');

        $order = $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $company,
            $comment,
            $client,
            $table
        );

        $this->orderRepository->registerProductsOrder($order->id, $productsOrder);

        return $order;
    }

    private function getIdentifyOrder(int $qtyCharacters = 8)
    {
        //funcao embaralha as letras
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvxz');
        
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 123456789;
        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCharacters);

        //verifica se já existe número pedido cadastrado
        if($this->orderRepository->getOrderByIdentify($identify)){
            $this->getIdentifyOrder($qtyCharacters + 1);
        }   

        return $identify;
        
    }

    private function totalOrder(array $products): float
    {
        $total = 0;

        foreach ($products as $product) {
            $total += ($product['price'] * $product['qty']);
        }

        return (float) $total;
    }

    private function getProductsByOrder(array $productsOrder)
    {
        $products = [];
        foreach ($productsOrder as $productOrder) {
            //busca o identificador do produto
            $product = $this->productRepository->getProductByUuid($productOrder['identify']);
            array_push($products, [
                'id' => $product->id, 
                'qty' => $productOrder['qty'],
                'price' => $product->price
            ]);
        }
        return $products;
    }

    private function getCompanyOrder(string $uuid)
    {
        $company = $this->companyRepository->getCompanyByUuid($uuid);

        return $company->id;
    }

    private function getTableOrder(string $uuid = '')
    {
        if($uuid){
            $table = $this->tableRepository->getTableByUuid($uuid);

            return $table->id;
        }

       
    }

    private function getClientOrder()
    {
        $client = auth()->check() ? auth()->user()->id : '';

        return $client;
    }
}
