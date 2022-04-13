<?php

namespace App\Interfaces;

interface PlanRepositoryInterface 
{
    public function getAllPlans();
    public function getPlanById($planId);
}