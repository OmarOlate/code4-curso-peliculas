<?php
namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\CategoriaModel;

class Categoria extends BaseController
{
    public function index()
    {
        $categoriaModel = new CategoriaModel();
        echo view('dashboard/categoria/index', [
            'categorias' =>$categoriaModel->findAll()
        ]);
    }
    public function new()
    {
        echo view('/dashboard/categoria/new',[
            'categoria' => [
                'title' => ''
            ]
        ]);
    }
    public function create()
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->insert([
            'title' =>$this->request->getPost('title'),
        ]);
        return redirect()->to('/dashboard/categoria');
    }
    public function show($id)
    {
        $categoriaModel = new CategoriaModel();

        echo view('/dashboard/categoria/show', [
            'categoria' => $categoriaModel->find($id)
        ]);
    }
    public function edit($id)
    {
        $categoriaModel = new CategoriaModel();

        echo view('dashboard/categoria/edit', [
            'categoria' => $categoriaModel->find($id)
        ]);
    }
   
    public function update($id)
    {
        $categoriaModel = new CategoriaModel();

        $categoriaModel->update($id,[
            'title' => $this->request->getPost('title'), 
        ]);
        // return redirect()->back();
        return redirect()->to('/dashboard/categoria');
    }
    public function delete($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);
        return redirect()->back();
    }
}