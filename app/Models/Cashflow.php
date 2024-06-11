<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Cashflow extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid',
        $guarded = [];
}
