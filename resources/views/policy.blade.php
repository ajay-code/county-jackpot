@extends('layouts.front')
@section('css')
   <style>
        body {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            margin: 9px 10px;
            max-width: 100%;
            -webkit-font-smoothing: antialiased !important;
            overflow-wrap: break-word;
            word-wrap: break-word;
            /* Old syntax */
        }

        h3,
        h2 {
            margin: 20px 0 10px 0;
        }

        .terms {
            min-height: 600px;
            margin-top: 300px;
            margin-bottom: 6rem;
        }

        /*******************************
        * Does not work properly if "in" is added after "collapse".
        * Get free snippets on bootpen.com
        *******************************/

        .panel-group .panel {
            border-radius: 0;
            box-shadow: none;
            border-color: #EEEEEE;
        }

        .panel-default>.panel-heading {
            padding: 0;
            border-radius: 0;
            color: #212121;
            background-color: #FAFAFA;
            border-color: #EEEEEE;
        }

        .panel-title {
            font-size: 14px;
        }

        .panel-title > a {
            display: block;
            padding: 15px;
            color: black;
            text-decoration: none;
        }

        .more-less {
            float: right;
            color: #212121;
        }

        .panel-default>.panel-heading+.panel-collapse>.panel-body {
            border-top-color: #EEEEEE;
        }

        .panel-body {
            padding-left: 20px;
        }

    </style>
