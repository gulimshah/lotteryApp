<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryModel extends Model
{
    use HasFactory;
    protected $table = 'lotteries';
    protected $guarded = []; 
}
