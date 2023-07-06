<?php
namespace App\Controllers;
use App\Models\productsModel;

class ProductController extends BaseController{
    protected $product;
    protected $validation;

    function __construct(){
        helper('form');
        $this->validation = \Config\Services::validation();
		$this->product = new productsModel();
    }

    function index(){
      $data['products']  = $this->product->findAll();
      return view('this_products',$data);
    }

    // fungsi create
    public function create(){
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'barang');
        $errors = $this->validation->getErrors();

        if(!$errors){
            $dataForm = [ 
                'nama' => $this->request->getPost('nama'),
                'hrg' => $this->request->getPost('harga'),
                'jml' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),

            ];

            $dataFoto = $this->request->getFile('foto');

            if ($dataFoto->isValid()){
                $fileName = $dataFoto->getRandomName();
                $dataFoto->move('public/img/', $fileName);
                $dataForm['foto'] = $fileName;
            }  

            $this->product->insert($dataForm);

            return redirect('products')->with('success','Data sucessfully added');
        }else{
            return redirect('products')->with('failed',implode("<br>",$errors));
        }
    }

    // fungsi edit
    public function edit($id){
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'barang');
        $errors = $this->validation->getErrors();

        if(!$errors){
            $dataForm = [ 
                'nama' => $this->request->getPost('nama'),
                'hrg' => $this->request->getPost('harga'),
                'jml' => $this->request->getPost('jumlah'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];

            if($this->request->getPost('check')==1){
                $dataFoto = $this->request->getFile('foto');
                $fileName = $dataFoto->getRandomName();
                $dataFoto->move('public/img/', $fileName);
                $dataForm['foto'] = $fileName;
            }

            $this->product->update($id, $dataForm);

            return redirect('products')->with('success','Data sucessfully saved');
        }else{
            return redirect('products')->with('failed',implode("<br>",$errors));
        }
    }

    // fungsi hapus
    public function delete($id){
        $dataProduk = $this->product->find($id);

        if ($dataProduk['foto'] != '' and file_exists("public/img/" . $dataProduk['foto'] . "")) {
            unlink("public/img/" . $dataProduk['foto']);
        }

        $this->product->delete($id);

        return redirect('products')->with('success','Data sucessfully deleted');
    }
}

?>