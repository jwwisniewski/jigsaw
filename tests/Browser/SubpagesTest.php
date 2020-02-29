<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Subpage\CreatePage;
use Tests\Browser\Pages\Subpage\ListingPage;
use Tests\DuskTestCase;

class SubpagesTest extends DuskTestCase
{
    public function testSubpageCreation()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit(new ListingPage())
                ->click('@createLink')
                ->on(new CreatePage())
                ->press('@cancelButton')
                ->on(new ListingPage())
            ;
        });
    }
}
