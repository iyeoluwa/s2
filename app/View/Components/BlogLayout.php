<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogLayout extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.blog');
    }
}
