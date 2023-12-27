<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_customer_wallet_withdraw extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "t_customer_wallets";
    protected $fillable = ['customer_id','wallet_default_nominal_id','amount','bank_name','account_number','account_name','otp','created_by','created_on'];
}
