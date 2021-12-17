<?php

namespace App\Http\ViewComposers;

use App\Services\Trending;
use Illuminate\View\View;

class PopularityComposer
{
    private $trending;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Trending $trending)
    {
        $this->trending = $trending;
    }

	/**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
	public function compose(View $view)
    {
        $popular = $this->trending->week();
        
        $view->with(['popular'=>$popular]);
    }
}