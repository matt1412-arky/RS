<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class m_customer_member extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = "m_customer_members";
    protected $fillable =['parent_biodata_id','customer_id','customer_relation_id','create_by','create_on'];

    public function biodata():BelongsTo{
        return $this->belongsTo(m_biodata::class);
    }

    public function customer():BelongsTo{
        return $this->belongsTo(m_customer::class);
    }

    public function customerRelation():BelongsTo{
        return $this->belongsTo(m_customer_relation::class);
    }
}
