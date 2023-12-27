<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class t_doctor_treatment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 't_doctor_treatments';
    protected $fillable = ['name', 'doctor_id', 'created_by', 'created_on','is_delete', 'modified_by', 'modified_on'];

    public function doctor(){
        return $this->belongsTo(m_doctor::class, 'doctor_id', 'id');
    }
}
