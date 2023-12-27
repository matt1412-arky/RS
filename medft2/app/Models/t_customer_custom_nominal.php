<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_customer_custom_nominal extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "t_customer_custom_nominals";
    protected $fillable = ['customer_id','nominal','created_by','created_on'];

    public function level()
    {
        return $this->belongsTo(m_location_level::class, 'location_level_id');
    }
    
}
