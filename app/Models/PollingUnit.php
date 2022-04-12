<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;
    protected $table = 'polling_unit';

    protected $fillable = [
        'polling_unit_number',
        'polling_unit_name',
    ];
}
