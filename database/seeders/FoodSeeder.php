<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;
use Faker\Factory as Faker;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');
        $categories = ['Hoa quả', 'Thực phẩm khô', 'Rau hữu cơ', 'Sản phẩm nổi bật'];

        for ($i = 0; $i < 10; $i++) {
            Food::create([
                'name' => $faker->words(3, true),
                'category' => $faker->randomElement($categories),
                'image' => 'https://via.placeholder.com/300x200.png?text=Food+' . ($i + 1),
                'price' => $faker->numberBetween(10, 500) * 1000, // Vietnamese Dong format typically
                'description' => $faker->sentence(),
            ]);
        }
    }
}
