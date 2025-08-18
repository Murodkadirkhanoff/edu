<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $categories = Category::with('children')
            ->root()
            ->orderBy('title_' . app()->getLocale())
            ->get();

        $view->with('headerCategories', $categories);
    }
}
