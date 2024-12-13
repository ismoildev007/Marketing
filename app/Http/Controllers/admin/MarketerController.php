<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MarketerController extends Controller
{
    public function filter(Request $request){
        $search = $request->input('search');
        $marketerLength = $request->input('marketer_length');

        $query = User::where('role_id', 3)->orderBy('id', 'DESC');

        if ($search) {
            $query->where(function($q) use ($search){
                $q->where('name', "LIKE", "%$search%")
                    ->orWhere('email', "LIKE", "%$search%");
                //   ->orWhere('phone_number', 'LIKE', '%$search%')
                //   ->orWhere('company_email', 'LIKE', "%$search%")
                //   ->orWhere('company_organization', 'LIKE', "%$search%")
                //   ->orWhereHas('service', function($q) use ($search){
                //         $q->where('name_uz', 'LIKE', '%$search%')
                //           ->orWhere('name_ru', 'LIKE', "%$search%")
                //           ->orWhere('name_en', "LIKE", "%$search%");
                //   })
                //   ->orWhereHas('status', function($q) use ($search){
                //         $q->where('name', "LIKE", "%$search%");
                //   });
            });
        }
        $marketers = $query->paginate($marketerLength);

        return view('admin.marketers.partials.marketer_list', compact('marketers'))->render();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marketers = User::where('role_id', 4)->paginate(10);

        return view('admin.marketers.index', compact('marketers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marketer = User::where('role_id', 4)->paginate(10);

        return view('admin.marketers.show', compact('marketer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
