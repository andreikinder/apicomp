<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMachineRequest;
use App\Http\Resources\MachineResource;
use App\Http\Resources\StoragedeviceMachineResource;
use App\Models\Machine;
use App\Models\Storagedevice;
use App\Models\StoragedeviceMachine;
use Illuminate\Http\Request;
use App\Http\Resources\MachineCollection;

use Illuminate\Http\Response;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MachineCollection
     */
    public function index(Request $request, $filters = [])
    {

        $pageSize = $request->input('pageSize') ?? 10;

        $query =   Machine::query();
        if ($filters) {
            $query->filter($filters);
        }
        $machines =  $query->simplePaginate($pageSize, ['*'], 'page')->withQueryString();

        return new  MachineCollection($machines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMachineRequest $request)
    {

        $machine =  Machine::create($request->toArray());
        $machine->storagedeviceMachine()->createMany($request->input('storagedevices'));
        return response()->json(MachineResource::make($machine), 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return MachineResource
     */
    public function show($id)
    {
        return MachineResource::make( Machine::findOrFail($id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreMachineRequest $request, $id)
    {
        $machine = Machine::findOrFail($id);
        $machine->update($request->toArray());

        $storagedevices = array();
        foreach ($request->input('storagedevices') as $st){
            $storagedevices[$st["storagedevice_id"]] = ["amount" => $st["amount"]];
        }

        $machine->storagedevices()->sync($storagedevices);

        return response()->json(MachineResource::make($machine), 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Machine::findOrFail($id)->delete();

        return  response()->setStatusCode(204);

    }
}
