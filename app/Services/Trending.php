<?php

namespace App\Services;

use Analytics;
use Spatie\Analytics\Period;

class Trending{
	public function week($limit = 15)
	{
		return $this->getResults(7);
	}

	protected function getResults($days,$limit=15)
	{
		$data = Analytics::fetchMostVisitedPages(Period::days($days),$limit + 10);
		return $this->parseResults($data,$limit);
	}

	protected function parseResults($data,$limit)
	{
		return $data->reject(function($item){
			return $item['url'] ==	'/' or $item['url'] == '/home' or starts_with($item['url'], '/category');
		})->unique('url')->transform(function($item){
			$item['pageTitle'] = str_replace('-Santona Media News','',$item['pageTitle']);
			return $item;
		})->splice(0,$limit);
	}
}