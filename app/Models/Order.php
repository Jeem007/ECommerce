<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function District(){
        return $this->belongsTo(District::class, 'district_id');
    }
    public function Division(){
        return $this->belongsTo(Division::class, 'division_id');
    }


}
