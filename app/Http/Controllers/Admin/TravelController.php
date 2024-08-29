<?php

namespace App\Http\Controllers\Admin;

use App\Models\Travel;
use App\Http\Requests\StoreTravelRequest;
use App\Http\Requests\UpdateTravelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = Travel::orderByDesc('stage_number')->paginate(10);
        return view('admin.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelRequest $request)
    {
        $val_data = $request->validated();

        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        };

        $projects = Travel::create($val_data);

        return to_route('admin.index')->with('message', "Ce l'hai fatta, tappa creata !!😄");
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        //
    }
}
