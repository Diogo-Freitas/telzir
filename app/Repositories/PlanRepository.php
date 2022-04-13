<?php

namespace App\Repositories;

use App\Interfaces\PlanRepositoryInterface;
use App\Models\Plan;

class PlanRepository implements PlanRepositoryInterface
{
    public function getAllPlans() 
    {
        return Plan::all();
    }

    public function getPlanById($planId) 
    {
        return Plan::find($planId);
    }

}