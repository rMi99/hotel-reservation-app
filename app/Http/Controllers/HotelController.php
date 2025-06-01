<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the hotels.
     */
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return response()->json($hotels);
    }

    /**
     * Store a newly created hotel in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'star_rating' => 'required|integer|min:1|max:5',
            'images' => 'nullable|string',
            'website' => 'nullable|url',
            'active' => 'boolean',
        ]);

        $hotel = Hotel::create($validated);

        return response()->json($hotel, 201);
    }

    /**
     * Display the specified hotel.
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    /**
     * Update the specified hotel in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'star_rating' => 'sometimes|required|integer|min:1|max:5',
            'images' => 'nullable|string',
            'website' => 'nullable|url',
            'active' => 'boolean',
        ]);

        $hotel->update($validated);

        return response()->json($hotel);
    }

    /**
     * Remove the specified hotel from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json(['message' => 'Hotel deleted successfully.']);
    }
}
