<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['p_id', 'p_name', 'p_price','p_storage', 'p_color', 'p_qty' ];
}
