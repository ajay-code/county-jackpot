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
            margin-top: 200px;
            margin-bottom: 6rem;
        }
    </style>


@endsection
@section('content')
    <section class="terms container">
        {!! nl2br('<h1 class="p1"><span class="s1">Information on this site</span></h1>
        <p class="p2"><span class="s1">All information that appears on this site is for entrants and potential entrants in England only and is not intended to encourage people that reside outside of England to partake in any County Jackpot prize draws. Nor is it an offer or invitation by The County Jackpot to any person to do so.</span></p>
        <p class="p2"><span class="s1">If you have any enquiries about any of the information that appears on this site please contact the County Jackpot support team via the following email address: </span></p>
        <p class="p3"><span class="s2"><a href="mailto:enquiries@thecountyjackpot.com">enquiries@thecountyjackpot.com</a></span></p>
        <p class="p4"><span class="s1">This website is published and owned by The County Jackpot.</span></p>
        <p class="p4"><span class="s1">You are responsible for any decision made by you based on the information on this site. The County Jackpot and its directors, employees or agents accept no liability for loss or damage (including, without limitation, any special, direct, indirect or consequential loss or damage or other losses or damage of whatever kind) that arise out of or relate to the use of this site or its contents.</span></p>
        <p class="p4"><span class="s1">If there is any conflict between the information on this site and the Rules and Procedures for County Jackpot prize draws (as amended from time to time), the Rules and Procedures will take priority.</span></p>
        
        <h2 class="p6"><span class="s1">Copyrights</span></h2>
        <p class="p2"><span class="s3">All pages and their content on this site, including design, text and graphics, are </span><span class="s1">© The County Jackpot 2018. All rights reserved. </span></p>
        
        <h2 class="p6"><span class="s1">Checking results</span></h2>
        <p class="p4"><span class="s1">Although we take every care to ensure the accuracy of information containing The County Jackpot results, we cannot take any responsibility for any mistakes or omissions. Prize winning and all aspects of the County Jackpot prize draws are subject to the relevant Game Rules and Procedures.</span></p>
        
        <h2 class="p6"><span class="s1">Hyperlinks and third parties</span></h2>
        <p class="p4"><span class="s1">The County Jackpot has not reviewed and accepts no responsibility for any information on any other website that you access by a hyperlink from this site, or for information on other websites that you came to this site from. The County Jackpot accepts no liability for loss or damage (including, without limitation, any special, direct, indirect or consequential loss or damage or other losses or damages of whatever kind) that arises out of access to, or the use of, any website linked by a hyperlink to this site or any information contained on that site. </span></p>
        
        <h2 class="p6"><span class="s1">Communications</span></h2>
        <p class="p4"><span class="s1">The County Jackpot is not associated with any company that asks for payment before giving out prized won on County Jackpot prize draws.</span></p>
        
        <h2 class="p6"><span class="s1">Acknowledgement</span></h2>
        <p class="p4"><span class="s1">As a visitor to this site, you are taken to have read, understood and agree to be bound by this Disclaimer. Visitors to this site from outside England do so on their own initiative and are responsible for complying with relevant local laws.</span></p>') !!}
    </section>


@endsection