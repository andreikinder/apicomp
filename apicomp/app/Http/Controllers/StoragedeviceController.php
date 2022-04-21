<?php

namespace App\Http\Controllers;


use App\Http\Resources\StoragedeviceResouce;
use App\Models\Storagedevice;
use Illuminate\Http\Request;

class StoragedeviceController extends Controller
{
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Storagedevice::query();
        if ($filters) {
            $query->filter($filters);
        }
        $storagedevices =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();

        return  StoragedeviceResouce::collection($storagedevices); // TODO: fix with collection


        //    return  \App\Http\Resources\StoragedeviceResouce($storagedevices);
        //    return new \App\Http\Resources\StoragedeviceCollection($storagedevices);

    }
}
