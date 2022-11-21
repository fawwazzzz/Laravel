<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ["name", "phone", "address", "status", "in_date_at", "out_date_at"];
}
