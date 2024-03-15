<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;



class ClienteController extends Controller
{
    //listar clientes
    public function index(Request $request)
    {
        //buscar dados do banco de dados 
        //when é para adicionar condições dinamicas de consultas 
        
        // Recupere os termos de pesquisa do formulário
        $termoDePesquisa = $request->input('pesquisa');
  
        $cliente = Cliente::where('nome', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('cpf', 'like', '%' . $termoDePesquisa . '%')
        ->orWhere('email', 'like', '%' . $termoDePesquisa . '%')
        ->orderByDesc('created_at')
        ->get();

        /** 
         * com paginação seria assim:  
         * $cliente = Cliente::when($request->has('nome'), function ($buscar) use ($request){
         * $buscar->where('nome', 'like', '%' .$request->nome . '%'); 
       * })->orderByDesc('created_at')->paginate->(5)->withQueryString();  
         */
        //dd($cliente);

        //carregar view
        return view('cliente/index', [
            'cliente' => $cliente,
        ]);
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
       return redirect()->route('cliente.index')->with('sucesso', 'Cliente Cadastrado com Sucesso!');
    }

    //formulario editar 
    public function editar(Cliente $cliente)
    {
        //dd();
        return view('cliente/editar', ['cliente' => $cliente]);
    }

    //editar no banco de dados 
    public function update(ClienteRequest $request, Cliente $cliente)
    {
       //dd('Atualizar');
        //validade campos formulario
        $request->validated();

        //editar informação no bd 
        $cliente->update([
            'nome' => $request->nome,
            'fone' => $request->fone,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'nascimento' => $request->nascimento,
        ]);

        //redirecionamento de página
       return redirect()->route('cliente.index')->with('sucesso', 'Cliente Atualizado com Sucesso!');

    }

    // excluir a conta do banco de dados 
    public function destroy(Cliente $cliente)
    {

        //dd($cliente);
        $cliente->delete();//só isso para deletar
       //redirecionamento de página
       return redirect()->route('cliente.index')->with('sucesso', 'Cliente Excluído com Sucesso!');
    }
}
