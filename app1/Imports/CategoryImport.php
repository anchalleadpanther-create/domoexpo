<?php
namespace App\Imports;

use App\Models\Ecommerce\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class CategoryImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip header row
        unset($rows[0]);

        foreach ($rows as $row) {

            // Adjust index based on your Excel columns
            $parentName = trim($row[0] ?? '');
            $subName = trim($row[1] ?? '');
            $subSubName = trim($row[2] ?? '');

            // =========================
            // PARENT CATEGORY
            // =========================
            if (!empty($parentName)) {
                $parent = Category::firstOrCreate(
                    ['category_name' => $parentName],
                    [
                        'parent_id' => 0,
                        'category_slug' => Str::slug($parentName),
                        'status' => 1,
                        'sort' => 0
                    ]
                );
            }

            // =========================
            // SUB CATEGORY
            // =========================
            if (!empty($subName)) {
                $sub = Category::firstOrCreate(
                    [
                        'category_name' => $subName,
                        'parent_id' => $parent->id
                    ],
                    [
                        'category_slug' => Str::slug($subName),
                        'status' => 1,
                        'sort' => 0
                    ]
                );
            }

            // =========================
            // SUB SUB CATEGORY
            // =========================
            if (!empty($subSubName)) {
                Category::firstOrCreate(
                    [
                        'category_name' => $subSubName,
                        'parent_id' => $sub->id
                    ],
                    [
                        'category_slug' => Str::slug($subSubName),
                        'status' => 1,
                        'sort' => 0,
                        'is_last' => 1
                    ]
                );
            }
        }
    }
}