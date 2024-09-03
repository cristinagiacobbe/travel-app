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
        $travels = Travel::orderBy('id')->paginate(10);
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

        if ($request->has('completed')) {
            $val_data['completed'] = '1';
        } else {
            $val_data['completed'] = '0';
        }

        $travels = Travel::create($val_data);

        return to_route('admintravels.index')->with('message', "Ce l'hai fatta, tappa creata !!😄");
    }

    /**
     * Display the specified resource.
     */
    public function show(Travel $travel)
    {
        return view('admin.show', compact('travel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Travel $travel)
    {
        return view('admin.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelRequest $request, Travel $travel)
    {
        if ($request->has('cover_image')) {
            $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        } else {
            $val_data['cover_image'] = Storage::put('uploads', $travel->cover_image);
        }

        if ($request->has('completed')) {
            $val_data['completed'] = '1';
        } else {
            $val_data['completed'] = $travel->completed;
        }
        $travel->update($val_data);
        return to_route('admintravels.index')->with('message', 'Evvai, tappa modificata !😄');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Travel $travel)
    {
        if ($travel->cover_image) {
            Storage::delete($travel->cover_image);
        }

        $travel->delete();
        return to_route('admintravels.index')->with('message', 'Tappa definitivamente rimossa😒');
    }
}
