<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function  search(Request $request, $category) {
        $q = $request->input('q') ?? '';

        $filters = array(
            'search' => $q
        );
        switch ($category) {
            case 'machines':
                return  ( new MachineController() )->index($request, $filters);
                break;
            case 'motherboards':
                return  ( new MotherboardController() )->index($request, $filters);
                break;
            case 'processors':
                return  ( new ProcessorController() )->index($request, $filters);
                break;
            case 'ram-memories':
                return  ( new RammemoryController() )->index($request, $filters);
                break;
            case 'graphic-cards':
                return  ( new GraphiccardController() )->index($request, $filters);
                break;
            case 'power-supplies':
                return  ( new PowersupplyController() )->index($request, $filters);
                break;
            case 'storage-devices':
                return  ( new StoragedeviceController() )->index($request, $filters);
                break;
        }
    }
}
