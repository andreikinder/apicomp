<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show(Request $request, $id) {



        $fname = "/images/$id".".png";
        $file = Storage::disk('public')->get($fname);

        $type = Storage::disk('public')->mimeType($fname);

        return Response::make($file, 200)->header("Content-Type", $type);


    }
}
