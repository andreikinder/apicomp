<?php

namespace App\Http\Controllers;


use App\Http\Resources\RammemoryCollection;
use App\Models\Rammemory;
use Illuminate\Http\Request;

class RammemoryController extends Controller
{
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Rammemory::query();
        if ($filters) {
            $query->filter($filters);
        }
        $rammemories =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();

        return new RammemoryCollection($rammemories);

    }
}
