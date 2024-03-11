<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria/index');
    }

    public function mostrar()
    {
        return view('categoria/mostrar');
    }

    public function criar()
    {
        return view('categoria/criar');
    }

    public function store(CategoriaRequest $request)
    {
        $request->validated();
        
        Categoria::create($request->all());

        return redirect()->route('categoria.mostrar')->with('sucesso', 'Cadastrado com sucesso');
    }
}
