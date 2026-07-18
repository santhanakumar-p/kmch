<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('department:id,name')->select('id', 'department_id', 'name', 'phone', 'experience', 'qualification')->get();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::select('id', 'name')->get();

        return view('doctors.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'name' => 'required|string',
            'qualification' => 'required|string',
            'experience' => 'required|numeric',
            'phone' => 'required|numeric',
            'shift_start_date_time' => 'required',
            'shift_end_date_time' => 'required',
            'image' => 'required',
            'bio' => 'nullable|string',
        ]);

        $doctorImage = $request->file('image');
        $originalName = $doctorImage->getClientOriginalName();
        $fileName = time() . '_' . $originalName;
        $filePath = $doctorImage->storeAs('public/doctors/images', $fileName);

        Doctor::create([
            'name' => $request->input('name'),
            'qualification' => $request->input('qualification'),
            'experience' => $request->input('experience'),
            'department_id' => $request->input('department_id'),
            'phone' => $request->input('phone'),
            'shift_start_date_time' => $request->input('shift_start_date_time'),
            'shift_end_date_time' => $request->input('shift_end_date_time'),
            'image' => $filePath,
            'bio' => $request->input('bio'),
        ]);

        return redirect()->route('doctors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::select('id', 'name')->get();


        return view('doctors.edit', compact('doctor', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $doctor = Doctor::findOrFail($id);

        $request->validate([
            'department_id' => 'required',
            'name' => 'required|string',
            'qualification' => 'required|string',
            'experience' => 'required|numeric',
            'phone' => 'required|numeric',
            'shift_start_date_time' => 'required',
            'shift_end_date_time' => 'required',
            'image' => 'required',
            'bio' => 'nullable|string',
        ]);

        $doctorImage = $request->file('image');
        $originalName = $doctorImage->getClientOriginalName();
        $fileName = time() . '_' . $originalName;
        $filePath = $doctorImage->storeAs('public/doctors/images', $fileName);

        $doctor->update([
            'name' => $request->input('name'),
            'qualification' => $request->input('qualification'),
            'experience' => $request->input('experience'),
            'department_id' => $request->input('department_id'),
            'phone' => $request->input('phone'),
            'shift_start_date_time' => $request->input('shift_start_date_time'),
            'shift_end_date_time' => $request->input('shift_end_date_time'),
            'image' => $filePath,
            'bio' => $request->input('bio'),
        ]);

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index');
    }
}
