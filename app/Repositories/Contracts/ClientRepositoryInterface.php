<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface{

    public function createNewClient(array $data);
    public function getClientById(int $id);
}