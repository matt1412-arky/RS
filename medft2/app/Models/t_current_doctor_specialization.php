<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class t_current_doctor_specialization extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "t_current_doctor_specializations";  
    protected $fillable = ['doctor_id', 'specialization_id',
                          'create_by','create_on'];

    public function doctor():BelongsTo{
        return $this->belongsTo(m_doctor::class, 'doctor_id','id');
    }
    public function specialization():BelongsTo{
        return $this->belongsTo(m_specialization::class, 'specialization_id','id');
    }
}
