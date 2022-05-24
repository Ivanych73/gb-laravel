<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckFeedback()
    {
        $response = $this->get(route('user.feedback'));

        $response->assertStatus(200);
        $response->assertViewIs('user.feedback');
    }

    public function testCheckOrder()
    {
        $response = $this->get(route('user.order'));

        $response->assertStatus(200);
        $response->assertViewIs('user.order');
    }

    public function testCheckSaveFeedback()
    {
        $data = [
            'userName' => "First Last",
            'feedbackText' => "some text"
        ];
        $response = $this->post(route('user.saveFeedback'), $data);

        $response->assertStatus(200);
        $response->assertViewIs('user.store');
    }

    public function testCheckSaveFeedbackValidate()
    {
        $data = [
            'userName' => "First Last"
        ];
        $response = $this->post(route('user.saveFeedback'), $data);

        $response->assertSessionHasErrors(['feedbackText']);
        $response->assertStatus(302);
    }

    public function testCheckSaveOrder()
    {
        $data = [
            'userName' => "First Last",
            'orderText' => "some text",
            'userEmail' => "1@1.com",
            'userPhone' => "89991234567"
        ];
        $response = $this->post(route('user.saveOrder'), $data);

        $response->assertStatus(200);
        $response->assertViewIs('user.store');
    }

    public function testCheckSaveOrderValidate()
    {
        $data = [
            'userName' => "First Last",
            'orderText' => "some text",
            'userEmail' => "1",
            'userPhone' => "phone"
        ];
        $response = $this->post(route('user.saveOrder'), $data);

        $response->assertSessionHasErrors(['userEmail']);
        $response->assertSessionHasErrors(['userPhone']);
        $response->assertStatus(302);
    }

}
