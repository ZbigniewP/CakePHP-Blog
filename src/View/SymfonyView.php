<?php
namespace App\View;

use WyriHaximus\TwigView\View\TwigView;

class SymfonyView extends TwigView
{
    public function initialize()
    {
        $this->loadHelper('Html');
        $this->loadHelper('Form');
    }
}