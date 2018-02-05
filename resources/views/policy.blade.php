@extends('layouts.front')
@section('css')

    <style>
        body{
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            max-width: 100%;
            -webkit-font-smoothing: antialiased !important;
            overflow-wrap: break-word;
            word-wrap: break-word; /* Old syntax */
        }
        h3, h2{
            margin: 20px 0 10px 0;
        }
        .terms{
            min-height: 600px;
            margin-top: 300px;
            margin-bottom: 6rem;
        }
    </style>


@endsection
@section('content')
    <section class="terms container">
        {!! nl2br('<h1>PRIVACY POLICY</h1>
        Your privacy is of utmost importance to us, The County Jackpot and we pledge to handle all information provided by you to us both securely and confidentially and will never sell your information to third parties.
        
        We ask of you to read through and understand the terms of this policy and also all terms and conditions provided on this site and familiarise yourself with your responsibilities (and ours) when using this site and the prize draws and services it provides. This policy covers The County Jackpot website, apps and services. Please not that when you provide information (or, if you buy potential entries for prize draws online and allow us to collect information about you), you also consent to us using it and contacting you (by email or telephone) for the purposes set out in this policy and the purposes stated in the terms and conditions and you agree that this will not constitute a breach of the Privacy and Electronic Communications Regulations 2003. We may need to update this privacy policy at times, so you are advised to check back regularly. We will provide a more prominent notice via email or on site if the changes are significant.
        
        You acknowledge that you have read and accepted the terms of this privacy policy and consent to the use of your personal information as set out in this privacy policy.
        <h3>
        Your Information</h3>
        The County Jackpot will collect your information when you open an online account, download any app, or partake in any prize draws including via any app for example. When you buy potential entries online you agree to third party card transaction handlers providing us with information about you in line with their Terms and Conditions. The information we collect can include your name, date of birth, username and password, answers to security questions, bank account, debit card, drivers licence, passport and contact details, together with details about your playing behaviour and transaction/game history relation to your partaking of prize draws and any information you send us via email. Please note that not all of this information is mandatory.
        In addition, we may collect the number given to your computer or device on the internet, known as an Internet Protocol address, when sending HTML emails to you or when you visit our website. We may also automatically collect your device’s advertising identifier when you use any Apps.
        <h3>
        How We Use Your Information</h3>
        The information we collect means that we can:
        <ul>
             <li>set up and run your account to partake in prize draws offered online by The County Jackpot,</li>
             <li>provide prize draws and services,</li>
             <li>enable you to partake in our prize draws online and in any County Jackpot app,</li>
             <li>notify you if you win, about changes or information relating to your account, or changes to our services,</li>
             <li>check you are entitled to use your provided debit card and</li>
             <li>ensure the website and any apps are optimized to enable the best experience for you whilst partaking in our prize draws.</li>
        </ul>
        It also means in certain circumstances, providing you have consented, we can ask your views on the services we offer, enhance market research and promote our prize draws and services. We also want our communications to be relevant to you so we’ll use your information to personalize marketing or other notifications.
        
        We may need to archive certain information about you for legal and regulatory reasons, and to continue to hold it for a number of years after you stop partaking in The County Jackpot prize draws and/or close your account. All personal information is held in accordance with the registration we have with the <strong>Information Commissioner’s Office (ICO)</strong>. We also take security very seriously, so while we hold your information we make sure it is safe. Find out more in the security section below.
        If you have any concerns or queries, or wish to opt out, you can send an email to help@thecountyjackpot.com, or choose unsubscribe on promotional email communications.
        <h3>
        Sharing Your Information</h3>
        If requested by the police or other regulatory or government authority investigating suspected illegal activities, we are entitled to share personal information with them.
        
        We will also make some of your information available to other carefully chosen third parties. This will include banks for the operation of your County Jackpot account, for purchasing potential entries through the site or any apps, or for the purpose of answering questions about your account, authentication agencies to verify your details when you open an account and to check your entitlement to use any debit card registered to your account, or agencies for the purpose of administering and managing your direct debit and online account.
        
        Third parties referred to above cannot access your personal information or any information that is traceable to an individual player. Our trusted business partners are able to access the cookies in your browser when you visit their websites, and your advertising identifiers when you use any App. However, this information remains anonymous and does not identify you as an individual. It provides an overview of player behaviour in any App and helps us to understand which third party websites bring players to The County Jackpot online and whether we’ve placed adverts effectively. It also allows our survey providers to identify players who have taken part in a survey before.
        
        Our trusted business partners process your information in line with their own privacy practices. Your information may also be transferred to countries outside the European Economic Area. Their laws may not be as strict, or provide the same protection to you as given by the Data Protection Act. You consent to the transfer and processing of your information in these countries.
        <h3>
        Security</h3>
        Your security is of upmost importance to us and to keep your data safe we use high industry standard (128 bit) Secure Socket Layer (SSL) encryption. Our entire site is accessed using https rather than http, meaning that all information that is sent and received is encrypted for additional security. You can see this in the address bar of your web browser.
        
        <strong> What is SSL encryption?</strong>
        
        SSL stands for Secure Socket Layer and it is the predecessor of TLS – Transport Layer Security. It’s most commonly used when websites request sensitive information from a visitor, like a password or credit card number. It encrypts information sent between your website and a visitor’s web browser so that it cannot be read by a third party as it is sent across the internet.
        
        <strong> What are cookies?</strong>
        
        A cookie is a small, often encrypted text file that is stored on your device. A website sends you a cookie and your web browser stores it. The browser returns the cookie to the web server the next time you visit. They are designed to make the interaction between websites and users faster and easier. Our cookies don’t store private information, such as debit card details or your address. They simply store encrypted information. Cookies don’t harm your device and you can block them by changing your browser settings.') !!}
    </section>


@endsection