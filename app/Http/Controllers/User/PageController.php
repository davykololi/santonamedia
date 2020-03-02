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
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription('Skylux Blog Contact Us Page');
        SEOMeta::setKeywords('Skylux,Blog, Contact,Contact Us,Page');

        OpenGraph::setTitle('Contact Us');
        OpenGraph::setDescription('Skylux Blog Contact Us Page');
        OpenGraph::setUrl('http://localhost:8888/contact-us');
        OpenGraph::addProperty('type','Contacts');

        Twitter::setTitle('Contact Us');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('Contact Us Page');
        JsonLd::setDescription('Skylux Blog Contact Us Page');

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
        SEOMeta::setTitle('About Us');
        SEOMeta::setDescription('Skylux News Blog About Us Page');
        SEOMeta::setKeywords('Skylux,News,Blog, About,About Us,Page');

        OpenGraph::setTitle('About Us');
        OpenGraph::setDescription('Skylux Blog About Us Page');
        OpenGraph::setUrl('http://localhost:8888/about-us');
        OpenGraph::addProperty('type','About us');

        Twitter::setTitle('About Us');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('About Us Page');
        JsonLd::setDescription('Skylux Blog About Us Page');
        JsonLd::addImage('http://localhost:8888/static/david.jpg');

        return view('user.pages.about');
    }

    public function privatePolicy()
    {
        SEOMeta::setTitle('Private Policy');
        SEOMeta::setDescription('SKYLUG Blog Private Policy Page');
        SEOMeta::setKeywords('Skylux,Blog, Private,Policy,Page');

        OpenGraph::setTitle('Private Policy');
        OpenGraph::setDescription('Skylux Blog Private Policy Page');
        OpenGraph::setUrl('http://localhost:8888/private-policy');
        OpenGraph::addProperty('type','Private Policy');

        Twitter::setTitle('Private Policy');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('Private Policy Page');
        JsonLd::setDescription('Skylux Blog Private Policy Page');

        return view('user.pages.policy');
    }

    public function portfolio()
    {  
        SEOMeta::setTitle('Skyluxnews Portfolio Page');
        SEOMeta::setDescription('Skyluxnews Portfolio Page');
        SEOMeta::setKeywords('Skyluxnews Portfolio,Page');

        OpenGraph::setTitle('Skyluxnews Portfolio Page');
        OpenGraph::setDescription('Skyluxnews Portfolio Page');
        OpenGraph::setUrl('http://localhost:8888/portfolio');
        OpenGraph::addProperty('type','Skyluxnews Portfolio');

        Twitter::setTitle('Skyluxnews Portfolio');
        Twitter::setSite('@kololimdavid79');

        JsonLd::setTitle('Private Policy Page');
        JsonLd::setDescription('Skyluxnews Portfolio Page');

        return view('user.pages.portfolio');
    }
}
