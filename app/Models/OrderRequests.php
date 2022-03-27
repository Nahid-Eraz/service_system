<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequests extends Model
{
    use HasFactory;
    protected $table = 'orderrequests';
    protected $fillable = ['users_id','work_order_id',
    'amount',
    'slug',
    'status'];

    public function workorder(){
        return $this->belongsTo(WorkOrder::class,'work_order_id');
    }
    public function user_name(){
        return $this->belongsTo(User::class,'users_id');
    }

}
