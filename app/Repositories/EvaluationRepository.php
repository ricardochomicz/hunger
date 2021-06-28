<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;

class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $entity;

    public function __construct(Evaluation $evaluation) {
        $this->entity = $evaluation;
    }

    public function newEvaluationOrder(int $idOrder, int $idClient)
    {
    }


    public function getEvalutionByOrder(int $idOrder)
    {
    }


    public function getEvalutionByClient(int $idClient)
    {
    }
}
