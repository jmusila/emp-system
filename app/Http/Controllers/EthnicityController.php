<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEthnicityRequest;
use App\Http\Requests\UpdateEthnicityRequest;
use App\Http\Resources\EthnicityResource;
use App\Http\Resources\EthniEthnicityResource;
use App\Models\Ethnicity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EthnicityController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return EthnicityResource::collection(Ethnicity::all());
    }

    public function store(CreateEthnicityRequest $request): EthnicityResource
    {
        $user = Ethnicity::create($request->validated());

        return new EthnicityResource($user);
    }

    public function show(Ethnicity $ethnicity): EthnicityResource
    {
        return new EthnicityResource($ethnicity);
    }

    public function update(UpdateEthnicityRequest $request, Ethnicity $city): EthnicityResource
    {
        $city = $city->update($request->validated());

        return new EthnicityResource($city);
    }

    public function destroy(Ethnicity $ethnicity): Response
    {
        $ethnicity->delete();

        return response()->noContent();
    }
}
