<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneNumber;

class PhoneNumberController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function index()
  {
      return PhoneNumber::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
      PhoneNumber::create($request->all());
  }

  /**
   * Display the specified PhoneNumber
   *
   * @param  \App\Models\PhoneNumber $phoneNumber
   * @return \App\Http\Resources\PhoneNumbersShowResource
   */
  public function show(PhoneNumber $phoneNumber)
  {
      /*
          The use of individual resources is another way of handling request
          Some people like it this way, others don't but I added it just to show
          I know that Resrouces exist. For the sake of this simple test I feel
          there is no need to create
      */
      return new PhoneNumbersShowResource($phoneNumber);
  }

  /**
   * Update the specified PhoneNumber
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\PhoneNumber $phoneNumber
   */
  public function update(Request $request, PhoneNumber $phoneNumber)
  {
      $phoneNumber->fill($request->all());
      $phoneNumber->save();
  }

  /**
   * Delete the specified PhoneNumber
   *
   * @param  \App\Models\PhoneNumber $phoneNumber
   */
  public function destroy(PhoneNumber $phoneNumber)
  {
      $phoneNumber->delete();
  }
}
