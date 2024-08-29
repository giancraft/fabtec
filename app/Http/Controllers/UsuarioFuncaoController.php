<?php

namespace App\Http\Controllers;

use App\Models\Usuario_Funcao;
use App\Models\Usuario;
use App\Models\Funcao;
use Illuminate\Http\Request;

class UsuarioFuncaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Usuario $usuario)
    {
        $usuario_Funcao = new Usuario_Funcao();
        $usuario_Funcao->usuario_id = $usuario->id;
        $usuario_Funcao->funcao_id = $request->input('funcao_id');
        $usuario_Funcao->dataInicio = now();

        try {
            $usuario_Funcao->save();
        } catch(\Exception $e){
            return redirect()->route('usuario.edit', $usuario->id)->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('usuario.edit', $usuario->id)->with('toast', ['type' => 'success', 'message' => 'Função adicionada com sucesso.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Usuario_Funcao $usuario_Funcao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario_Funcao $usuario_Funcao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario_Funcao $usuario_Funcao, Usuario $usuario, Funcao $funcao)
    {
        $usuario_Funcao->dataInicio = now();

        try {
            $usuario_Funcao->save();
        } catch(\Exception $e){
            return redirect()->route('usuario.edit', $usuario->id)->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('usuario.edit', $usuario->id)->with('toast', ['type' => 'success', 'message' => 'Usuario editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $usuario_id, $funcao_id)
    {
        try {
            Usuario_Funcao::where('usuario_id', $usuario_id)
                ->where('funcao_id', $funcao_id)
                ->delete();
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1451) {
                return redirect()->route('usuario.edit', $usuario_id)->with('toast', ['type' => 'warning', 'message' => 'Não é possível excluir itens com vínculos']);
            } else {
                return redirect()->route('usuario.edit', $usuario_id)->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado (' . $e->getMessage() . ")"]);
            }
        }
    
        return redirect()->route('usuario.edit', $usuario_id)->with('toast', ['type' => 'success', 'message' => 'Função deletada com sucesso.']);
    }
    
    public function filterByDate(Request $request, $id)
    {
        // Redirecionar para a rota de edição com o parâmetro de filtro
        return redirect()->route('usuario.edit', ['id' => $id, 'filterByDate' => true]);
    }           
}
