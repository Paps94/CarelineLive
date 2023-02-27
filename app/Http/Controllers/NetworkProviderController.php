<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NetworkProvider;

class NetworkProviderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function index()
  {
      return NetworkProvider::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
      NetworkProvider::create($request->all());
  }

  /**
   * Display the specified NetworkProvider
   *
   * @param  \App\Models\NetworkProvider $networkProvider
   * @return \App\Http\Resources\NetworkProvidersShowResource
   */
  public function show(NetworkProvider $networkProvider)
  {
      /*
          The use of individual resources is another way of handling request
          Some people like it this way, others don't but I added it just to show
          I know that Resrouces exist. For the sake of this simple test I feel
          there is no need to create
      */
      return new NetworkProvidersShowResource($networkProvider);
  }

  /**
   * Update the specified NetworkProvider
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\NetworkProvider $networkProvider
   */
  public function update(Request $request, NetworkProvider $networkProvider)
  {
      $networkProvider->fill($request->all());
      $networkProvider->save();
  }

  /**
   * Delete the specified NetworkProvider
   *
   * @param  \App\Models\NetworkProvider $networkProvider
   */
  public function destroy(NetworkProvider $networkProvider)
  {
      $networkProvider->delete();
  }
}
