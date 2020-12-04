<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_M extends Model
{

    protected $table = 'tblpelanggan';

    protected $primaryKey = 'idpelanggan';

    protected $allowedFields = ['pelanggan', 'alamat', 'telp', 'email', 'password', 'aktif'];

    protected $validationRules    = [
        'email' => 'valid_email|is_unique[tblpelanggan.email]',
        'telp' => 'numeric'
    ];

    protected $validationMessages = [
        'email' => [
            'valid_email' => 'Email Tidak Sesuai',
            'is_unique' => 'Email Sudah Ada'
        ],

        'telp' => [
            'numeric' => 'Nomor Harus Angka'
        ]
    ];
}
