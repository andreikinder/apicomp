<?php

namespace App\Http\Controllers;

use App\Http\Resources\MotherboardCollection;
use App\Models\Motherboard;
use Illuminate\Http\Request;

class MotherboardController extends Controller
{
    public function index(Request $request, $filters = []): \App\Http\Resources\MotherboardCollection
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Motherboard::query();
        if ($filters) {
            $query->filter($filters);
        }
        $motherbords =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();


        return new MotherboardCollection($motherbords);
    }
}
