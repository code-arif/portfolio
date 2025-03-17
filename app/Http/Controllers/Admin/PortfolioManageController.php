<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortfolioManageController extends Controller
{
    //=======================show portfolio list=======================//
    public function showPortfolios(Request $request)
    {
        $user_id = $request->header('id');
        $portfolios = Portfolio::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return Inertia::render('Admin/Portfolio/PortfolioListPage', [
            'portfolios' => $portfolios,
        ]);
    }

    //==================show add edit slill page=======================//
    public function showAddEditPortfolio(Request $request)
    {
        $id = $request->query('id');
        $portfolio = Portfolio::where('id', $id)->first();
        return Inertia::render('Admin/Portfolio/Add_Edit_PortfolioPage', [
            'portfolio' => $portfolio,
        ]);
    }

    //======================create portfolio==========================//
    public function createPortfolio(Request $request)
    {
        $user_id = $request->header('id');

        $validated_data = $request->validate(
            [
                'title' => 'required|string|max:255',
                'category' => 'nullable|string|max:255',
                'short_description' => 'required|string|max:255',
                'long_description' => 'required|string|max:65000',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'video' => 'nullable|string|max:255',
                'github_url' => 'nullable|string|max:255',
                'live_url' => 'nullable|string|max:255',
                'language_or_key' => 'nullable|string|max:255',
                'status' => 'required|boolean',
            ],
            [
                'title.required' => 'Please enter title',
                'title.max' => 'Title should not be more than 255 character',
                'category.max' => 'Category should not be more than 255 character',
                'short_description.required' => 'Please enter short description',
                'short_description.max' => 'Short description should not be more than 255 character',
                'long_description.required' => 'Please enter long description',
                'long_description.max' => 'Long description should not be more than 65000 character',
                'featured_image.image' => 'Featured image should be an image',
                'featured_image.mimes' => 'Featured image should be a valid image',
                'image.image' => 'Image should be an image',
                'image.mimes' => 'Image should be a valid image',
                'github_url.max' => 'Github url should not be more than 255 character',
                'live_url.max' => 'Live url should not be more than 255 character',
                'language_or_key.max' => 'Language or key should not be more than 255 character',
                'status.required' => 'Please select status',
                'status.boolean' => 'Please select status',
            ],
        );

        $featured_image = null;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $featured_image = $image->storeAs('featured_image', $image_name, 'public');
            $validated_data['featured_image'] = $featured_image;
        }

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image = $image->storeAs('image', $image_name, 'public');
            $validated_data['image'] = $image;
        }

        $validated_data['user_id'] = $user_id;

        Portfolio::create($validated_data);

        return redirect()
            ->route('show.portfolio.list')
            ->with(['message' => 'Portfolio created successfully', 'status' => true]);
    }

    //======================update portfolio==========================//
    public function updatePortfolio(Request $request, $id)
    {
        $user_id = $request->header('id');
        $portfolio = Portfolio::where('user_id', $user_id)->where('id', $id)->first();

        $validated_data = $request->validate(
            [
                'title' => 'required|string|max:255',
                'category' => 'nullable|string|max:255',
                'short_description' => 'required|string|max:255',
                'long_description' => 'required|string|max:65000',
                'featured_image' => 'sometimes|nullable|max:2048',
                'image' => 'sometimes|nullable|max:2048',
                'video' => 'sometimes|nullable|max:2048',
                'github_url' => 'nullable|string|max:255',
                'live_url' => 'nullable|string|max:255',
                'language_or_key' => 'nullable|string|max:255',
                'status' => 'required|boolean',
            ],
            [
                'title.required' => 'Please enter title',
                'title.max' => 'Title should not be more than 255 character',
                'category.max' => 'Category should not be more than 255 character',
                'short_description.required' => 'Please enter short description',
                'short_description.max' => 'Short description should not be more than 255 character',
                'long_description.required' => 'Please enter long description',
                'long_description.max' => 'Long description should not be more than 65000 character',
                'featured_image.max' => 'Featured image should not be more than 2048 character',
                'image.max' => 'Image should not be more than 2048 character',
                'video.max' => 'Video should not be more than 2048 character',
                'github_url.max' => 'Github url should not be more than 255 character',
                'live_url.max' => 'Live url should not be more than 255 character',
                'language_or_key.max' => 'Language or key should not be more than 255 character',
                'status.required' => 'Please select status',
                'status.boolean' => 'Please select status',
            ],
        );

        $featured_image = null;
        if ($request->hasFile('featured_image')) {
            if ($portfolio && $portfolio->hero_image) {
                Storage::disk('public')->delete($portfolio->hero_image);
            }

            $image = $request->file('featured_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $featured_image = $image->storeAs('featured_image', $image_name, 'public');
            $validated_data['featured_image'] = $featured_image;
        }

        $image = null;
        if ($request->hasFile('image')) {
            if ($portfolio && $portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image = $image->storeAs('image', $image_name, 'public');
            $validated_data['image'] = $image;
        }

        $validated_data['user_id'] = $user_id;

        $portfolio->update($validated_data);

        return redirect()
        ->route('show.portfolio.list')
        ->with(['message' => 'Portfolio updated successfully', 'status' => true]);
    }

    //=========================change status=========================//
    public function changePortfolioStatus(Request $request, $id)
    {
        //find car
        $project = Portfolio::find($id);
        if (!$project) {
            $data = ['message' => 'Project not found', 'status' => false, 'code' => 404];
            return redirect()->back()->with($data);
        }
        //change status
        $project->status = $request->status;
        $project->save();

        $data = ['message' => 'Project status changed successfully', 'status' => true, 'code' => 200];
        return redirect()->back()->with($data);
    }
}
