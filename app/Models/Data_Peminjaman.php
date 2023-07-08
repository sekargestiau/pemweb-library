<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'data_peminjaman';

    protected $fillable = [
        'name',
        'email',
        'title',
        'tgl_pinjam',
    ];
}
