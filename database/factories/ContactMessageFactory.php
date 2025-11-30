<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactMessage;

class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition()
    {
        return [
            'name'    => $this->faker->name(),
            'email'   => $this->faker->safeEmail(),
            'phone'   => $this->faker->e164PhoneNumber(),
            'topic'   => $this->faker->sentence(3),
            'message' => $this->faker->paragraph(2),
            'ip'      => $this->faker->ipv4(),
            'locale'  => 'de',
        ];
    }
}
