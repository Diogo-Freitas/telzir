<?php

namespace App\Interfaces;

interface CallServiceInterface 
{
    public function cost($sourceCodeId, $destinationCodeId, $callTime);
    public function planCost($sourceCodeId, $destinationCodeId, $callTime, $planId);
}