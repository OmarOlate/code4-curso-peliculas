<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Pelicula extends ResourceController
{

    protected $modelName = 'App\Models\PeliculaModel';
    protected $format = 'json';


    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {

        return $this->respond($this->model->find($id));
    }
    public function create()
    {

        if ($this->validate('peliculas')) {
            $id = $this->model->insert([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
            ]);
        } else {

            return $this->respond($this->validator->getErrors(), 400);
        }

        return $this->respond($id);
    }

    public function update($id = null)
    {

        if ($this->validate('peliculas')) {
            $this->model->update($id, [
                'title' => $this->request->getRawInput()['title'],
                'description' => $this->request->getRawInput()['description']
            ]);
        } else {

            if ($this->validator->getError('title')) {
                return $this->respond($this->validator->getErrors('title'), 400);
            }

            if ($this->validator->getError('description')) {
                return $this->respond($this->validator->getErrors('description'), 400);
            }
            // return $this->respond($this->validator->getErrors(), 400);

        }
        return $this->respond($id);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond('ok');
    }
}
