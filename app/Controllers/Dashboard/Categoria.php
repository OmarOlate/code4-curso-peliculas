<?php
namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\CategoriaModel;


class Categoria extends BaseController
{
    public function index()
    {
        
        session()->set('key','19.272.596-8');
        $categoriaModel = new CategoriaModel();
        echo view('dashboard/categoria/index', [
            'categorias' =>$categoriaModel->findAll()
        ]);
    }
    public function new()
    {
        // var_dump(session()->destroy());
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
        return redirect()->back()->with('mensaje', 'Registro creado de manera exitosa');
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
        return redirect()->back()->with('mensaje', 'Registro actalizado con éxito');
    }
    public function delete($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);
        // return redirect()->to('/dashboard/categoria')->with('mensaje', 'Categoría eliminada con éxito');
          session()->setFlashdata('mensaje', 'Registro eliminado');
          return redirect()->back();
    }
}