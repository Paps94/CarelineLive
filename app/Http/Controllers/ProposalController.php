<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProposalsShowResource;
use App\Models\Proposal;
use Illuminate\Http\Request;

/*
 * Changed all the parameters to Controler/Model binding to take an
 * instance of the model instead of an $id and then having to use
 * Eloquent to find the instance of the model
*/

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Proposal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        Proposal::create($request->all());
    }

    /**
     * Display the specified proposal 
     *
     * @param  \App\Models\Proposal $proposal
     * @return \App\Http\Resources\ProposalsShowResource
     */
    public function show(Proposal $proposal)
    {
        /*
            The use of individual resources is another way of handling request
            Some people like it this way, others don't but I added it just to show
            I know that Resrouces exist. For the sake of this simple test I feel
            there is no need to create 
        */
        return new ProposalsShowResource($proposal);
    }

    /**
     * Update the specified proposal
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal $proposal
     */
    public function update(Request $request, Proposal $proposal)
    {
        $proposal->fill($request->all());
        $proposal->save();
    }

    /**
     * Delete the specified proposal
     *
     * @param  \App\Models\Proposal $proposal
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
    }
}
