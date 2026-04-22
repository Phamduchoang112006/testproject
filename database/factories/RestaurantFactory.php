<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Cơm Dĩa', 'Bánh mì', 'Bú phở'];
        $dishNames = [
            'Cơm Siễu Mai' => 'Cơm Dĩa',
            'Cơm Chay' => 'Cơm Dĩa',
            'Cơm Gà Xá' => 'Cơm Dĩa',
            'Bánh mì Heo Quay' => 'Bánh mì',
            'Bánh mì Gà Xá' => 'Bánh mì',
            'Bánh mì Xá Xíu' => 'Bánh mì',
            'Bún Bò Huế' => 'Bú phở',
            'Phở Gà' => 'Bú phở',
            'Phở Bò' => 'Bú phở',
            'Mì Quảng' => 'Bú phở',
        ];

        $name = $this->faker->randomElement(array_keys($dishNames));
        $category = $dishNames[$name];

        return [
            'name' => strtoupper($name),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomElement([69000, 75000, 80000, 95000]),
            'image' => 'https://via.placeholder.com/600x400.png?text=' . urlencode($name),
            'category' => $category,
            'ingredients' => implode(', ', $this->faker->words(5)),
        ];
    }
}
