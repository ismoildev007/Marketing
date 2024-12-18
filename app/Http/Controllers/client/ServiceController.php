<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Lot;
use App\Models\ServiceSubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display a listing of the lots
    public function index()
    {
        $lots = Lot::latest()->paginate(10); // Pagination bilan barcha lotlarni olish
        return view('client.service.index', compact('lots'));
    }

    // Show the form for creating a new lot
    public function create()
    {
        $serviceSubCategories = ServiceSubCategory::all();
        return view('client.service.create', compact('serviceSubCategories'));
    }

    // Store a newly created lot in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'deadline' => 'required|string',
            'sub_category_id' => 'required|exists:service_sub_categories,id',
            'type' => 'nullable|string|in:fixed,hourly',
            'status' => 'nullable|string',
        ]);

        Lot::create([
            'client_id' => auth()->id(), // Joriy foydalanuvchi ID-si
            'title' => $request->title,
            'description' => $request->description,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'price' => $request->price,
            'deadline' => $request->deadline,
            'sub_category_id' => $request->sub_category_id,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect()->route('lots.index')->with('success', 'Lot muvaffaqiyatli qo\'shildi.');
    }

    // Show the form for editing the specified lot
    public function edit(Lot $lot)
    {
        $serviceSubCategories = ServiceSubCategory::all();
        return view('client.service.edit', compact('lot', 'serviceSubCategories'));
    }

    // Update the specified lot in storage
    public function update(Request $request, Lot $lot)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'deadline' => 'required|string',
            'sub_category_id' => 'required|exists:service_sub_categories,id',
            'type' => 'nullable|string|in:fixed,hourly',
            'status' => 'nullable|string',
        ]);

        $lot->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget_min' => $request->budget_min,
            'budget_max' => $request->budget_max,
            'price' => $request->price,
            'deadline' => $request->deadline,
            'sub_category_id' => $request->sub_category_id,
            'type' => $request->type,
            'status' => $request->status,
        ]);

        return redirect()->route('lots.index')->with('success', 'Lot muvaffaqiyatli yangilandi.');
    }

    // Remove the specified lot from storage
    public function destroy(Lot $lot)
    {
        $lot->delete();

        return redirect()->route('lots.index')->with('success', 'Lot muvaffaqiyatli o\'chirildi.');
    }
}
