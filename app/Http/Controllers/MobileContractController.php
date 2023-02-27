<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MobileContract;

class MobileContractController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function index()
  {
      return MobileContract::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
      MobileContract::create($request->all());
  }

  /**
   * Display the specified MobileContract
   *
   * @param  \App\Models\MobileContract $mobileContract
   * @return \App\Http\Resources\MobileContractsShowResource
   */
  public function show(MobileContract $mobileContract)
  {
      /*
          The use of individual resources is another way of handling request
          Some people like it this way, others don't but I added it just to show
          I know that Resrouces exist. For the sake of this simple test I feel
          there is no need to create
      */
      return new MobileContractsShowResource($mobileContract);
  }

  /**
   * Update the specified MobileContract
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\MobileContract $mobileContract
   */
  public function update(Request $request, MobileContract $mobileContract)
  {
      $mobileContract->fill($request->all());
      $mobileContract->save();
  }

  /**
   * Delete the specified MobileContract
   *
   * @param  \App\Models\MobileContract $mobileContract
   */
  public function destroy(MobileContract $mobileContract)
  {
      $mobileContract->delete();
  }
}
