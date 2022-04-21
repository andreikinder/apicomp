<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProcessorCollection;
use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Processor::query();
        if ($filters) {
            $query->filter($filters);
        }
        $processors =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();

        return new ProcessorCollection($processors);

    }
}
