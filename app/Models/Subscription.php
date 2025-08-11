<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'data_center',
        'subdomain_url',
        'siklus',
        'harga',
        'nama_perusahaan',
        'provinsi',
        'kabupaten',
        'alamat',
        'telepon',
        'setuju',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
