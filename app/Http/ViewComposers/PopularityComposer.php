<?php

namespace App\Http\ViewComposers;

use Analytics;
use Spatie\Analytics\Period;
use Illuminate\View\View;

class PopularityComposer
{
	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view){
        $trendings = Analytics::fetchMostVisitedPages(Period::days(5));

        $view->with(['trendings'=>$trendings]);
    }
}