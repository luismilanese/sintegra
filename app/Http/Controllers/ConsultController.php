<?php

namespace App\Http\Controllers;

use App\DataTypes\DocumentType;
use App\Services\Sintegra;
use App\Sintegra as SintegraModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConsultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function search(Request $request, Sintegra $sintegra, SintegraModel $sintegraModel)
    {
        $searchResult = null;

        if ($request->isMethod('post')) {
            $cnpj = $request->get('cnpj');

            $dbSearch = SintegraModel::where('cnpj', $cnpj)->first();

            if ($dbSearch !== null) {
                $searchResult = json_decode($dbSearch->resultado_json);
            } else {
                $searchResultJson = $this->consult($cnpj, $sintegra)->getData();
                $searchResult = json_decode($searchResultJson);

                $sintegraModel->resultado_json = $searchResultJson;
                $sintegraModel->cnpj = $cnpj;
                $sintegraModel->user_id = Auth::user()->id;
                $sintegraModel->save();
            }
        }

        return view('consult.search', compact('searchResult'));
    }

    public function consult($cnpj, Sintegra $sintegra)
    {
        $response = $sintegra->consult($cnpj, DocumentType::CNPJ);

        $response = str_replace( chr( 194 ) . chr( 160 ), ' ', $response );

        return response()->json($response);
    }

    public function results()
    {
        $results = SintegraModel::all();

        return view('consult.results', compact('results'));
    }

    public function showResult($id)
    {
        $searchResult = SintegraModel::find($id)->resultado_json;
        $searchResult = json_decode($searchResult);

        return view('consult.showresult', compact('searchResult'));
    }
}
