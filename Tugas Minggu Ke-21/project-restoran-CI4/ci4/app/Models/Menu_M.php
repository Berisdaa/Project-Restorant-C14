<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class Menu_M extends Model{

        protected $table = 'tblmenu';

        protected $primaryKey = 'idmenu';

        protected $allowedFields = ['idkategori', 'menu', 'gambar', 'harga'];

        protected $validationRules    = [
            'menu' => 'alpha_numeric_space|min_length[3]|is_unique[tblmenu.menu]',
            'harga' => 'numeric'
        ];

        protected $validationMessages = [
            'menu' => [
                'alpha_numeric_space' => 'Tidak Boleh Menggunakan Simbol',
                'min_length' => 'Minimal 3 Karakter',
                'is_unique' => 'Ada Data Yang Sama'
            ],

            'harga' => [
                'numeric' => 'Harus Berisi Angka'
            ]
        ];

    }


?>