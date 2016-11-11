<?php

namespace App\Property;

use App\Traits\Residential;
use App\Contracts\ResidentialContract;

class Apartment extends Property implements ResidentialContract
{
    use Residential;
}