<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_customer extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_customers";  
    protected $fillable = ['biodata_id',
                          'dob',
                          'gender',
                          'blood_group_id',
                          'rhesus_type',
                          'height',
                          'weight',
                          'create_by','create_on',
                          'modified_by', 'modified_on'];

    public function biodata():BelongsTo{
        return $this->belongsTo(m_biodata::class);
    }
    public function bloodGroupId():BelongsTo{
        return $this->belongsTo(m_blood_group::class);
    }

    // Tata
    public function user()
    {
        return $this->belongsTo(m_user::class, 'biodata_id', 'biodata_id');
    }
}
