<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['P_id','C_id','P_imgPath', 'P_name', 'P_price','P_storage', 'P_color', 'P_quantity', 'update_at'];
}
