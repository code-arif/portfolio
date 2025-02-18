<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Find the user with user_id 1
        $user = User::find(1);

        if ($user) {
            Profile::create([
                'first_name' => 'Ariful',
                'last_name' => 'Islam',
                'designations' => 'Web Developer',
                'phone' => '01330477445',
                'additional_phone' => null,
                'additional_email' => null,
                'secondary_email' => null,
                'address' => 'Dhaka, Bangladesh',
                'image_one' => 'profile_image_one.jpg',
                'image_two' => 'profile_image_two.jpg',
                'linkedin' => null,
                'facebook' => null,
                'github' => null,
                'twitter' => null,
                'instagram' => null,
                'fiverr' => null,
                'upwork' => null,
                'freelancer' => null,
                'bio' => null,
                'short_description' => 'A passionate web developer.',
                'long_description' => 'I have over 5 years of experience in web development, specializing in front-end and back-end technologies.',
                'user_id' => $user->id,
            ]);
        } else {
            echo "User with ID 1 not found.";
        }
    }
}
