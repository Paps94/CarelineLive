<?php

namespace App\Http\Controllers;

use App\Http\Resources\Device\DeviceResource;
use App\Http\Resources\Device\DeviceShowResource;
use App\Models\Device;
use Illuminate\Http\Request;

/*
 * Changed all the parameters to Controler/Model binding to take an
 * instance of the model instead of an $id and then having to use
 * Eloquent to find the instance of the model
*/

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return response()->success(Device::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        return response()->success(Device::create($request->all()));
    }

    /**
     * Display the specified Device
     *
     * @param  \App\Models\Device $device
     * @return \App\Http\Resources\DevicesShowResource
     */
    public function show(Device $device)
    {
        return response()->success($device);
    }

    /**
     * Update the specified Device
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device $device
     */
    public function update(Request $request, Device $device)
    {
        if ($device->fill($request->all())->save()) {
          return response()->success($device);
        }
    }

    /**
     * Delete the specified Device
     *
     * @param  \App\Models\Device $device
     */
    public function destroy(Device $device)
    {
      if ($device->delete()) {
        return response()->success('Device deleted');
      }
    }
}
