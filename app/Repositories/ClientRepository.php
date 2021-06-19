<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    protected $entity;

    public function __construct(Client $client) {
        $this->entity = $client;
    }

    public function createNewClient(array $data)
    {
        return $this->entity->create($data);
    }

    public function getClientById(int $id)
    {
        return $this->entity->find($id)->first();
    }
}