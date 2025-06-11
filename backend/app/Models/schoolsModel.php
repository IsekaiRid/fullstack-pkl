<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class schoolsModel extends Model
{
    use HasFactory;

    protected $table = 'schools';
    protected $primaryKey = 'id_schools';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'kontak',
        'logo'

    ];
}
