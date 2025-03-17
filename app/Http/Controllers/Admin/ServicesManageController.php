<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServicesManageController extends Controller
{
    //===================show all services=====================//
    public function showServices(Request $request)
    {
        $user_id = $request->header('id');
        $services = Service::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return Inertia::render('Admin/Service/ServicesListPage', [
            'services' => $services,
        ]);
    }


    //===================change service status=====================//
    public function changeServiceStatus(Request $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        $service->status = $request->status;
        $service->save();

        $data = ['message' => 'Service status changed successfully', 'status' => true, 'code' => 200];
        return redirect()->back()->with($data);
    }

    //=====================show save service page=====================//
    public function showAddEditService(Request $request)
    {
        $id = $request->query('id');
        $service = Service::where('id', $id)->first();
        // return $portfolio;exit();
        return Inertia::render('Admin/Service/Add_Edit_ServicePage', [
            'service' => $service,
        ]);
    }

    //=======================create service==========================//
    public function createService(Request $request)
    {
        $user_id = $request->header('id');
        $validated_data = $request->validate(
            [
                'name' => 'required|string|max:250',
                'description' => 'required|string|max:5000',
                'icon' => 'required|string|max:50',
                'icon_color_code' => 'required|string|max:50',
                'status' => 'required|boolean',
            ],
            [
                'name.required' => 'Service name is required',
                'name.string' => 'Service name must be a string',
                'name.max' => 'Service name must be less than 250 characters',
                'description.required' => 'Service description is required',
                'description.string' => 'Service description must be a string',
                'description.max' => 'Service description must be less than 5000 characters',
                'icon.required' => 'Service icon is required',
                'icon.string' => 'Service icon must be a string',
                'icon.max' => 'Service icon must be less than 50 characters',
                'icon_color_code.required' => 'Service icon color code is required',
                'icon_color_code.string' => 'Service icon color code must be a string',
                'icon_color_code.max' => 'Service icon color code must be less than 50 characters',
                'status.required' => 'Service status is required',
                'status.boolean' => 'Service status must be a boolean',
            ],
        );

        $validated_data['user_id'] = $user_id;

        Service::create($validated_data);

        $data = ['message' => 'Service created successfully', 'status' => true, ' code' => 200];
        return redirect()->route('show.service.list')->with($data);
    }

    //=======================update service==========================//
    public function updateService(Request $request, $id)
    {
        $user_id = $request->header('id');
        $service = Service::where('user_id' , $user_id)->where('id', $id)->first();
        $validated_data = $request->validate(
            [
                'name' => 'required|string|max:250',
                'description' => 'required|string|max:5000',
                'icon' => 'required|string|max:50',
                'icon_color_code' => 'required|string|max:50',
                'status' => 'required|boolean',
            ],
            [
                'name.required' => 'Service name is required',
                'name.string' => 'Service name must be a string',
                'name.max' => 'Service name must be less than 250 characters',
                'description.required' => 'Service description is required',
                'description.string' => 'Service description must be a string',
                'description.max' => 'Service description must be less than 5000 characters',
                'icon.required' => 'Service icon is required',
                'icon.string' => 'Service icon must be a string',
                'icon.max' => 'Service icon must be less than 50 characters',
                'icon_color_code.required' => 'Service icon color code is required',
                'icon_color_code.string' => 'Service icon color code must be a string',
                'icon_color_code.max' => 'Service icon color code must be less than 50 characters',
                'status.required' => 'Service status is required',
                'status.boolean' => 'Service status must be a boolean',
            ],
        );

        $validated_data['user_id'] = $user_id;

        $service->update($validated_data);

        $data = ['message' => 'Service updated successfully!', 'status' => true, ' code' => 200];
        return redirect()->route('show.service.list')->with($data);
    }
}
