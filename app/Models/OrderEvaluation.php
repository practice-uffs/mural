<?php

namespace App\Models;

use App\Models\Feedback;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEvaluation extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'feedback_id',
        'hash'
    ];

    public function feedback() {
        return $this->belongsTo(Feedback::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
