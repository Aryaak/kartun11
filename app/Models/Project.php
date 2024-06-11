<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';
    protected $guarded = [];
}
