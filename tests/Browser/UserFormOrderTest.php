<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserFormOrderTest extends DuskTestCase
{
    //use DatabaseMigrations;
    use RefreshDatabase;
    public function testUserFormOrderCreateCorrect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('user.order')
                    ->type('full_name', 'user1')
                    ->type('email', '1@1.ru')
                    ->type('phone', '1234567890')
                    ->type('text', 'some text')
                    ->press('Отправить')
                    ->assertRouteIs('user.saveOrder');
            $browser->screenshot('order');
        });
    }

    public function testUserFormOrderCreateIncorrect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visitRoute('user.order')
                    ->type('full_name', '1')
                    ->type('email', '1@1.ru')
                    ->type('phone', '1234567890')
                    ->type('text', '2')
                    ->press('Отправить')
                    ->assertRouteIs('user.order')
                    ->assertSee('Количество символов');
        });
    }
}
