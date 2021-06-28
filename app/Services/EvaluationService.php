<?php

namespace App\Services;

use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\Client\Request;

class EvaluationService
{

    protected $orderRepository, $evaluationRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluationRepository,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->evaluationRepository = $evaluationRepository;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder)
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->newEvaluationOrder($order, $clientId);
    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }

}
