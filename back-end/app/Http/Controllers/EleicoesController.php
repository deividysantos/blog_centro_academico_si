<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEleicaoRequest;
use App\Models\Cargos;
use App\Models\Eleicoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EleicoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function postCreateEleicao(Request $request)
    {
        $request->validate([
            'ano' => ['required', 'numeric', 'digits:4'],
            'id_usuario' => ['required', 'exists:usuarios,id'],
            'hierarquia' => ['required', 'exists:cargos,nivel_hierarquia']
        ]);

        $payload = [
            'ano' => $request['ano'],
            'id_usuario' => $request['id_usuario'],
            'id_cargo' => Cargos::where('nivel_hierarquia', $request['hierarquia'])->value('id'),
        ];

        Eleicoes::create($payload);

        return response()->json([
            'message' => 'success',
        ], 201);
    }

    public function deleteEleicao(Request $request, Eleicoes $eleicao)
    {
        
    }
}
