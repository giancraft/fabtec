<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Funcao::all();

        return view('funcao.index', ["info"=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('funcao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $funcao = new Funcao();

        $funcao->descricao = $request->input('descricao');

        try {
            $funcao->save();
        } catch(\Exception $e){
            return redirect()->route('funcao.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('funcao.index')->with('toast', ['type' => 'success', 'message' => 'Funcao adicionado com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcao $funcao)
    {
        $especif = $funcao;

        return view('funcao.show', ["especif"=>$especif]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcao $funcao)
    {
        $espe = $funcao;

        return view('funcao.edit', ["item"=>$espe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Funcao $funcao)
    {
        $funcao->descricao = $request->input('descricao');

        try {
            $funcao->save();
        } catch(\Exception $e){
            return redirect()->route('funcao.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('funcao.index')->with('toast', ['type' => 'success', 'message' => 'Funcao editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funcao $funcao)
    {
        try {
            $funcao->delete();
        } catch (\Exception $e){
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1451) {
                return redirect()->route('funcao.index')->with('toast', ['type' => 'warning', 'message' => 'Não é Possível excluir itens com vínculos']);
            } else {
                return redirect()->route('funcao.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
            }
        }

        return redirect()->route('funcao.index')->with('toast', ['type' => 'success', 'message' => 'Funcao deletado com sucesso.']);
    }
}
