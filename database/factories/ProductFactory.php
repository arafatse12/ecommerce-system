<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $cars = [
            'BMW',
            'Mercedes-Benz',
            'Honda',
            'Toyota',
            'Volvo'
        ];

        return [
            'product_title' => $this->faker->randomElement($cars),
            'price' => rand(1000000,2000000),
            'description' => $this->faker->realText(100),
            'created_at' => now(),
        ];
        
    }
}
