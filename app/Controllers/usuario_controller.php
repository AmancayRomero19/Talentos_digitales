<?php
namespace App\Controllers;
use App\Models\usuarios_model; //Llamamos a la tabla que se encuentra en el "Model"
use CodeIgniter\Controller;

class usuario_controller extends Controller{

    public function __construct(){
        helper(['form', 'url']);
    }

    public function create() {
        $dato['titulo']= 'Registro';
        echo view('front/head_view',$dato);
        echo view('front/navbar_view');
        echo view('back/usuario/registro');
        echo view('front/footer_view');
    }

    public function formValidation()
    {
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario'  => 'required|min_length[3]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);
    
        $formModel = new usuarios_model();
    
        if (!$input) {
            $data['titulo'] = 'Registro';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $nombre = $this->request->input->post('nombre');
            $apellido =$this->request->input->post('apellido');
            $usuario =$this->request->input->post('usuario');
            $email = $this->request->input->post('email');
            $pass = password_hash($this->request->input->post('pass'), PASSWORD_DEFAULT);
    
            $formModel->save([
                'nombre'   => $nombre,  
                'apellido' => $apellido,
                'usuario'  => $usuario,
                'email'    => $email, 
                'pass'     => $pass,
            ]);
    
            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to(base_url('/login'));
        }
    }
}