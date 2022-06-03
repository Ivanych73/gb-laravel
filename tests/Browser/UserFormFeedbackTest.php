<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserFormFeedbackTest extends DuskTestCase
{

    use DatabaseMigrations;
    public function testUserFormFeedbackCreateCorrect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('user.feedback')
                    ->type('full_name', 'user1')
                    ->type('text', 'some text')
                    ->press('Отправить')
                    ->assertRouteIs('user.saveFeedback');
            $browser->screenshot('feedback');
        });
    }

    public function testUserFormFeedbackCreateIncorrect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('user.feedback')
                    ->type('full_name', '1')
                    ->type('text', '2')
                    ->press('Отправить')
                    ->assertRouteIs('user.feedback')
                    ->assertSee('Количество символов');
        });
    }
}
