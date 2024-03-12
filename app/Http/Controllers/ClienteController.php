<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;



class ClienteController extends Controller
{
    //listar clientes
    public function index()
    {
        //buscar dados do banco de dados 
        $cliente = Cliente::orderByDesc('created_at')->get();

        //dd($cliente);

        //carregar view
        return view('cliente/index', ['cliente' => $cliente]);
    }

    //detalhes do cliente
    public function mostrar()
    {
        return view('cliente/mostrar');
    }
    

    //listar formulário 
    public function criar()
    {
        return view('cliente/criar');
    }

    //cadastrar no banco de dados 
    //public function store(Request $request)
    public function store(ClienteRequest $request)
    {
        
        //não carrega view e sim recebe resultado
        // debugar nome dd($request->nome);
       //CADASTRAR NO BANCO DE DADOS 
       //didigite cliente par aimportar o model Cliente
       //$cliente = Cliente::create($request->all());
       //debugar o código
       //dd($cliente);

       //validade campos formulario
       $request->validated();

       Cliente::create($request->all());

       //redirecionamento de página
       return redirect()->route('cliente.mostrar')->with('sucesso', 'Cliente Cadastrado com Sucesso!');
    }

    //formulario editar 
    public function editar(Cliente $cliente)
    {
        //dd();
        return view('cliente/editar', ['cliente' => $cliente]);
    }

    //editar no banco de dados 
    public function update()
    {
       dd('Atualizar');
    }

    // excluir a conta do banco de dados 
    public function destroy()
    {
        dd('Apagar');
    }
}
