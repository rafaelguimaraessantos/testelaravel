<?php

namespace App\Services;

use App\Models\Cake;
use App\Http\Resources\CakeResource;

class CakeService
{
    public function all()
    {
        return new CakeResource(Cake::with('interesteds')->get()->toArray());
    }

    public function store($request)
    {
        $cake = Cake::create($request->validated());

        return new CakeResource($cake->toArray());
    }

    public function show($cake)
    {
        return new CakeResource($cake->toArray());
    }

    public function update($request, $cake)
    {
        $cake = $cake->update($request->validated());

        return new CakeResource([]);
    }

    public function destroy($cake)
    {
        $cake->delete();

        return new CakeResource([]);
    }

    public function cakeInterested($request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'cake_id' => 'exists:cakes,id',
        ]);

        $cake = Cake::findOrFail($request->cake_id);

        $interested = $cake->interesteds()->create([
            'email' => $request->email,
            'cake_id' => $request->cake_id,
        ]);

        return new CakeResource($interested->toArray());
    }
}