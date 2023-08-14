<?php

namespace App\Lib\Repositories;

use App\Models\Bond;

class BondRepository
{
    public function selectById($id)
    {
        return Bond::where('id_bond', $id)->firstOrFail();
    }
}
