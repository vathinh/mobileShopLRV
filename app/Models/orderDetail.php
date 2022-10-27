<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['OD_id','O_id', 'P_id','QD_quantity'];
    public $timestamps = false;

}
