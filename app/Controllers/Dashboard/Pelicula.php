<?php
    namespace App\Controllers\Dashboard;
    use App\Controllers\BaseController;
    use App\Models\PeliculaModel;
  

    class Pelicula extends BaseController
    {
        public function show($id)
        {
            $peliculaModel = new PeliculaModel();

            echo view('/dashboard/pelicula/show',[
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
            echo view('dashboard/pelicula/new',[
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
            return redirect()->to('/dashboard/pelicula');
            
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

            $peliculaModel->update($id,[
                'title' => $this->request->getPost('title'), 
                'description' => $this->request->getPost('description')
            ]);
            return redirect()->to('/dashboard/pelicula');
        }
        public function delete($id)
        {
            $peliculaModel = new PeliculaModel();
            $peliculaModel->delete($id);
            return redirect()->back();
        }

    }
