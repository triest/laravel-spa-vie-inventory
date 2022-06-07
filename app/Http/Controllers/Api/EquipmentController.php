<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\CreateEquipmentRequest;
use App\Http\Requests\Equipment\UpdateEquipmentRequest;
use App\Http\Resources\EquipmentCollection;
use App\Http\Resources\EquipmentItemResource;
use App\Models\Equipment;
use App\Models\EquipmentType;
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
     * @param \Illuminate\Http\Request $request
     * @return EquipmentCollection
     */
    public function store(CreateEquipmentRequest $request)
    {
        $collection = $this->equipmentService->create($request->validated());
        return new EquipmentCollection($collection);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return EquipmentItemResource
     */
    public function show(Equipment $equipment)
    {
        return new EquipmentItemResource($equipment);
    }


    /**
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return EquipmentItemResource
     * @throws \Exception
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment = $this->equipmentService->update($equipment, $request->validated());
        return new EquipmentItemResource($equipment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $this->equipmentService->destroy($equipment);
        return response([[], 204])->setStatusCode(204);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function equipmentType()
    {
        $equipmentTypes = EquipmentType::all();
        return response()->json($equipmentTypes);
    }
}
