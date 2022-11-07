<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['O_id','id', 'O_delieveryAddress', 'O_status','O_date','O_method'];

    protected function O_status(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["pending", "shipping", "decline"][$value],
        );
    }

}
