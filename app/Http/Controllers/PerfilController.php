<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info = Perfil::all();

        return view('perfil.index', ["info"=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perfil = Perfil::all();
        $info = Usuario::all();
        return view('perfil.create', ["info"=>$info, "perfil"=>$perfil]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $perfil = new Perfil();

        $perfil->descricao = $request->input('descricao');
        $perfil->usuario_id = $request->input('usuario_id');

        try {
            $perfil->save();
        } catch(\Exception $e){
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil adicionado com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Perfil $perfil)
    {
        $especif = $perfil;

        $usuario = Usuario::find($perfil->usuario_id);

        return view('perfil.show', ["especif"=>$especif, "usuario"=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perfil $perfil)
    {
        $espe = $perfil;

        $perfil = Perfil::all();

        $info = Usuario::all();

        return view('perfil.edit', ["item"=>$espe, "info"=>$info, "perfil"=>$perfil]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perfil $perfil)
    {
        $perfil->descricao = $request->input('descricao');
        $perfil->usuario_id = $request->input('usuario_id');


        try {
            $perfil->save();
        } catch(\Exception $e){
            return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perfil $perfil)
    {
        try {
            $perfil->delete();
        } catch (\Exception $e){
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1451) {
                return redirect()->route('perfil.index')->with('toast', ['type' => 'warning', 'message' => 'Não é Possível excluir itens com vínculos']);
            } else {
                return redirect()->route('perfil.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
                echo "Erro ao excluir item: " . $e->getMessage();
            }
        }

        return redirect()->route('perfil.index')->with('toast', ['type' => 'success', 'message' => 'Perfil deletado com sucesso.']);
    }
}
