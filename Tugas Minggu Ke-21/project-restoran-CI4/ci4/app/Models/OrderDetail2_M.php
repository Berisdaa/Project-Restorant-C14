<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class OrderDetail2_M extends Model{

        protected $table = 'tblorderdetail';

        protected $allowedFields = ['idorder','idmenu','jumlah','hargajual'];
        

    }


?>