<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Eleicao;
use http\Env\Response;
use Illuminate\Http\Request;


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
            'usuario_id' => ['required', 'exists:usuarios,id'],
            'hierarquia' => ['required', 'exists:cargos,nivel_hierarquia']
        ]);

        if ($request['hierarquia'] == 'X' && !$request->user()->isAdmin)
            return response()->json([
                'message' => 'This action is not allowed, the hierarchical level is not sufficient to do!',
            ], 401); //Unauthorized

        $idCargoSelected = Cargo::where('nivel_hierarquia', $request['hierarquia'])->value('id');

        if (Eleicao::where('cargo_id', $idCargoSelected)->where('ano', $request['ano'])->count() > 0)
            return response()->json([
                'message' => 'There is already someone for this job in the selected year!',
            ], 400); //Bad Request

        $payload = [
            'ano' => $request['ano'],
            'usuario_id' => $request['usuario_id'],
            'cargo_id' => $idCargoSelected,
        ];

        Eleicao::create($payload);

        return response()->json([
            'message' => 'success',
        ], 201);//Created
    }

    public function deleteEleicao(Request $request, Eleicao $eleicao)
    {
        if (!$request->user()->isAdminOrPresident() || $eleicao->usuario->isAdmin())
            return response()->json([
                'message' => 'This action is not allowed, the hierarchical level is not sufficient to do!',
            ], 401); //Unauthorized

        $deleted = Eleicao::where('id', $eleicao->id)->delete();

        if ($deleted)
            return response()->json([
                'message' => 'Successfully deleted.',
            ], 204);//No content

        return response()->json([
            'message' => 'An error has occurred.',
        ], 500);//Internal Server Error
    }
}
