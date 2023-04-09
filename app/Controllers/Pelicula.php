<?php
    namespace App\Controllers;
    use App\Models\PeliculaModel;

    class Pelicula extends BaseController
    {
        public function show($id)
        {
            $peliculaModel = new PeliculaModel();

            echo view('/pelicula/show',[
                'pelicula' => $peliculaModel->find($id)
            ]);
        }
        public function index()
        {

            $peliculaModel = new PeliculaModel();

            echo view('pelicula/index', [
                'peliculas' => $peliculaModel->findAll()
            ]);
        }
        public function new()
        {
            echo view('pelicula/new',[
                'pelicula' => [
                    'title' => '',
                    'description' => ''
                ]
            ]);
        }
        public function create()
        {

            $peliculaModel = new PeliculaModel();

            $peliculaModel->insert([
                'title' =>$this->request->getPost('title'),
                'description' =>$this->request->getPost('description'),
            ]);

            
        }
        public function edit($id)
        {
            $peliculaModel = new PeliculaModel();
            echo view('pelicula/edit', [
                'pelicula' => $peliculaModel->find($id)
            ]);
        }
        public function update($id)
        {
            $peliculaModel = new PeliculaModel();

            $peliculaModel->update($id,[
                'title' => $this->request->getPost('title'), 
                'description' => $this->request->getPost('description')
            ]);
            echo 'update';
        }
        public function delete($id)
        {
            $peliculaModel = new PeliculaModel();
            $peliculaModel->delete($id);
            echo "delete";
        }

    }