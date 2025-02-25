'image_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
'image_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

'linkedin' => 'nullable|string|max:255',
'facebook' => 'nullable|string|max:255',
'github' => 'nullable|string|max:255',
'twitter' => 'nullable|string|max:255',
'instagram' => 'nullable|string|max:255',
'fiverr' => 'nullable|string|max:255',
'upwork' => 'nullable|string|max:255',
'freelancer' => 'nullable|string|max:255',

// Handle image uploads
if ($request->hasFile('image_one')) {
if ($profile->image_one && Storage::disk('public')->exists($profile->image_one)) {
    Storage::disk('public')->delete($profile->image_one);
}
$image_one = $request->file('image_one');
$imageOneNameToStore = uniqid() . '.' . $image_one->getClientOriginalExtension();
$image_one_url = $image_one->storeAs('image_one', $imageOneNameToStore, 'public');
$validated_data['image_one'] = $image_one_url;
}

if ($request->hasFile('image_two')) {
if ($profile->image_two && Storage::disk('public')->exists($profile->image_two)) {
    Storage::disk('public')->delete($profile->image_two);
}
$image_two = $request->file('image_two');
$imageNameToStore = uniqid() . '.' . $image_two->getClientOriginalExtension();
$image_two_url = $image_two->storeAs('image_two', $imageNameToStore, 'public');
$validated_data['image_two'] = $image_two_url;
}


//links
linkedin: profile.profile?.linkedin || '',
facebook: profile.profile?.facebook || '',
github: profile.profile?.github || '',
twitter: profile.profile?.twitter || '',
instagram: profile.profile?.instagram || '',
fiverr: profile.profile?.fiverr || '',
upwork: profile.profile?.upwork || '',
freelancer: profile.profile?.freelancer || '',




//image

