<?php

namespace App\Repositories;

use App\Models\DirectDistanceDialing;
use App\Interfaces\DirectDistanceDialingRepositoryInterface;

class DirectDistanceDialingRepository implements DirectDistanceDialingRepositoryInterface
{
    public function getAllDirectDistanceDialings()
    {
        return DirectDistanceDialing::orderBy('code')->get();
    }
}