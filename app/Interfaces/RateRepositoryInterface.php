<?php

namespace App\Interfaces;

interface RateRepositoryInterface 
{
    public function getRateByCode($sourceCodeId, $destinationCodeId);
}