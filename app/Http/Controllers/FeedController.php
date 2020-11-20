<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class FeedController extends Controller
{
    public function newsFeed()
    {
    	// create new feed
    	$feedNews = App::make("feed");

    	// cache the feed for 60 minutes with custom cache key "feedArticlesKey"
    	$feedNews->setCache(60,'feedArticlesKey');

    	// check if there is cached feed and build new only if is not
    	if(!$feedNews->isCached()){
    		// creating rss feed with our most recent 20 records in news table
    		$articles = \DB::table('posts')->orderBy('created_at','desc')->take(20)->get();

    		// set your feed's title, description, link, pubdate and language
    		$feedNews->title = 'Santona Media Latest News';
    		$feedNews->description = 'The latest news in sports, entertainment, politics, technology, lifestyle, health and business';
    		$feedNews->logo = 'https://santonamedia.com/static/logo.png';
    		$feedNews->link = url('feedNews');
    		$feedNews->setDateFormat('datetime');
    		$feedNews->pubdate = $articles[0]->created_at; // 'datetime','timestamp' or 'carbon'
    		$feedNews->lang = 'en';
    		$feedNews->setShortening(true); // true or false
    		$feedNews->setTextLimit(100); // maximum length of description text

    		foreach($articles as $n){
    			// set item's title, author, url, pubdate, description and content
    			$feedNews->add($n->title, $n->admin->name, URL::to($n->slug), $n->created_at, $n->description, $n->content);
    		}
    	}

    	// return your feed ('atom' or 'rss' format)
    	return $feedNews->render('atom');
    }
}
