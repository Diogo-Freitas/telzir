<?php

namespace App\Repositories;

use App\Interfaces\RateRepositoryInterface;
use App\Models\Rate;

class RateRepository implements RateRepositoryInterface
{
    public function getRateByCode($sourceCodeId, $destinationCodeId)
    {
        return Rate::select('value')
            ->where('source_code_id', $sourceCodeId)
            ->where('destination_code_id', $destinationCodeId)
            ->first();
    }

}