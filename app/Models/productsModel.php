<?php
// menampilkan data dari db

namespace App\Models;

use CodeIgniter\Model;

class productsModel extends Model
		{
			protected $table = 'barang'; 
			protected $primaryKey = 'id';
			protected $allowedFields = [
				'nama','hrg','jml','keterangan','foto'
			];  
		}


?>