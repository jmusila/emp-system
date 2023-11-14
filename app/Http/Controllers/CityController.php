<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return CityResource::collection(City::with('county')->get());
    }

    public function store(CreateCityRequest $request): CityResource
    {
        $user = City::create($request->validated());

        return new CityResource($user);
    }

    public function show(City $city): CityResource
    {
        return new CityResource($city);
    }

    public function update(UpdateCityRequest $request, City $city): CityResource
    {
        $city = $city->update($request->validated());

        return new CityResource($city);
    }

    public function destroy(City $city): Response
    {
        $city->delete();

        return response()->noContent();
    }
}
