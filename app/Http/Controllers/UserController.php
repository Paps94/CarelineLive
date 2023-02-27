<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserShowResource;
use App\Http\Resources\UserResource;
use App\Models\User;
//use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

/*
 * Changed all the parameters to Controler/Model binding to take an
 * instance of the model instead of an $id and then having to use
 * Eloquent to find the instance of the model
*/

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserResource
     */
    public function index()
    {
        return response()->success(new UserResource(User::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $response = new UserResource($request->validated());
        return response()->success(User::create($response->resource));
    }

    /**
     * Display the specified User
     *
     * @param  \App\Models\User $user
     * @return \App\Http\Resources\UserShowResource
     */
    public function show(User $user)
    {
        return response()->success(new UserShowResource($user));
    }

    /**
     * Update the specified User
     *
     * @param StoreUserRequest $request
     * @param  User $user
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $response = new UserResource($request->validated());
        if ($user->fill($response->resource)->save()) {
          return response()->success($user);
        }
    }

    /**
     * Delete the specified User
     *
     * @param  \App\Models\User $user
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
          return response()->success('User deleted');
        }
    }
}
