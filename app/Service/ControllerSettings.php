<?php

namespace App\Service;

use Attribute;

#[Attribute]
class ControllerSettings
{
    public function __construct(
        public string $model
    )
    {
    }
}
