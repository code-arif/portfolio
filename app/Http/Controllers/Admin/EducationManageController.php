<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EducationManageController extends Controller
{
    //===================show degree list =====================//
    public function showDegree(Request $request)
    {
        $user_id = $request->header('id');
        $education = Education::where('user_id', $user_id)->get();
        return Inertia::render('Admin/Education/EducationListPage', [
            'education' => $education,
        ]);
    }

    //===================show add edit degree page =====================//
    public function showAddEditDegree(Request $request)
    {
        $id = $request->query('id');
        $degree = Education::where('id', $id)->first();
        return Inertia::render('Admin/Education/Add_Edit_EducationPage', [
            'degree' => $degree,
        ]);
    }

    //========================create degree=============================//
    public function createDegree(Request $request){
        $user_id = $request->header('id');

        $validated_data = $request->validate([
            'degree_name' => 'required|string|max:250',
            'institute_name' => 'required|string|max:250',
            'start_date' => 'required|string|max:30',
            'end_date' => 'nullable|string|max:30',
            'description' => 'required|string|max:250',
            'gpa' => 'nullable|string',
            'cgpa' => 'nullable|string',
        ],[
            'degree_name.required' => 'Degree Name is required',
            'degree_name.string' => 'Degree Name must be a string',
            'degree_name.max' => 'Degree Name must be less than 250 characters',
            'institute_name.required' => 'Institute Name is required',
            'institute_name.string' => 'Institute Name must be a string',
            'institute_name.max' => 'Institute Name must be less than 250 characters',
            'start_date.required' => 'Start Date is required',
            'start_date.string' => 'Start Date must be a string',
            'start_date.max' => 'Start Date must be less than 30 characters',
            'end_date.string' => 'End Date must be a string',
            'end_date.max' => 'End Date must be less than 30 characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 250 characters',
            'gpa.string' => 'GPA must be a string',
            'cgpa.string' => 'CGPA must be a string',
        ]);

        $validated_data['user_id'] = $user_id;

        Education::create($validated_data);

        $data = ['message' => 'Degree Added Successfully', 'status' => true];
        return redirect()->route('show.degree.list')->with($data);
    }


    //========================update degree=============================//
    public function updateDegree(Request $request, $id){
        $user_id = $request->header('id');

        $degree = Education::where('user_id', $user_id)->where('id', $id)->first();

        $validated_data = $request->validate([
            'degree_name' => 'required|string|max:250',
            'institute_name' => 'required|string|max:250',
            'start_date' => 'required|string|max:30',
            'end_date' => 'nullable|string|max:30',
            'description' => 'required|string|max:250',
            'gpa' => 'nullable|string',
            'cgpa' => 'nullable|string',
        ],[
            'degree_name.required' => 'Degree Name is required',
            'degree_name.string' => 'Degree Name must be a string',
            'degree_name.max' => 'Degree Name must be less than 250 characters',
            'institute_name.required' => 'Institute Name is required',
            'institute_name.string' => 'Institute Name must be a string',
            'institute_name.max' => 'Institute Name must be less than 250 characters',
            'start_date.required' => 'Start Date is required',
            'start_date.string' => 'Start Date must be a string',
            'start_date.max' => 'Start Date must be less than 30 characters',
            'end_date.string' => 'End Date must be a string',
            'end_date.max' => 'End Date must be less than 30 characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 250 characters',
            'gpa.string' => 'GPA must be a string',
            'cgpa.string' => 'CGPA must be a string',
        ]);

        $validated_data['user_id'] = $user_id;

        $degree->update($validated_data);

        $data = ['message' => 'Degree Updated Successfully', 'status' => true];
        return redirect()->route('show.degree.list')->with($data);
    }
}
