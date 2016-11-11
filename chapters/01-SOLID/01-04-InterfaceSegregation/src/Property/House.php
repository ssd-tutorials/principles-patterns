<?php

namespace App\Property;

use App\Traits\MultiStorey;
use App\Traits\LargeResidential;
use App\Contracts\MultiStoreyContract;
use App\Contracts\LargeResidentialContract;

class House extends Property implements MultiStoreyContract, LargeResidentialContract
{
    use LargeResidential, MultiStorey;
}