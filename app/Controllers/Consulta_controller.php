<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use CodeIgniter\Controller;

class Consulta_controller extends Controller
{
    public function index()
    {
        $data['titulo'] = 'Consulta';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/consultas/consulta_productos');
        echo view('front/footer_view');
    }

    public function enviar_consulta()
    {
        $consultaModel = new Consulta_model();
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $motivo = $_POST['motivo'];
        $descripcion = $_POST['descripcion'];
    
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'motivo' => $motivo,
            'descripcion' => $descripcion
        ];
    
        $consultaModel->insert($data);

        if ($consultaModel->affectedRows() > 0) {
            session()->setFlashdata('success', 'Consulta realizada');
            return redirect()->to(base_url('/consulta_productos'));
        } else {
            session()->setFlashdata('error', 'No se pudo realizar la consulta');
            return redirect()->to(base_url('/consulta_productos'));
        }
    }
    
}
