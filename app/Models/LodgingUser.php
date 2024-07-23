<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LodgingUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function migrate(): void
    {
        Schema::create('lodging_user', function (Blueprint $table) {
            $table->foreignId('lodging_id');
            $table->foreignId('user_id');
        });
    }
}
