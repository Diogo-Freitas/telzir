<?php

namespace App\Services;

use App\Interfaces\CallServiceInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\RateRepositoryInterface;

class CallService implements CallServiceInterface
{
    const SUPERPLUS = 1.1;

    protected $rateRepository;
    protected $planRepository;

    public function __construct(RateRepositoryInterface $rateRepository, PlanRepositoryInterface $planRepository)
    {
        $this->rateRepository = $rateRepository;
        $this->planRepository = $planRepository;
    }

    public function cost($sourceCodeId, $destinationCodeId, $callTime)
    {
        $rate = $this->rateRepository->getRateByCode($sourceCodeId, $destinationCodeId);

        return $rate ? $callTime * $rate->value : null;
    }

    public function planCost($sourceCodeId, $destinationCodeId, $callTime, $planId)
    {
        $rate = $this->rateRepository->getRateByCode($sourceCodeId, $destinationCodeId);

        $plan = $this->planRepository->getPlanById($planId);

        if(!$rate || !$plan) {
            return null;
        }

        if ($callTime <= $plan->free_time) {
            return 0;
        }

        return (($callTime - $plan->free_time) * $rate->value) * self::SUPERPLUS;
    }
}