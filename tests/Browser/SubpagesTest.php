<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Subpage\CreatePage;
use Tests\Browser\Pages\Subpage\ListingPage;
use Tests\DuskTestCase;

class SubpagesTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testSubpageCreation()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(new ListingPage())
                ->click('@createLink')
                ->on(new CreatePage())
                ->type('input[name="title"]', 'dusk subpage title')
                ->type('div.ck-content', 'dusk subpage contents')
                ->press('input[name="saveAndReturn"]')
                ->on(new ListingPage())
                ->assertSee('dusk subpage title')
                ->assertSeeLink('Edit')
                ->assertSeeLink('Delete')
            ;
        });
    }
}
