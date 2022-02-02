<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $fillable = [
    'division_id',
    'district_id',
    'upazila_id',
    'user_id',
    'address',
    'name',
    'date_of_birth',
    'gender',
    'phone_no',
    'email',
    'nid',
    'photo'];
    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
