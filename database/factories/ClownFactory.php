<?php



namespace Database\Factories;



use App\Models\Clown;

use Illuminate\Database\Eloquent\Factories\Factory;



/**

 * @extends Factory<Clown>

 */

class ClownFactory extends Factory

{

    /**

     * Define the model's default state.

     *

     * @return array<string, mixed>

     */

    public function definition(): array

    {

        return [

            'name' => $this->faker->name(),

            'email' => $this->faker->unique()->safeEmail(),

            'description' => $this->faker->text(),

            'rating' => $this->faker->numberBetween(1, 5),

            'status' => $this->faker->randomElement(['active', 'passive', 'unknown']),

        ];

    }

}
