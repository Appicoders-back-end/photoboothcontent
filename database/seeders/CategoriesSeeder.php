<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videoCategory = Category::create([
            'name' => 'Videos',
            'type' => Category::VIDEO
        ]);

        Category::insert([
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Pearl'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Reflection',
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => '360'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Sals'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Guac & Chips'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Spark Booth'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Spark Booth'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Audio Guestbook'
            ],
            [
                'parent_id' => $videoCategory->id,
                'type' => Category::VIDEO,
                'name' => 'Misc'
            ]
        ]);

        $imageCategory = Category::create([
            'name' => 'Photos',
            'type' => Category::IMAGE
        ]);

        Category::insert([
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Pearl'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Reflection',
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => '360'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Sals'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Guac & Chips'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Spark Booth'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Spark Booth'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Audio Guestbook'
            ],
            [
                'parent_id' => $imageCategory->id,
                'type' => Category::IMAGE,
                'name' => 'Misc'
            ]
        ]);

        $documentCategory = Category::create([
            'name' => 'Learning',
            'type' => Category::DOCUMENT
        ]);

        Category::insert([
            [
                'parent_id' => $documentCategory->id,
                'type' => Category::DOCUMENT,
                'name' => 'Social Media'
            ],
            [
                'parent_id' => $documentCategory->id,
                'type' => Category::DOCUMENT,
                'name' => 'IG',
            ],
            [
                'parent_id' => $documentCategory->id,
                'type' => Category::DOCUMENT,
                'name' => 'FB'
            ],
            [
                'parent_id' => $documentCategory->id,
                'type' => Category::DOCUMENT,
                'name' => 'Google'
            ],
            [
                'parent_id' => $documentCategory->id,
                'type' => Category::DOCUMENT,
                'name' => 'Web Design'
            ]
        ]);
    }
}
