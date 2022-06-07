<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\CreateEquipmentRequest;
use App\Http\Requests\Equipment\UpdateEquipmentRequest;
use App\Http\Resources\EquipmentCollection;
use App\Http\Resources\EquipmentItemResource;
use App\Models\Equipment;
use App\Services\EquipmentService;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public $equipmentService;

    /**
     * EquipmentController constructor.
     * @param $equipmentService
     */
    public function __construct(EquipmentService $equipmentService)
    {
        $this->equipmentService = $equipmentService;

    }



    public function index(Request $request)
    {
         $collection = $this->equipmentService->getAll();
         return new EquipmentCollection($collection);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEquipmentRequest $request)
    {
         $this->equipmentService->create($request->validated());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return EquipmentItemResource
     */
    public function show(Equipment $equipment)
    {
        return new EquipmentItemResource($equipment);
    }


    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment = $this->equipmentService->update($equipment,$request->validated());
        return new EquipmentItemResource($equipment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return response([[],204])->setStatusCode(204);
    }
}
