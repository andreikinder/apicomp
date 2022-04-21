<?php

namespace App\Http\Controllers;

use App\Http\Resources\PowersupplyCollection;
use App\Models\Powersupply;
use Illuminate\Http\Request;

class PowersupplyController extends Controller
{
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Powersupply::query();
        if ($filters) {
            $query->filter($filters);
        }
        $powersupplies =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();

        return new PowersupplyCollection($powersupplies);

    }
}
