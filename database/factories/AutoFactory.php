<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auto>
 */
class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $marks =[
            'Audi',
            'BMW',
            'Ford',
            'Honda',
            'Hyundai',
            'Kia',
            'Lada',
            'Mazda',
        ];
        $models = [
            'Седан',
            'Купе',
            'Хэтчбек',
            'Лифтбек',
            'Универсал',
            'Кроссовер',
            'Внедорожник',
        ];
        $status = [
            'Отсутствует',
            'Присутствует',
        ];

        return [
            'client_id'=> DB::table('clients')->get()->random()->id,
            'mark'=> $marks[rand(0,7)],
            'model'=>$models[rand(0,6)],
            'color'=>fake()->safeHexColor(),
            'number'=> Str::random(6),
            'status'=> $status[rand(0,1)],
            'created_at'=>\Carbon\Carbon::now(),
        ];
    }
}
