<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\SendContactJob;
use App\Http\Requests\ContactFormRequest;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class PageController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function contact()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        $title = 'Contact Us';
        $desc = 'Santona Media News Contact Us Page';
        $url = 'https://santonamedia.com/contact-us';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('Contac,Us');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','ContactAddress');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('ContactAddress');

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('user.pages.contact',$data);
        }
    }
    
    public function store(ContactFormRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        // Mail Delivery logic goes here
        $emailJob = (new SendContactJob($contact))->delay(Carbon::now()->addMinutes(2));
        $this->dispatch($emailJob);

        return redirect()->route('users.pages.contact')->withSuccess('Thank you for contacting us. We will get back to you soon');
        //  return redirect()->route('contact.create');
    }

    public function about()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        $title = 'About Us';
        $desc = 'Santona Media News About Us Page';
        $url = 'https://santonamedia.com/about-us';
        $image = 'https://santonamedia.com/static/david.jpg';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('Santona,Media,News,About,Us,Page');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Organization');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::addImage($image);
        JsonLd::setType('Organization');

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('user.pages.about',$data);
        }
    }

    public function privatePolicy()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        $title = 'Private Policy';
        $desc = 'Santona Media News Private Policy Page';
        $url = 'https://santonamedia.com/private-policy';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('Santona,Media,News,Private,Policy,Page');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','PrivatePolicy');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('PrivatePolicy');

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('user.pages.policy',$data);
        }
    }

    public function portfolio()
    {
        $categories = Category::with('posts')->get();

        foreach($categories as $category){
        $posts = $category->posts;
        $archives = Post::latest()->limit(10)->get();
        $posts = Post::latest()->paginate(10);
        $tags = Tag::with('posts')->get();

        $title = 'Portfolio';
        $desc = 'Santona Media News Portfolio Page';
        $url = 'https://santonamedia.com/portfolio';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('Santona,Media,News,Portfolio,Page');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Portfolio');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@santonamedia');
        TwitterCard::setDescription($desc);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Portfolio');

        $data = array(
            'category' => $category,
            'posts' => $posts,
            'tags' => $tags,
            'archives' => $archives,
            'categories' => $categories
        );

        return view('user.pages.portfolio',$data);
        }
    }
}
