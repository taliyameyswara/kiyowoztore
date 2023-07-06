<?php
namespace App\Controllers;
use App\Models\userModel;

class UserController extends BaseController{
    protected $user;
    protected $validation;

    function __construct(){
        helper('form');
        $this->validation = \Config\Services::validation();
		$this->user = new userModel();
    }

    // tampilan register
    public function register(){
        return view('this_register');
    }

    // menampilkan semua data user
    function index(){
        $data['users']  = $this->user->findAll();
        return view('this_user',$data);
      }


    // digunakan utk tambah user (halaman register dan user)
    public function create(){
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'user');
            $errors = $this->validation->getErrors();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');

           if(!$errors){
                $dataForm = [ 
                    'username' => $username,
                    'password' => md5($password),
                    'role' => $role
                ];
                
                $this->user->insert($dataForm);

                return redirect()->back()->with('success','Success');
           }else{
                return redirect()->back()->with('failed',implode("<br>",$errors));
           }
    }

    // untuk mengubah password (halaman profile)
    public function changePassword(){
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $currentpass = $this->request->getVar('currentpass');
            $newpass = $this->request->getVar('newpass');

            $dataUser = $this->user->where(['username' => $username])->first();

            if ($dataUser) {
                if (md5($currentpass) == $dataUser['password']) {
                    $this->user->update($dataUser, ['password' => md5($newpass)]);
                    return redirect('profile')->with('success', 'Password changed successfully');
                } else {
                    return redirect('profile')->with('failed', 'Wrong current password');
                }
            } else {
                return redirect('profile')->with('failed', 'Wrong current password');
            }
        } else {
            return view('profile');
        }
    }

    // fungsi utk mengedit data user oleh admin
    public function edit($id){
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'user');
        $errors = $this->validation->getErrors();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

       if(!$errors){
            $dataForm = [ 
                'username' => $username,
                'password' => md5($password),
                'role' => $role
            ];
            

            $this->user->update($id,$dataForm);

            return redirect('user')->with('success','Edit Success');
       }else{
            return redirect('user')->with('failed',implode("<br>",$errors));
       }
    }

    public function delete($id){
        $dataUser = $this->user->find($id);
        
        $this->user->delete($id);

        return redirect('user')->with('success','Data sucessfully deleted');
    }
       

}


?>