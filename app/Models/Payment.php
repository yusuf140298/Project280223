<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_reimbursement',
        'send_from_user',
        'information',
        'payment',
        'image',
        'status',
    ];
}
