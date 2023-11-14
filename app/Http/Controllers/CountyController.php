<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountyRequest;
use App\Http\Requests\UpdateCountyRequest;
use App\Http\Resources\CountyResource;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CountyController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return CountyResource::collection(County::all());
    }

    public function store(CreateCountyRequest $request): CountyResource
    {
        $user = County::create($request->validated());

        return new CountyResource($user);
    }

    public function show(County $county): CountyResource
    {
        return new CountyResource($county);
    }

    public function update(UpdateCountyRequest $request, County $county): CountyResource
    {
       $county =$county->update($request->validated());

        return new CountyResource($county);
    }

    public function destroy($county): Response
    {
       $county->delete();

        return response()->noContent();
    }
}
