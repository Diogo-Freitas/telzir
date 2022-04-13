<?php

namespace Tests\Unit;

use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\RateRepositoryInterface;
use App\Services\CallService;
use PHPUnit\Framework\TestCase;

class CallServiceTest extends TestCase
{
    public function test_call_cost_return_correct_value()
    {
        $planRepository = $this->createMock(PlanRepositoryInterface::class);
        $rateRepository = $this->createMock(RateRepositoryInterface::class);

        $callService = new CallService($rateRepository, $planRepository);

        $planRepository->method('getPlanById')->willReturn(new \App\Models\Plan(['free_time' => 60]));

        $rateRepository->method('getRateByCode')->willReturn(new \App\Models\Rate(['value' => 1.7]));

        $result = $callService->cost(1, 2, 80);

        $this->assertEquals(136, $result);
    }

    public function test_call_plan_cost_return_correct_value()
    {
        $planRepository = $this->createMock(PlanRepositoryInterface::class);
        $rateRepository = $this->createMock(RateRepositoryInterface::class);

        $callService = new CallService($rateRepository, $planRepository);

        $planRepository->method('getPlanById')->willReturn(new \App\Models\Plan(['free_time' => 60]));

        $rateRepository->method('getRateByCode')->willReturn(new \App\Models\Rate(['value' => 1.7]));

        $result = $callService->planCost(1, 2, 80, 1);

        $this->assertEquals(37.40, $result);
    }

    public function test_call_plan_cost_return_free_value()
    {
        $planRepository = $this->createMock(PlanRepositoryInterface::class);
        $rateRepository = $this->createMock(RateRepositoryInterface::class);

        $callService = new CallService($rateRepository, $planRepository);

        $planRepository->method('getPlanById')->willReturn(new \App\Models\Plan(['free_time' => 30]));

        $rateRepository->method('getRateByCode')->willReturn(new \App\Models\Rate(['value' => 1.9]));

        $result = $callService->planCost(1, 2, 20, 1);

        $this->assertEquals(0, $result);
    }
}
