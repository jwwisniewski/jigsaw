<?php

namespace Tests\Browser\Pages\Subpage;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class CreatePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/_admin/subpage/create';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser
            ->assertPathIs($this->url())
            ->assertSeeIn('h1', 'create')
        ;
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@cancelButton' => '.cancelButton',
        ];
    }
}
