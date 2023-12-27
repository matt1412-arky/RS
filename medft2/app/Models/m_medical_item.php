<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_medical_item extends Model
{
    use HasFactory;
    protected $table = "m_medical_items";
    protected $fillable = [
        'name',
        'medical_item_category_id', 
        'composition',
        'medical_item_segmentation_id',
        'manufacturer',
        'indication',
        'dosage',
        'directions',
        'contradiction',
        'caution',
        'packaging',
        'price_max',
        'price_min',
        'image',
        'image_path'
    ];
    public function medical_item_category(){
        return $this->belongsTo(m_medical_item_category::class, 'medical_item_category_id', 'id');
    }
    public function medical_item_segmentation(){
        return $this->belongsTo(m_medical_item_segmentation::class, 'medical_item_segmentation_id', 'id');
    }
}
