<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LodgingType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function migrate(): void
    {
        Schema::create('lodging_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });
    }

    public static function getProperties(): array
    {
        return [
            'name'
        ];
    }

    public static function getPropertyFormValidation(): array
    {
        return [
            'name' => 'required|string|max:100',
        ];
    }

    public function lodging(): HasMany
    {
        return $this->hasMany(Lodging::class);
    }
}
