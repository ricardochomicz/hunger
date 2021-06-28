<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation);
    public function getEvalutionByOrder(int $idOrder);
    public function getEvalutionByClient(int $idClient);
    public function getEvalutionById(int $id);
    public function getEvalutionByClientIdByOrderId(int $idOrder, int $idClient);
}