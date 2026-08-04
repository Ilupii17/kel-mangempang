<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'label',
        'nilai',
        'sub_label',
        'persentase',
        'icon',
        'urutan',
    ];
}
