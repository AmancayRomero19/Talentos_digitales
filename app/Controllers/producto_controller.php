<?php
namespace App\Controllers;

use App\Models\Producto_model;
use CodeIgniter\Controller;

class Producto_controller extends Controller {
    public function __construct() {
        helper(['form', 'url']);
    }

    public function index() {
        $data['titulo'] = 'Catálogo';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/principal');
        echo view('front/footer_view');
    }

    public function create() {
        $data['titulo'] = 'Agregar Producto';
        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/productos/registro_productos');
        echo view('front/footer_view');
    }

    public function formValidation() {
        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'precio' => 'required|numeric|min_length[1]|max_length[7]',
            'stock' => 'required|numeric|min_length[1]',
        ]);

        if (!$input) {
            $data['titulo'] = 'Agregar Producto';
            echo view('front/head_view', $data);
            echo view('front/navbar_view');
            echo view('back/productos/registro_productos', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $formModel = new producto_model();
            $request = service('request'); // Aquí obtenemos la instancia de la solicitud.
            
            $data = [
                'nombre' => $request->getVar('nombre'), // Accede a los datos usando $request
                'precio' => $request->getVar('precio'),
                'stock' => $request->getVar('stock')
            ];
            
            $formModel->save($data);


            session()->setFlashdata('success', 'Catálogo actualizado');
            return redirect()->to(base_url('/agregar_productos'));
        }
    }
}