@endsection
@section('content')
    <section class="terms container">
        {!! nl2br('<h1>PRIVACY POLICY</h1>
        Your privacy is of utmost importance to us, The County Jackpot and we pledge to handle all information provided by you to us both securely and confidentially and will never sell your information to third parties.
        
        We ask of you to read through and understand the terms of this policy and also all terms and conditions provided on this site and familiarise yourself with your responsibilities (and ours) when using this site and the prize draws and services it provides. This policy covers The County Jackpot website, apps and services. Please not that when you provide information (or, if you buy potential entries for prize draws online and allow us to collect information about you), you also consent to us using it and contacting you (by email or telephone) for the purposes set out in this policy and the purposes stated in the terms and conditions and you agree that this will not constitute a breach of the Privacy and Electronic Communications Regulations 2003. We may need to update this privacy policy at times, so you are advised to check back regularly. We will provide a more prominent notice via email or on site if the changes are significant.
        
        You acknowledge that you have read and accepted the terms of this privacy policy and consent to the use of your personal information as set out in this privacy policy.') !!}

        <br><br>
        <h3>Your Information</h3>
        <br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        Information we collect about you
                    </a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('<ul><li> The County Jackpot will collect some of your personal and contact information when you open an online account, download any County Jackpot apps, or partake in any prize draws. This information includes your name, address, email address, telephone number, social media username(s), title, date of birth and gender. Please note that not all this information is mandatory. We may also collect some contact information when you interact with us including via our Customer Care Team.</li>
                    <li>Copies of any email communications and interactions with us via our Customer Care Team or otherwise, including The County Jackpot social media channels.</li>
                    <li>Copies of documents that you send to us to prove your identity (including passport and drivers licence) when you are claiming a prize or where there is a legal reason to request this from you.</li>
                    <li>Transaction details including payments from you for The County Jackpot competitions, payments to you, details of The County Jackpot games played and the outcomes of those games.</li>
                    <li>Bank account details and the email address associated with your PayPal account in order to pay any prize money direct to said accounts. </li>
                    <li>Information about how you use our website and app and which websites you came to The County Jackpot from.</li>
                    <li>We may also receive personal data directly from you or from various third parties and public sources including PayPal, social media channels or other third parties including from credit reference agencies.</li></ul>') !!}
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                        How We Use Your Information
                    </a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('The information we collect means that we can:

                        <ul><li>set up and run your account to partake in prize draws offered online by The County Jackpot,</li>
                        <li>provide prize draws and services,</li>
                        <li>enable you to partake in our prize draws online and in any County Jackpot app,</li>
                        <li>notify you if you win, about changes or information relating to your account, or changes to our services,</li>
                        <li>check you are entitled to use your provided debit card and</li>
                        <li>ensure the website and any apps are optimized to enable the best experience for you whilst partaking in our prize draws.</li></ul>
                        
                        It also means in certain circumstances, providing you have consented, we can ask your views on the services we offer, enhance market research and promote our prize draws and services. We also want our communications to be relevant to you so we’ll use your information to personalize marketing or other notifications.
        
                        We may need to archive certain information about you for legal and regulatory reasons, and to continue to hold it for a number of years after you stop partaking in The County Jackpot prize draws and/or close your account. All personal information is held in accordance with the registration we have with the <strong>Information Commissioner’s Office (ICO)</strong>. We also take security very seriously, so while we hold your information we make sure it is safe. Find out more in the security section below.
                        
                        If you have any concerns or queries, or wish to opt out, you can send an email to <a href="mailto:enquiries@thecountyjackpot.com">enquiries@thecountyjackpot.com</a>, or choose unsubscribe on promotional email communications.
                        ') !!}
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                        Sharing Your Information
                    </a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('If requested by the police or other regulatory or government authority investigating suspected illegal activities, we are entitled to share personal information with them.
        
                    We will also make some of your information available to other carefully chosen third parties. This will include banks for the operation of your County Jackpot account, for purchasing entries through the site or any apps, or for the purpose of answering questions about your account, authentication agencies to verify your details when you open an account and to check your entitlement to use any debit card registered to your account, or agencies for the purpose of administering and managing your direct debit and online account.
                    
                    Third parties referred to above cannot access your personal information or any information that is traceable to an individual player.
                        ') !!}
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                        Personal Data for direct marketing
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('You will receive direct marketing by email if you have opened a County Jackpot account through our website or app and have either consented to receive such email marketing during account registration, and/or have not asked us to stop sending direct marketing by email to you.
                    
                    You can opt out from receiving direct marketing communications and notifications from us at any time by selecting “No” under the “Receive direct marketing” option in the profile settings section of your account. 
                    
                    To stop receiving push notifications on your mobile device, switch off the relevant option in the ‘Settings’ section of your device.') !!}
                </div>
            </div>
        </div>


        <br><br>
        <h3>Security</h3>
        <br>
        Your security is of upmost importance to us and to keep your data safe we use high industry standard (128 bit) Secure Socket Layer (SSL) encryption. Our entire site is accessed using https rather than http, meaning that all information that is sent and received is encrypted for additional security. You can see this in the address bar of your web browser.
        <br><br>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                        What is SSL encryption?
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('SSL stands for Secure Socket Layer and it is the predecessor of TLS – Transport Layer Security. It’s most commonly used when websites request sensitive information from a visitor, like a password or credit card number. It encrypts information sent between this website and your chosen web browser so that it cannot be read by a third party as it is sent across the internet.') !!}
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                        What are cookies?
                    </a>
                </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                <div class="panel-body">
                    {!! nl2br('A cookie is a small, often encrypted text file that is stored on your device. A website sends you a cookie and your web browser stores it. The browser returns the cookie to the web server the next time you visit. They are designed to make the interaction between websites and users faster and easier. Our cookies don’t store private information, such as debit card details or your address. They simply store encrypted information. Cookies don’t harm your device and you can block them by changing your browser settings.
                    The following cookies are used on this website:
                    <ul><li>XSRF-TOKEN</li><li>thecountyjackpot_session</li></ul>
                    ') !!}
                </div>
            </div>
        </div>
        
        <br><br>
        <h3>How long we keep your personal data</h3>
        <br>
        {!! nl2br('We will only keep your personal data for as long as necessary to fulfil the purposes we collected it for, including for the purposes of satisfying any legal, accounting, or reporting requirements.
        At the end of that retention period, your data will either be deleted or anonymised (so that it can no longer be associated with you) for research or statistical purposes.
        
        To determine the appropriate retention period for personal data, we consider the amount, nature, and sensitivity of the personal data, the potential risk of harm from unauthorised use or disclosure of your personal data, the purposes for which we process your personal data and whether we can achieve those purposes through other means, and the applicable legal requirements.
        
        In some circumstances you may be entitled to ask us to delete your data: see ‘Your Rights’ below for further information.') !!}

        <br><br>
        <h3>Your Rights</h3>
        {!! nl2br('
        You have the right:

        <ul><li>to ask us not to use your personal data for direct marketing. To do so, visit your Email Preferences within your account. See further information on how to do this above.</li>
         <li>to ask us not to process your personal data where it is processed on the basis of legitimate interests, if there are no compelling reasons for that processing;</li>
         <li>to request from us access to personal information held about you (below)</li>
         <li>to ask for the information we hold about you to be rectified if it is inaccurate or incomplete;</li>
         <li>to ask that we stop any consent-based processing of your personal data after you withdraw that consent;</li>
         <li>to ask, in certain circumstances, to delete the personal data we hold about you;</li>
         <li>to ask, in certain circumstances, for the processing of that information to be restricted; and</li>
         <li>to ask, in certain circumstances, for data portability.</li></ul>') !!}

        <br><br>
        <h3>Contact Us</h3>
        {!! nl2br('
        and add the following text:

        If you have any questions about our Privacy Policy, including any requests to exercise your rights, please contact the Data Protection Officer using the details set out below:

        <a href="mailto:enquiries@thecountyjackpot.com">enquiries@thecountyjackpot.com</a>') !!}


        <br><br>
        <h3>Changes to this Privacy Policy</h3>
        {!! nl2br('
        Any changes that we may make to our Privacy Policy in the future will be posted on our app and website. Where appropriate, we will notify you of the changes when you next visit our website.
        
        This Privacy Policy was last updated on 25th July 2018.') !!}
        
        
    </section>

@endsection