<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $entity;

    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation)
    {
        $data = [
            'order_id' => $idOrder,
            'client_id' => $idClient,        
            'stars' => $evaluation['stars'],
            'comment' => isset($evaluation['comment']) ? $evaluation['comment'] : ''
        ];

        return $this->entity->create($data);
    }


    public function getEvalutionByOrder(int $idOrder)
    {

        return $this->entity->where('order_id', $idOrder)->get();
    }


    public function getEvalutionByClient(int $idClient)
    {
        return $this->entity->where('client_id', $idClient)->get();
    }

    public function getEvalutionById(int $id)
    {
        return $this->entity->find($id)->get();
    }

    public function getEvalutionByClientIdByOrderId(int $idOrder, int $idClient)
    {
        return $this->entity
            ->where('order_id', $idOrder)
            ->where('client_id', $idClient)
            ->get();
    }
}
