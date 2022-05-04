<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = ['age', 'start_date', 'end_date', 'currency'];

    protected $casts = [
        'age' => 'array',

    ];
}
