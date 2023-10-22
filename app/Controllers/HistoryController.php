<?php
namespace App\Controllers;
use App\Models\transactionModel;
use App\Models\transactionDetailModel;
use App\Models\productsModel;

class HistoryController extends BaseController{
    protected $transaction;
    protected $transactionDetail;
    protected $product;
    protected $validation;

    function __construct(){
    helper('form');
    $this->validation = \Config\Services::validation();
		$this->transaction = new transactionModel();
		$this->transactionDetail = new transactionDetailModel();
		$this->product = new productsModel();
    }

    function history(){
        $data['transactions']  = $this->transaction->findAll();
        $data['transactionDetails']  = $this->transactionDetail->findAll();
        $data['products']  = $this->product->findAll();
        return view('this_history',$data);
      }

    function transaction(){
      $data['transactions']  = $this->transaction->findAll();
      $data['transactionDetails']  = $this->transactionDetail->findAll();
      $data['products']  = $this->product->findAll();
      return view('this_transaction',$data);
    }

    public function transaction_completed($id)
    {
        $dataTransaction = $this->transaction->find($id);

        $dataStatus = ['status' => 1];

        $this->transaction->update($id,$dataStatus);
  

        session()->setflashdata('success', 'Status successfully changed');
        return redirect()->to(base_url('transaction'));
    }

    public function transaction_incompleted($id)
    {
        $dataTransaction = $this->transaction->find($id);

        $dataStatus = ['status' => 0];

        $this->transaction->update($id,$dataStatus);
  

        session()->setflashdata('success', 'Status successfully changed');
        return redirect()->to(base_url('transaction'));
    }

}


?>