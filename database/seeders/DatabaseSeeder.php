<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Clown;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $plant = new Plant();
        $plant->name = 'Tomate';
        $plant->slug = 'tomate';
        $plant->description = 'Tomaten sind Früchte der Tomatenpflanze.';
        $plant->stock = 10;
        $plant->save();

        $plant = new Plant();
        $plant->name = 'Kartoffel';
        $plant->slug = 'kartoffel';
        $plant->description = 'Die Kartoffel ist eine Pflanzenart aus der Gattung der Nachtschattengewächse (Solanaceae).';
        $plant->stock = 20;
        $plant->save();

        $area = new Area();
        $area->name = "Acker in Adligenswil";
        $area->plant_id = 1;
        $area->slug = "acker-in-adligenswil";
        $area->description = "Acker in Adligenswil ist ein Kartoffel.";
        $area->address = 'Strasse 1';
        $area->city = 'Luzern';
        $area->zip = '6060';
        $area->save();

        Clown::factory()->count(10)->create();
    }
}
