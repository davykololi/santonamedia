<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Notification;
use App\Models\Contact;
use App\Interfaces\PostInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\TagInterface;
use Spatie\SchemaOrg\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\SendContactJob;
use App\Notifications\ContactMessage;
use App\Http\Requests\ContactFormRequest;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\URL;

class PageController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostInterface $postRepository,CategoryInterface $categoryRepository,TagInterface $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function contact()
    {
        $categories = $this->categoryRepository->categoryWithPosts();

        foreach($categories as $category){
        $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $tags = $this->tagRepository->tagWithPosts();

        $title = 'Contact Us';
        $desc = 'News Stadia Contact Page';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('contact us');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','ContactPage');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('ContactPage');

        $contact = Schema::ContactPage()
                ->name($title)
                ->description($desc)
                ->url($url)
                ->logo("https://newsstadia.com/static/logo.jpg")
                ->sameAS("http://www.newsstadia.com")
                ->contactPoint([Schema::ContactPoint()
                ->telephone('254 0724351952')
                ->email('newsstadia@gmail.com')]);
        echo $contact->toScript();

        $data = array(
            'category' => $category,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
            'tags' => $tags,
            'categories' => $categories,
        );

        return view('user.pages.contact',$data);
        }
    }
    
    public function store(ContactFormRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        // Mail Delivery logic goes here
        $emailJob = (new SendContactJob($contact))->delay(Carbon::now()->addMinutes(2));
        $this->dispatch($emailJob);
        $number = getenv('NEXMO_NUMBER');

        Notification::send($number (new ContactMessage($contact)));

        return redirect()->route('users.pages.contact')->withSuccess('Thank you for contacting us. We will get back to you soon');
        //  return redirect()->route('contact.create');
    }

    public function about()
    {
        $categories = $this->categoryRepository->categoryWithPosts();

        foreach($categories as $category){
        $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $tags = $this->tagRepository->tagWithPosts();

        $title = 'About Us';
        $desc = 'News Stadia About Us Page';
        $image = 'https://newsstadia.com/static/david.jpg';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('about us');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Organization');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::addImage($image);
        JsonLd::setType('Organization');

        $aboutUs = Schema::Organization()
                ->name($title)
                ->description($desc)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $aboutUs->toScript();

        $data = array(
            'category' => $category,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
            'tags' => $tags,
            'categories' => $categories,
        );

        return view('user.pages.about',$data);
        }
    }

    public function privatePolicy()
    {
        $categories = $this->categoryRepository->categoryWithPosts();

        foreach($categories as $category){
        $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $tags = $this->tagRepository->tagWithPosts();

        $title = 'Private Policy';
        $desc = 'News Stadia Private Policy Statement';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('private policy statement');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','PrivatePolicy');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('PrivatePolicy');

        $privatePolicy = Schema::WebPage()
                ->name($title)
                ->description($desc)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $privatePolicy->toScript();

        $data = array(
            'category' => $category,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
            'tags' => $tags,
            'categories' => $categories
        );

        return view('user.pages.policy',$data);
        }
    }

    public function portfolio()
    {
        $categories = $this->categoryRepository->categoryWithPosts();

        foreach($categories as $category){
        $categoryPosts = $category->posts()->published()->eagerLoaded()->get();
        $allPosts = $this->postRepository->allPublishedPosts();
        $allPostsSide = $this->postRepository->latestPublishedFive();
        $tags = $this->tagRepository->tagWithPosts();

        $title = 'Portfolio';
        $desc = 'News Stadia Portfolio Page';
        $url = URL::current();

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($desc);
        SEOMeta::setKeywords('news stadia portfolio page');
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($desc);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type','Portfolio');

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@newsstadia');
        TwitterCard::setDescription($desc);
        TwitterCard::setUrl($url);

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::setType('Portfolio');

        $portfolio = Schema::WebPage()
                ->name($title)
                ->description($desc)
                ->email('newsstadia@gmail.com')
                ->url($url)
                ->sameAS("http://www.newsstadia.com")
                ->logo("https://newsstadia.com/static/logo.jpg");
        echo $portfolio->toScript();

        $data = array(
            'category' => $category,
            'allPosts' => $allPosts,
            'allPostsSide' => $allPostsSide,
            'tags' => $tags,
            'categories' => $categories
        );

        return view('user.pages.portfolio',$data);
        }
    }

    public function sendSms()
    {
        try{
            $basic = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"),getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);

            $receiverNumber = "254724351952";
            $message = "The client has send you a mail from 'https://newsstadia.com'";

            $message = $client->message()->send([
                        'to' => $receiverNumber,
                        'from' =>"https://newsstadia.com" ,
                        'text' => $message,
                    ]);
        } catch(Exception $e){
            dd("Error".$e->getMessage());
        }
    }
}
