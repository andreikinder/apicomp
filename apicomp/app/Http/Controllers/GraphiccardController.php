<?php

namespace App\Http\Controllers;

use App\Http\Resources\GraphiccardCollection;
use App\Models\Graphiccard;
use Illuminate\Http\Request;

class GraphiccardController extends Controller
{
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Graphiccard::query();
        if ($filters) {
            $query->filter($filters);
        }
        $graphiccards =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();


        return new GraphiccardCollection($graphiccards);
    }
}
