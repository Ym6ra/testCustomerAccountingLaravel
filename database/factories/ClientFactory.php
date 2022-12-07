<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Carbon\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genders = [
            'муж',
            'жен',
            'иное',
        ];
        //$x = 9; //степень
        $phones = "+7(". rand(0, 9) . rand(0, 9) . rand(0, 9) . ")" . rand(0, 9) . rand(0, 9) . rand(0, 9) . "-" . rand(0, 9) . rand(0, 9) . "-" . rand(0, 9) . rand(0, 9);
        return [
            'name'=>fake()->name(),
            'gender'=>$genders[rand(0,2)],
            'phone'=>$phones,
            'address'=>fake()->sentence(3),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
    }
}
//проверено перед commit
