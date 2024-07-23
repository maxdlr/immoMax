<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lodging extends Model
{
    use HasFactory;

    public static function migrate(): void
    {
        Schema::create('lodgings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable(false);
            $table->text('description');
            $table->tinyInteger('roomCount')->nullable(false);
            $table->integer('surface')->nullable(false);
            $table->float('price', 2)->nullable(false);
            $table->foreignId('lodging_type_id');
            $table->timestamps();
        });
    }

    public static function getProperties(): array
    {
        return [
            'title',
            'description',
            'roomCount',
            'surface',
            'price'
        ];
    }

    public static function getPropertyFormValidation(): array
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'roomCount' => 'required|integer',
            'surface' => 'required|integer',
            'price' => 'required|numeric',
        ];
    }

    public function lodgingType(): BelongsTo
    {
        return $this->belongsTo(LodgingType::class);
    }

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
