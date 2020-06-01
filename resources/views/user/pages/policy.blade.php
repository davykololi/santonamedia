@extends('layouts.app')
@section('title', '| Private Policy')

@section('content')
    <div class="container-fluid features">
        <div class="row">
            @include('partials.sidebar_left_col')
            <main class="col-lg-6 col-md-6 col-sm-12 main-content">
                <div class="headings">
                <h1> 
                    {{ config('app.name', 'skyluxnews') }} PRIVATE POLICY STATEMENT
                </h1>
                </div>
                <div class="private-policy">
                    <h4><strong>TYPE OF DATA COLLECTED</strong></h4>
                        <ul>
                            <li>
                                This app collects information such as personal email addresses and users names through sign up,contact and subscription forms.
                            </li>
                        </ul>
                    <h4><strong>USE OF COLLECTED DATA</strong></h4>
                        <ul>
                            <li>
                                The data collected by this website is only meant to enhance user experience while using this website. This include services such as sending prompt updates to the subcribers of our app as they occur.
                            </li>
                            <li>We don't share or sell data provided to us to third parties.</li>
                            <li>
                                We don't use data provided to us for other purposes other than what's stated above.
                            </li>
                        </ul>
                    <h4><strong>PROTECTION OF COLLECTED DATA</strong></h4>
                        <ul>
                            <li>
                                The data collected by this website is stored securely out of reach to everyone.
                            </li>
                            <li>
                                The use of SSL encryption by this website is an assurance that our site is safe and secure. The data you provide to us is secure too given that it's encrypted by our app making it hard for those with malicious aims from accessing it.
                            </li>
                        </ul>
                    <h4><strong>USERS RIGHTS</strong></h4>
                        <ul>
                            <li>
                                The security and rights of those who provide data to our app is quaranteed. We don't share the information provided to us with anyone else. 
                            </li>
                            <li>
                                We respect the privacy and confidentiality of those who provide data to us in accordance to the constitution and the International Human Rights Law.
                            </li>
                            <li>
                                We don't share personal information provided to us with third paties. The information provided to us is only meant to serve user experience and nothing else at all.
                            </li>
                            <li>
                                We respect the rights of minors and those below 18 years old. Therefore we seek permission from parents or guardians before placing any content related to minors to this website as long as it's not meant to affect them in a bad way.
                            </li>
                            <li>
                                Users of this website have freedom and choice not to agree to the terms of our private policy statement and are free not to use our website if they feel to do so. Users are also free to remove any information provided to this website if need arises.
                            </li>
                        </ul>
                    <h4><strong>NORTIFICATION OF CHANGES</strong></h4>
                        <ul>
                            <li>
                                We will always inform our users immediately of any changes made to our private and policy statement for improving our user experience and enhancing mutual working relationship.
                            </li>
                        </ul>
                    <h4><strong>CONTACT INFORMATION</strong></h4>
                        <ul>
                            <li>
                                You are free to contact us using the mobile number <a href="tel:+254-0724351952"></i>+254 0724351952</a>.
                            </li>
                            <li>
                                You can as we reach us via our official email address at <a href="mailto:santonamedia79@gmail.com">santonamedia79@gmail.com</a> or via our app <a href="{{ route ('users.pages.contact') }}">Contact Us</a> link.
                            </li>
                        </ul>
                    <h4><strong>DISCLAIMER NOTE</strong></h4>
                        <ul>
                            <li>
                                The users of this app are discouraged from using abusive languages in all engagements especially while sharing comments. Those who break this rule will be held accountable as individuals and Santonia Media Ltd will not assume any responsibility or liability for such behavious .  
                            </li>
                            <li>
                                This app is used by the public with information from different  writers. The views of individual writers do not reflect the views of Santonia Media Ltd as a whole, therefore not liable or responsible for it. 
                            </li>
                            <li>
                                No system can ever be regarded as 100%. However we remain committed in ensuring that we deal with any securith threat issues that arise.
                            </li>
                        </ul>
                    </div>
                    @include('user.posts.tags')
                    @include('user.newsletter.newsletter')
            </main> <!--end of blog-main -->
            @include('partials.sidebar_right_hcol')
        </div><!-- /.row -->
    </div> <!-- /.container -->
@endsection


