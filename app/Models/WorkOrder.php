<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $table = 'work_order';
    protected $fillable = ['users_id','category_id',
    'division_id',
    'district_id',
    'upazila_id',
    'order_title',
    'order_description',
    'address',
    'expiration_date',
    'worker_amount',
    'status',
    'move_to_trash',
    'slug'];

    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id');
    }
}
