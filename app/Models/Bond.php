<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;

    protected $table = 'bond';
    protected $primaryKey = 'id_bond';
    protected $guarded = ['id_bond'];

    protected $dates = ['created_at', 'updated_at', 'issue_date','last_circulation_date'];
}
