<?php

namespace App\Http\ViewComposers;

use App\Services\Trending;
use Illuminate\View\View;

class PopularityComposer{
	private $trending;

	public function __construct(Trending $trending)
	{
		$this->trending = $trending;
	}

	public function compose(View $view)
	{
		$view->with('popular',$this->trending->week());
	}
}