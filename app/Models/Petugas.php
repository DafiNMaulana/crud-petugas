<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = "petugas";
    protected $primaryKey = "petugas_id";
    protected $fillable = [
        'petugas_id', 'nama_petugas', 'no_hp', 'alamat_petugas', 'kolom_dibuat'];
}