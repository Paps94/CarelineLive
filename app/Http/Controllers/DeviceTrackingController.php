<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceTracking;

class DeviceTrackingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function index()
  {
      return DeviceTracking::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
      DeviceTracking::create($request->all());
  }

  /**
   * Display the specified DeviceTracking
   *
   * @param  \App\Models\DeviceTracking $deviceTracking
   * @return \App\Http\Resources\DeviceTrackingsShowResource
   */
  public function show(DeviceTracking $deviceTracking)
  {
      /*
          The use of individual resources is another way of handling request
          Some people like it this way, others don't but I added it just to show
          I know that Resrouces exist. For the sake of this simple test I feel
          there is no need to create
      */
      return new DeviceTrackingsShowResource($deviceTracking);
  }

  /**
   * Update the specified DeviceTracking
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\DeviceTracking $deviceTracking
   */
  public function update(Request $request, DeviceTracking $deviceTracking)
  {
      $deviceTracking->fill($request->all());
      $deviceTracking->save();
  }

  /**
   * Delete the specified DeviceTracking
   *
   * @param  \App\Models\DeviceTracking $deviceTracking
   */
  public function destroy(DeviceTracking $deviceTracking)
  {
      $deviceTracking->delete();
  }
}
