<?php

namespace App\Http\Controllers\User;

use SEO;
use JsonLd;
use Twitter;
use SEOMeta;
use OpenGraph;
use Carbon\Carbon;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\SendContactJob;
use App\Http\Requests\ContactFormRequest;

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
        OpenGraph::addProperty('type','Contact');

        Twitter::setTitle($title);
        Twitter::setSite('@santonamedia');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);

        return view('user.pages.contact');
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
        OpenGraph::addProperty('type','About');

        Twitter::setTitle($title);
        Twitter::setSite('@santonamedia');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);
        JsonLd::addImage($image);

        return view('user.pages.about');
    }

    public function privatePolicy()
    {
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
        OpenGraph::addProperty('type','Private Policy');

        Twitter::setTitle($title);
        Twitter::setSite('@santonamedia');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);

        return view('user.pages.policy');
    }

    public function portfolio()
    {  
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

        Twitter::setTitle($title);
        Twitter::setSite('@santonamedia');

        JsonLd::setTitle($title);
        JsonLd::setDescription($desc);

        return view('user.pages.portfolio');
    }
}
