<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_order';
    protected $primaryKey = 'id_purchase_order';
    protected $guarded = ['id_purchase_order'];

    public function bond()
    {
        return $this->belongsTo(Bond::class,'fk_id_bond','id_bond');
    }
}
