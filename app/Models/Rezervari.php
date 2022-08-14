<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervari extends Model
{
    protected $fillable = ['id', 'name', 'phone_number', 'stand', 'count_stands', 'count_fishers', 'from_date', 'to_date', 'nights', 'price'];
    use HasFactory;
}
