<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SkillManageController extends Controller
{
    //======================show skill list page======================//
    public function showSkills(Request $request)
    {
        $id = $request->header('id');
        $skills = Skill::where('user_id', $id)->orderBy('id', 'desc')->get();
        // return $skills;exit();
        return Inertia::render('Admin/Skill/SkillListPage', [
            'skills' => $skills,
        ]);
    }

    //==================show add edit slill page=======================//
    public function showAddEditSkill(Request $request)
    {
        $id = $request->query('id');
        $skill = Skill::where('id', $id)->first();
        return Inertia::render('Admin/Skill/Add_Edit_SkillPage', [
            'skill' => $skill,
        ]);
    }

    //=======================skill crete ==============================//
    public function createSkill(Request $request)
    {
        $id = $request->header('id');

        $validate_data = $request->validate(
            [
                'prefix' => 'nullable|string|max:200',
                'title' => 'required|string|max:255',
                'preposition' => 'nullable|string|max:200',
                'suffix' => 'nullable|string|max:200',
                'conjunction' => 'nullable|string|max:200',
                'short_description' => 'required|string|max:250 ',
                'long_description' => 'required|string|min:10|max:65535',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'language_or_key' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'certificate_image' => 'nullable|max:2048',
                'certificate_link' => 'nullable|string',
                'progress_certificate' => 'nullable|string',
                'batch_no' => 'nullable|string|max:50',
                'batch_name' => 'nullable|string|max:50',
                'student_id' => 'nullable|string|max:50',
                'institute_name' => 'nullable|string|max:255',
                'institute_branch' => 'nullable|string|max:255',
                'institute_website' => 'nullable|string',
                'trainer_name' => 'nullable|string|max:255',
            ],
            [
                'prefix.max' => 'Prefix should not be more than 200 characters',
                'title.required' => 'Please enter title',
                'title.max' => 'Title should not be more than 255 character',
                'preposition.max' => ' Preposition should not be more than 200 character',
                'suffix.max' => 'Suffix should not be more than 200 character',
                'conjunction.max' => 'Conjunction should not be more than 200 character',
                'short_description.required' => 'Please enter short description',
                'short_description.max' => 'Short description should not be more than 250 character',
                'long_description.required' => 'Please enter long description',
                'long_description.min' => 'Long description should not be less than 10 character',
                'long_description.max' => 'Long description should not be more than 65535 character',
                'start_date.required' => 'Please enter start date',
                'end_date.required' => 'Please enter end date',
                'language_or_key.max' => 'Language or key should not be more than 255 character',
                'category.max' => 'Category should not be more than 255 character',
                'certificate_image.max' => 'Certificate image should not be more than 2048 character',
                'certificate_link.string' => 'Certificate link should be string',
                'batch_no.max' => 'Batch no should not be more than 50 character',
                'batch_name.max' => 'Batch name should not be more than 50 character',
                'student_id.max' => 'Student id should not be more than 50 character',
                'institute_name.max' => 'Institute name should not be more than 255 character',
                'institute_branch.max' => 'Institute branch should not be more than 255 character',
                'institute_website.string' => 'Institute website should be string',
                'trainer_name.max' => 'Trainer name should not be more than 255 character',
            ],
        );

        //certificate image upload
        if ($request->hasFile('certificate_image')) {
            $certificate = $request->file('certificate_image');
            $certificateNameToStore = uniqid() . '.' . $certificate->getClientOriginalExtension();
            $certificate = $certificate->storeAs('certificate', $certificateNameToStore, 'public');
            $validate_data['certificate'] = $certificate;
        }

        // progress_certificate upload
        if ($request->hasFile('progress_certificate')) {
            $p_certificate = $request->file('progress_certificate');
            $p_certificateNameToStore = uniqid() . '.' . $p_certificate->getClientOriginalExtension();
            $p_certificate = $p_certificate->storeAs('progress_certificate', $p_certificateNameToStore, 'public');
            $validate_data['progress_certificate'] = $p_certificate;
        }

        $validate_data['user_id'] = $id;

        Skill::create($validate_data);

        return redirect()
            ->route('show.skill.list')
            ->with(['message' => 'Skill Added Successfully', 'status' => true]);
    }



    //=======================update skill=============================//
    public function updateSkill(Request $request, $id)
    {
        // dd($request->all());
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $validate_data = $request->validate(
            [
                'prefix' => 'nullable|string|max:200',
                'title' => 'required|string|max:255',
                'preposition' => 'nullable|string|max:200',
                'suffix' => 'nullable|string|max:200',
                'conjunction' => 'nullable|string|max:200',
                'short_description' => 'required|string|max:250 ',
                'long_description' => 'required|string|min:10|max:65535',
                'start_date' => 'required|string',
                'end_date' => 'required|string',
                'language_or_key' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'certificate_image' => 'sometimes|nullable|max:2048',
                'certificate_link' => 'nullable|string|max: 255',
                'progress_certificate' => 'sometimes|nullable|max:2048',
                'batch_no' => 'nullable|string|max:50',
                'batch_name' => 'nullable|string|max:50',
                'student_id' => 'nullable|string|max:50',
                'institute_name' => 'nullable|string|max:255',
                'institute_branch' => 'nullable|string|max:255',
                'institute_website' => 'nullable|string',
                'trainer_name' => 'nullable|string|max:255',
            ],
            [
                'prefix.max' => 'Prefix should not be more than 200 characters',
                'title.required' => 'Please enter title',
                'title.max' => 'Title should not be more than 255 character',
                'preposition.max' => ' Preposition should not be more than 200 character',
                'suffix.max' => 'Suffix should not be more than 200 character',
                'conjunction.max' => 'Conjunction should not be more than 200 character',
                'short_description.required' => 'Please enter short description',
                'short_description.max' => 'Short description should not be more than 250 character',
                'long_description.required' => 'Please enter long description',
                'long_description.min' => 'Long description should not be less than 10 character',
                'long_description.max' => 'Long description should not be more than 65535 character',
                'start_date.required' => 'Please enter start date',
                'end_date.required' => 'Please enter end date',
                'language_or_key.max' => 'Language or key should not be more than 255 character',
                'category.max' => 'Category should not be more than 255 character',
                'certificate_image.max' => 'Certificate image should not be more than 2048 character',
                'certificate_link.string' => 'Certificate link should be string',
                'certificate_link.max' => 'Certificate link should not be more than 2048 character',
                'progress_certificate.max' => 'Progress certificate should not be more than 255 character',
                'batch_no.max' => 'Batch no should not be more than 50 character',
                'batch_name.max' => 'Batch name should not be more than 50 character',
                'student_id.max' => 'Student id should not be more than 50 character',
                'institute_name.max' => 'Institute name should not be more than 255 character',
                'institute_branch.max' => 'Institute branch should not be more than 255 character',
                'institute_website.string' => 'Institute website should be string',
                'trainer_name.max' => 'Trainer name should not be more than 255 character',
            ],
        );

        // certificate image validation
        if ($request->hasFile('certificate_image')) {
            if ($skill && $skill->certificate_image) {
                Storage::disk('public')->delete($skill->certificate_image);
            }

            $certificate = $request->file('certificate_image');
            $certificateNameToStore = uniqid() . '.' . $certificate->getClientOriginalExtension();
            $certificate = $certificate->storeAs('certificate', $certificateNameToStore, 'public');
            $validate_data['certificate_image'] = $certificate;
        }

        // progress certificate validation
        if ($request->hasFile('progress_certificate')) {
            if ($skill && $skill->progress_certificate) {
                Storage::disk('public')->delete($skill->progress_certificate);
            }

            $p_certificate = $request->file('progress_certificate');
            $p_certificateNameToStore = uniqid() . '.' . $p_certificate->getClientOriginalExtension();
            $p_certificate = $p_certificate->storeAs('progress_certificate', $p_certificateNameToStore, 'public');
            $validate_data['progress_certificate'] = $p_certificate;
        }

        $skill->update($validate_data);

        return redirect()
            ->route('show.skill.list')
            ->with(['message' => 'Skill Updated Successfully', 'status' => true]);
    }
}
