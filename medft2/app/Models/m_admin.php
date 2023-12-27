<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_admin extends Model
{
    use HasFactory;
    protected $table = 'm_admins';
    public $timestamps = false;
    protected $fillable = [
        'biodata_id',
        'code',
    ];

    public function biodata()
    {
        return $this->belongsTo(m_biodata::class, 'biodata_id', 'id');
    }
}
