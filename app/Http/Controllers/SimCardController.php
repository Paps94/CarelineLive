<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimCard;

class SimCardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function index()
  {
      return SimCard::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   */
  public function store(Request $request)
  {
      SimCard::create($request->all());
  }

  /**
   * Display the specified SimCard
   *
   * @param  \App\Models\SimCard $simCard
   * @return \App\Http\Resources\SimCardsShowResource
   */
  public function show(SimCard $simCard)
  {
      /*
          The use of individual resources is another way of handling request
          Some people like it this way, others don't but I added it just to show
          I know that Resrouces exist. For the sake of this simple test I feel
          there is no need to create
      */
      return new SimCardsShowResource($simCard);
  }

  /**
   * Update the specified SimCard
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\SimCard $simCard
   */
  public function update(Request $request, SimCard $simCard)
  {
      $simCard->fill($request->all());
      $simCard->save();
  }

  /**
   * Delete the specified SimCard
   *
   * @param  \App\Models\SimCard $simCard
   */
  public function destroy(SimCard $simCard)
  {
      $simCard->delete();
  }
}
