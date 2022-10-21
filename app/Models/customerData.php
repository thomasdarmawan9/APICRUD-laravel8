<?php

namespace App\Models\customerData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerData extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_tlp'       
    ];
}
