<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function migrate(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->text('path')->nullable(false);
            $table->integer('size')->nullable(false);
            $table->text('alt');
            $table->foreignId('lodging_id')->nullable();
            $table->timestamps();
        });
    }

    public static function getProperties(): array
    {
        return [
            'path',
            'size',
            'alt',
        ];
    }

    public static function getPropertyFormValidation(): array
    {
        return [
            'path' => 'required|string|max:1000',
            'size' => 'required|integer',
            'alt' => 'nullable|string|max:255',
        ];
    }

    public function lodging(): BelongsTo
    {
        return $this->belongsTo(Lodging::class);
    }
}
