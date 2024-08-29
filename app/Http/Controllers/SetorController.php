<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Setor::query();

        if ($request->filled('search')) {
            $query->where('descricao', 'like', '%' . $request->search . '%');
        }

        $info = $query->get();

        return view('setor.index', ["info"=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setor = new Setor();

        $setor->descricao = $request->input('descricao');

        try {
            $setor->save();
        } catch(\Exception $e){
            return redirect()->route('setor.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('setor.index')->with('toast', ['type' => 'success', 'message' => 'Setor adicionado com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Setor $setor)
    {
        $especif = $setor;

        return view('setor.show', ["especif"=>$especif]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setor $setor)
    {
        $espe = $setor;

        return view('setor.edit', ["item"=>$espe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setor $setor)
    {
        $setor->descricao = $request->input('descricao');

        try {
            $setor->save();
        } catch(\Exception $e){
            return redirect()->route('setor.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('setor.index')->with('toast', ['type' => 'success', 'message' => 'Setor editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setor $setor)
    {
        try {
            $setor->delete();
        } catch (\Exception $e){
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1451) {
                return redirect()->route('setor.index')->with('toast', ['type' => 'warning', 'message' => 'Não é Possível excluir itens com vínculos']);
            } else {
                return redirect()->route('setor.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
            }
        }

        return redirect()->route('setor.index')->with('toast', ['type' => 'success', 'message' => 'Setor deletado com sucesso.']);
    }
}
