<?php
namespace App\View;

use WyriHaximus\TwigView\View\TwigView;

class AppView extends TwigView
{
    public function initialize()
    {
        $this->loadHelper('Html');
        $this->loadHelper('Form');
    }
}