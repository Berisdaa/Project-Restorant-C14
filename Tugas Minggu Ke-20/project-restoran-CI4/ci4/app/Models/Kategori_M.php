<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class Kategori_M extends Model{

        protected $table = 'tblkategori';
        
        protected $allowedFields = ['kategori','keterangan'];

        protected $primaryKey = 'idkategori';

        protected $validationRules    = [
            'kategori' => 'alpha_numeric_space|min_length[3]|is_unique[tblkategori.kategori]'
        ];

        protected $validationMessages = [
            'kategori' => [
                'alpha_numeric_space' => 'Tidak Boleh Menggunakan Simbol',
                'min_length' => 'Minimal 3 Karakter',
                'is_unique' => 'Ada Data Yang Sama'
            ]
        ];

    }


?>