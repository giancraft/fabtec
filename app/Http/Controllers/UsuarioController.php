<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Setor;
use App\Models\Perfil;
use App\Models\Usuario_Funcao;
use App\Models\Funcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        setlocale(LC_TIME, 'pt_BR.UTF-8');

        $query = Usuario::query();

        if ($request->filled('search')) {
            $query->where('nome', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('month')) {
            $query->whereMonth('dataNascimento', $request->month);
        }

        if ($request->filled('setor_id')) {
            $query->where('setor_id', $request->setor_id);
        }

        $setores = Setor::all();

        $info = $query->get();

        return view('usuario.index', ["info"=>$info, "setores"=>$setores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = Setor::all();

        return view('usuario.create', ["info"=>$info]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->senha = Hash::make($request->input('senha'));
        $usuario->dataNascimento = $request->input('dataNascimento');
        $usuario->setor_id = $request->input('setor_id');

        try {
            $usuario->save();
        } catch(\Exception $e){
            return redirect()->route('usuario.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('usuario.index')->with('toast', ['type' => 'success', 'message' => 'Usuario adicionado com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        $especif = $usuario;

        $setor = Setor::find($usuario->setor_id);

        $perfil = Perfil::find($usuario->id);

        return view('usuario.show', ["especif"=>$especif, "setor"=>$setor, "perfil"=>$perfil]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $espe = $usuario;

        $info = Setor::all();

        $funcao = Funcao::all();

        // Verificar se a solicitação inclui o parâmetro de filtro
        $filterByDate = request()->query('filterByDate');

        // Obter todas as funções do usuário
        $usuarioFuncao = Usuario_Funcao::where('usuario_id', $usuario->id)
            ->when($filterByDate, function ($query) {
                // Ordena pela data de início mais antiga quando o filtro é aplicado
                return $query->orderBy('dataInicio', 'asc');
            })
            ->get();

        return view('usuario.edit', ["item"=>$espe, "info"=>$info, "funcao"=>$funcao, "usuarioFuncao"=>$usuarioFuncao]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->senha = Hash::make($request->input('senha'));
        $usuario->dataNascimento = $request->input('dataNascimento');
        $usuario->setor_id = $request->input('setor_id');

        try {
            $usuario->save();
        } catch(\Exception $e){
            return redirect()->route('usuario.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
        }

        return redirect()->route('usuario.index')->with('toast', ['type' => 'success', 'message' => 'Usuario editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {

        try {
            $usuario->delete();
        } catch (\Exception $e){
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] == 1451) {
                return redirect()->route('usuario.index')->with('toast', ['type' => 'warning', 'message' => 'Não é Possível excluir itens com vínculos']);
            } else {
                return redirect()->route('usuario.index')->with('toast', ['type' => 'danger', 'message' => 'Erro Inesperado ('.$e->getMessage().")"]);
            }
        }

        return redirect()->route('usuario.index')->with('toast', ['type' => 'success', 'message' => 'Usuario deletado com sucesso.']);
    }

    public function filterByDate(Request $request, $id)
    {
        // Redirecionar para a rota de edição com o parâmetro de filtro
        return redirect()->route('usuario.edit', ['usuario' => $id, 'filterByDate' => true]);
    }  

    public function resetOrder($id)
    {
        // Redirecionar para a rota de edição sem aplicar o filtro de data
        return redirect()->route('usuario.edit', ['usuario' => $id]);
    }
}
