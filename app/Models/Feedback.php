<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $primaryKey = 'FB_id';
    protected $fillable = ['P_id','guestName','guestEmail', 'subject','comment','adminReply', 'feedbackdate'];

}
