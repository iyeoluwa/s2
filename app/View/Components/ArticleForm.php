<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ArticleForm extends Component
{
    /**
    *
     *@var string
     */
    public $title;
    /**
     * Create a new component instance.
     *
     * @param string $title
     *
     * @return void
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.article-form');
    }
}
