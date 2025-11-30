<?php

namespace Tests\Feature\Modals;

use Tests\TestCase;

class ContactModalValidationTest extends TestCase
{
    /** @test */
    public function validation_works()
    {
        $response = $this->post('/de/contact/send', [
            'email'     => 'wrong-email',
            'message'   => '',
            'hp_secret' => '' // ← обязательно
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name','email','phone','topic','message'
        ]);
    }
}
