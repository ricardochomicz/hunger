<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient);
    public function getEvalutionByOrder(int $idOrder);
    public function getEvalutionByClient(int $idClient);
}