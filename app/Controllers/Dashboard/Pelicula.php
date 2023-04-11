<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PeliculaModel;


class Pelicula extends BaseController
{
    public function show($id)
    {
        $peliculaModel = new PeliculaModel();

        // var_dump($peliculaModel->asArray()->find($id));
        // var_dump($peliculaModel->asObject()->find($id)->id);
       
        
        echo view('/dashboard/pelicula/show', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function index()
    {

        $peliculaModel = new PeliculaModel();

        echo view('dashboard/pelicula/index', [
            'peliculas' => $peliculaModel->findAll()
        ]);
    }
    public function new()
    {
        echo view('dashboard/pelicula/new', [
            'pelicula' => [
                'title' => '',
                'description' => ''
            ]
        ]);
    }
    public function create()
    {

        $peliculaModel = new PeliculaModel();

        if ($this->validate('peliculas')) {
            $peliculaModel->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);
        }else{
            var_dump($this->validator->getError('title'));
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
            return redirect()->back()->withInput();
        }
        return redirect()->to('/dashboard/pelicula')->with('mensaje', '¨Pelicula ingresada con éxito');
    }
    public function edit($id)
    {
        $peliculaModel = new PeliculaModel();
        echo view('dashboard/pelicula/edit', [
            'pelicula' => $peliculaModel->find($id)
        ]);
    }
    public function update($id)
    {
        $peliculaModel = new PeliculaModel();



        if ($this->validate('peliculas')) {
            $peliculaModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);
        }else{
            var_dump($this->validator->getError('title'));
            session()->setFlashdata([
                'validation' => $this->validator
            ]);
            return redirect()->back()->withInput();
        }
        return redirect()->to('/dashboard/pelicula')->with('mensaje', 'Pelicula modificada con éxito');
    }
    public function delete($id)
    {
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);
        return redirect()->back();
    }

    public function test($n)
    {
        echo "hola mundo, el numero es " . $n;
    }
}
