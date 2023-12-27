<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_customer_wallet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "t_customer_wallets";
    protected $fillable = ['customer_id','pin','balance','barcode','points','created_by','created_on'];
}
