<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SkillManageController extends Controller
{
    //======================show skill list page======================//
    public function show(Request $request)
    {
        $id = $request->header('id');
        $skills = Skill::where('user_id', $id)->orderBy('id', 'desc')->get();
        return Inertia::render('Admin/Skill/SkillListPage', [
            'skills' => $skills,
        ]);
    }

    //==================show add edit slill page=======================//
    public function showAddEditSkill(Request $request)
    {
        $id = $request->query('id');
        $skill = Skill::where('id', $id)->first();
        return Inertia::render('Admin/Skill/Add_Edit_SkillPage',[
            'skill' => $skill,
        ]);
    }

    //=======================skill crete ==============================//
    public function create(Request $request)
    {
        $id = $request->header('id');
        
        $validate_data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:250 ',
            'long_description' => 'required|string|min:10|max:65535',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'language_or_key' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'certificate' => 'nullable|string|max:255',
            'batch_no' => 'nullable|string|max:50',
            'institute' => 'nullable|string|max:255',
            'trainer' => 'nullable|string|max:255',
        ]);

        $validate_data['user_id'] = $id;

        Skill::create($validate_data);

        return redirect()
        ->route('show.skill.list.page')
        ->with(['message' => 'Skill Added Successfully', 'status' => true]);
    }

    //=======================update skill=============================//
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $validate_data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'short_description' => 'sometimes|string|max:250',
            'long_description' => 'sometimes|string|min:10|max:65535',
            'start_date' => 'sometimes|string',
            'end_date' => 'sometimes|string',
            'language_or_key' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'certificate' => 'nullable|string|max:255',
            'batch_no' => 'nullable|string|max:50',
            'institute' => 'nullable|string|max:255',
            'trainer' => 'nullable|string|max:255',
        ]);

        $skill->update($validate_data);

        return redirect()
        ->route('show.skill.list.page')
        ->with(['message' => 'Skill Updated Successfully', 'status' => true]);
    }
}
