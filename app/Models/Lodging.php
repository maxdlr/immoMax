<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lodging extends Model
{
    use HasFactory;

    public function lodgingType(): HasOne
    {
        return $this->hasOne(LodgingType::class, 'lodgingType_foreignKey');
    }
}
