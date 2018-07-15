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

    </style>
@endsection

@section('content')

    <section class="terms container">
        <div class="demo">
            <h1>Terms &amp; Rules</h1>
            <br>
            <br>
            The Terms and Rules found below apply when using www.thecountyjackpot.com, partaking in any County Jackpot draws and accessing
            your County Jackpot account:
            <h3>Account Terms</h3>
            1st Edition effective as of 25th January 2018
            <br>
            <br>
            The following Account Terms state the applicable rules and procedures in relation
            to opening an account and its use when partaking in all County Jackpot prize draws (including mobile devices and by direct
            debit) and for all other reasons. By accepting these Terms, you thereby agree to be bound by the documents found below:
            <br>
            <br>
            <ul>
                <li>Rules for County Jackpot Online Prize Draws.</li>
                <li>The Game Specific Rules (if any) and the procedures for each individual Prize Draw.</li>
            </ul>
            {!! nl2br("
            -If the prize offered is cash your account balance will be updated upon winning within 7 working days. You can view this in the Balance section of your account. From here you can withdraw your winnings into a bank or building society account.
            -If the prize offered is physical, it will be posted to your provided address within 14 working days.
            -You must only enter your county’s prize draws. Any entry made into a prize draw outside of your county of residence will be forfeit and non-refundable. Proof of identification and proof of address may be required upon winning before any prize is given.
            -The maximum entry limit for each prize draw is 5 per person. Any entries made over this limit will be forfeit and non-refundable.
            -Entrants must be 16 or over and must permanently reside in one of the 48 English Counties.") !!}
            <br>
            <br>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading1">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                1. Account Registration
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>1.1 You can only have one County Jackpot account.</li>
                                <li>1.2 You must only register (and use) a County Jackpot account if:a). You are aged 16 or over; b).
                                    You permanently reside in one of the 48 English counties*; c). Where debit card details have
                                    been supplied**, the debit card details supplied are those of a UK or Isle of Man debit card
                                    linked to a UK or Isle of Man bank or building society account that you are an authorised user
                                    of; d). The card referred to in Section 1.2(d) has not been reported as lost or stolen or has
                                    not been supplied in relation to another account; and e). Where required, you can verify that
                                    any information supplied to The County Jackpot is genuine and can provide relevant photo identification
                                    in the form of a U.K drivers licence or U.K passport. *You agree that any physical prizes won
                                    may be sent to the address provided upon account creation and that it is the address of your
                                    permanent residence. **You agree that any prize won may be paid back to the debit card. If you
                                    register a debit card for a joint account, you will be authorising The County Jackpot to pay
                                    any prize won to that debit card and this may amount to disclosure of the prize to other holders
                                    of that joint account.</li>
                                <li>1.3 When applying to open an account you are required to provide certain information to help The
                                    County Jackpot determine whether you and/or your provided debit card meet the criteria set out
                                    in section 1.2 and weather you are eligible to take part in County Jackpot prize draws. This
                                    information may include, your name, gender, date of birth, debit card details, address, email
                                    address and your security questions. The County Jackpot reserves the right to carry out checks
                                    to establish the above and to verify (or ask an authentication agency to carry out checks to
                                    verify) your age and identity and any other details provided and to ask you for further documentation
                                    to verify the same.</li>
                                <li>1.4 The County Jackpot may also request information from you or carry out checks after you have opened
                                    an account to ensure that you and/or your debit card still meet the criteria stated in section
                                    1.2.</li>
                                <li>1.5 The County Jackpot reserves the right to refuse an application to open an account for any reason.</li>
                                <li>1.6 If The County Jackpot discovers that you were not or are no longer eligible to open, hold and
                                    use and account, The County Jackpot reserves the right to take all appropriate steps in relation
                                    to you and your account (including, without limitation, suspending or terminating your account
                                    and investigating any security issues).</li>
                                <li>1.7 The County Jackpot will not be liable to pay and prize (both physical and digital) to anyone
                                    that does not meet the criteria stated in section 1.2 and may refuse to pay a prize to anyone
                                    that has more than one account. If a prize is paid to anyone who does not meet those criteria,
                                    that person will be required to repay the prize immediately if The County Jackpot requests it.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false"
                                aria-controls="collapse2">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                2. Using Your Account
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>2.1 You are responsible for keeping all information relating to your County Jackpot account accurate
                                    and up to date. You must also keep your password secure at all times and take steps to prevent
                                    it being used without your permission. You should:

                                    a). always remember your password and never
                                    tell it to anybody;

                                    b). never leave any physical trace of your password (writing it down, making
                                    note of it on your computer or other electronic device) or record it in a way that others could
                                    understand it;

                                    c). destroy any communications from The County Jackpot relating to your password
                                    immediately after reading them;

                                    d). do not create a password that is easy to guess by others;</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false"
                                aria-controls="collapse3">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                3. Play Limits
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body">
                            <ul>
                                The maximum attempted entry limit is 5 per draw. You must not exceed this limit and any entry that you make over the 5-entry
                                limit will be forfeit regardless of whether your submitted answer is correct and will not be included
                                in that specific draw.
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false"
                                aria-controls="collapse4">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                4. Entry/Transaction History
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">
                            <ul>
                                You can view details in relation to your prize draw entry history and certain transaction history through your account.
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false"
                                aria-controls="collapse5">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                5. Account closure/Termination
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>5.1 You can close your account at any time by getting in touch with the customer care team via the
                                            email address stated on the sites contact page.</li>
                                        <li>5.2 There is an account limit of one per person. If The County Jackpot discovers that you are using
                                            more than one account or suspects a third party account is being used by you or on your behalf,
                                            The County Jackpot reserves the right to terminate, vary or suspend those accounts (at its discretion)
                                            and take appropriate actions.</li>
                                        <li>5.3 The County Jackpot may terminate, vary or suspend access to your account immediately and without
                                            giving you prior notice: a). If any information provided by you is fraudulent, inaccurate, incomplete
                                            or out of date; b). on your breach of these Terms, relevant game/entry rules and/or the relevant
                                            games procedures and/or any relevant game specific rules; c). For maintenance/repair work or
                                            to upgrade/update the site and The County Jackpot’s computer system; d). If The County Jackpot
                                            terminates prize draws, the provision of accounts or access to the site or any part of it to
                                            its customers for any reason; or e). For any other reason at The County Jackpot’s sole discretion.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false"
                                aria-controls="collapse6">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                6. Prize Draw Requirements and Entry Purchases
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>6.1 All payments made in relation to all current and future prize draws provided by The County Jackpot
                                        are non-refundable.</li>
                                    <li>6.2 You are responsible for reading these terms and conditions and making sure you are eligible for
                                        entry into the provided prize draws.</li>
                                    <li>6.3 A prerequisite memory game must be completed before entry into a prize draw can be attempted.
                                        This includes an element of human memory-based skill and requires you to memorise a pattern of
                                        images and then answer a question in relation to those images. You must submit the answer you
                                        believe to be correct (via payment) for consideration into said prize draw and you will not be
                                        told whether or not your answer was correct</li>
                                </ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false"
                                aria-controls="collapse7">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                7. Use of the Site
                            </a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>7.1 You agree that:
                                    a). the site and prize draws are for your own personal, non-commercial use; and
                                    b). you are only allowed to use your account and the site, and take part in prize draws via your
                                        account, as set out in these terms, the applicable Game Rules, and Game Procedures and any Game
                                        Specific Rules, or on the Game Details Screen.</li>
                                <li>7.2 You also agree that you will use your account, the site and the partake in the prize draws in
                                    an appropriate and lawful manner only and will not:
                                    a). receive, access or transmit any content
                                    which is pornographic, obscene, racist, threatening, menacing, offensive, defamatory, in breach
                                    of any intellectual property right, (including, without limit, copyright), in breach of confidence
                                    or otherwise objectionable or unlawful; or
                                    b). knowingly or recklessly transmit any content (including, without limit, viruses) through the site and/or The County Jackpot’s computer system which will
                                    cause, or be likely to cause, detriment or harm in any degree, to computer systems owned by The
                                    County Jackpot or others; or
                                    c). hack into, make excessive traffic demands on or cause any impairment
                                    of the functions of any computer system, deliver or forward chain letters, “junk mail” of any
                                    kind, surveys, contests, pyramid schemes or otherwise engage in any behaviour intended to prevent
                                    others from partaking in prize draws or using the site or any other website, or which is otherwise
                                    likely to damage the reputation or business of The County Jackpot or of any third party; or d).
                                    authorize or allow anyone to do the above.</li>
                                <li>7.3 You agree to indemnify The County Jackpot against any costs, losses, damages and expenses which
                                    The County Jackpot may suffer or incur arising out of or in relation to any clam, legal proceeding
                                    or demand made by yourself or any third party due to or arising out of your wrongful or negligent
                                    use of your account, partaking of prize draws, access to the site and/or The County Jackpot’s
                                    computer system, or breach by you of these terms.</li>
                                <li>7.4 There is no guarantee that the site will display correctly on all devices it can be viewed on.</li>
                                <li>7.5 The County Jackpot is the owner or licensee of all the copyright, trade marks and other intellectual
                                    property rights in, to and in respect of the prize draws and the site, and you will not acquire
                                    any rights in any of these.</li>
                                <li>7.6 You must not: a). copy, disclose, transmit or otherwise make available or remove or change any
                                    material available on the site; b). reverse engineer or decompile (whether in whole or in part)
                                    any software used in connection with the site and/or the provision of the prize draws (except
                                    to the extent expressly permitted by applicable law); or c). remove, obscure or change any copyright,
                                    trade mark or other intellectual property right notices in any material obtained from the site
                                    or as a result of partaking in the prize draws.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading8">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false"
                                aria-controls="collapse8">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                8. Your information
                            </a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>8.1 The processing of your games-related information will be carried out by The County Jackpot in
                                        line with the Privacy Policy. You agree that when you contact the customer care team, you will
                                        supply any games-related information required by The County Jackpot.</li>
                                    <li>8.2 If you win a prize, you understand and accept that The County Jackpot may, if required by law,
                                        provide a third party with details of any prize claimed by you or on your behalf of, or paid
                                        to you.</li>
                                    <li>8.3 By passing information (including games-related information) to The County Jackpot, you agree
                                        and consent to The County Jackpot holding and processing it in line with this Section and
                                        the Privacy Policy. The County Jackpot is entitled to hold and process such information in relation
                                        to a prize claim but will only disclose it to anyone if required by law.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading9">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false"
                                aria-controls="collapse9">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                9. Limitation of Liability
                            </a>
                        </h4>
                    </div>
                    <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>9.1 The County Jackpot’s only obligation is to pay the prizes won in any prize draw to the rightful
                                        owners of winning entries. The County Jackpot will not be liable in any circumstances for any
                                        loss of whatever nature other than, subject to Section 8.2, the non-payment of a prize. In particular,
                                        but without limitation, The County Jackpot will not be liable for any loss of profits, indirect,
                                        special or consequential loss, suffered or incurred by you (or any holder or owner of a entry,
                                        any person who submits a clam for a prize during the applicable claim period, or any other person)
                                        that arises out of the withdrawal of any prize draw or from the participation or non-participation
                                        of you or any person in any prize draw. This includes the loss, for whatever reason, of the chance
                                        to participate in such prize draw.</li>
                                    <li>9.2 The county Jack will not be liable to any person for: a). Events beyond its reasonable control
                                        and expectations (for example war, strike, lockout, industrial action, fire, flood, drought,
                                        power cut and/or failure or obstruction of any network, broadcasting or telecommunications service);
                                        b). The failure or destruction of, or damage to, all or part of the computer systems or records
                                        of The County Jackpot or any third party (including, without limitation, the site and/or The
                                        County Jackpot’s computer system); c). Any mistakes caused by all or in part of the computer
                                        systems or records of The County Jackpot or any third party (including, without limitation, the
                                        site and/or The County Jackpot’s computer system); d). delays, losses, mistakes or omissions
                                        in or made by the postal or other delivery service or by the banking system; e). any other action
                                        or even which prevents or hinders the issue of a valid entry (including without limitation the
                                        failure of the site to display correctly on any device used to view it); f). the refusal to sell
                                        a potential entry to any person or to allow any person to partake in a prize draw; g). any losses
                                        caused by you, including the misuse or unauthorised use of passwords, money lost by partaking
                                        in the prize draws, and the failure to keep The County Jackpot informed of changes to your personal
                                        contact details; h). any losses caused by the failure or malfunction of your equipment or technology
                                        or your internet service provider or mobile phone network operator, or the equipment, technology,
                                        internet service provider or mobile phone network operator of any other person or third party.</li>
                                    <li style="text-align: left;">9.3 Nothing in these Terms excludes or limits (a) any person’s liability (i) for fraud; or (ii)
                                        for death or personal injury caused by breach of any duty that person may have to take reasonable
                                        care or exercise reasonable skill; or (b) any other liability which cannot lawfully be excluded
                                        or limited.</li>
                                    <li style="text-align: left;">9.4 You acknowledge and agree that in accepting these Terms you do not rely on, and shall have no
                                        remedy in respect of any statement, representation, warranty (in each case weather negligently
                                        or innocently made) or understanding of any person weather or not that person is a party to these
                                        Terms.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading10">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false"
                                aria-controls="collapse10">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                10. The County Jackpot’s Discretion is Binding
                            </a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                        <div class="panel-body">
                            <ul>
                                The reasonable exercise by The County Jackpot of any discretion provided for by these Terms will be final and binding.
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading11">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false"
                                aria-controls="collapse11">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                11. General
                            </a>
                        </h4>
                    </div>
                    <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                        <div class="panel-body">
                            {!! nl2br('<ul><li>11.1 Any person who partakes in a prize draw or claims a prize in whatever capacity, agrees to be bound by the provisions of any applicable legislation, these Terms, the relevant Game Rules and Game Procedures (and any relevant Game Specific Rules) (all as amended from time to time) and any other statements or explanations or rules or procedures The County Jackpot may issue from time to time in respect of that game.</li>
                                    <li>11.2 The County Jackpot may change these Terms (including the Privacy Policy) and any game rules, game procedures and game specific rules, and any other rules and procedures issued by The County Jackpot from time to time, for any and/or all of the games, at any time. The changes will be effective from the date of their publication on the site (or any earlier time The County Jackpot states), or on notification to you that the changes have taken place (whichever takes place sooner) and will apply to potential entries bought after the date on which the changes become effective, and/or potential entries bought before that date if reasonable in the circumstances. Notification will be by email or any other form of communication reasonably decided by The County Jackpot. You agree that you will be bound by the changes when you next partake in a prize draw, access your account or claim a prize after the changes have become effective, or (where relevant) when you expressly accept the changes, whichever takes place first.</li>
                                    <li>11.3 These Terms, the Privacy Policy (which is incorporated by reference into these Terms), the applicable Game Rules, Game Procedures, any Game Specific Rules and statements (where appropriate) set out the full extent of The County Jackpot’s obligations and liabilities to you when you partake in prize draws from your account and use the site and form the contract between The County Jackpot and you. If there is any conflict between these documents, they will apply in the following order (unless The County Jackpot states otherwise: (a) the applicable Game Specific Rules (taking first priority); (b) the applicable Game Procedures; (c) the applicable Game Rules; (d) these Terms (excluding, for this purpose, the Privacy Policy); (e) all statements and explanations appearing throughout the terms and conditions; (f) the Privacy Policy.</li>
                                    <li>11.4 If any provision (or part of a provision) in any of the documents mentioned in section 11.3 is decided by a court of competent jurisdiction to be void and/or unenforceable, that decision will only affect the particular provision (or part of the provision) and will not, in itself, make the other provisions void or unenforceable.</li>
                                    <li>11.5 You may not assign or otherwise transfer (in whole or in part) your rights and/or obligations uder these Terms. Any breach of this Section may result in the use of your account. The provision of the prize draws and/or access to the site being terminated immediately by The County Jackpot. The County Jackpot may assign or otherwise their rights and/or obligations under these Terms in whole or in party to any third party at its sole discretion.</li>
                                    <li>11.6 Except if The County Jackpot assigns or transfers its rights and/or obligations under these Terms, a person who is not a party to these Terms has no rights under the Contracts (Rights of Third Parties) act 1999 (as amended or re-enacted from time to time, and any subordinate legislation made under that Act) or otherwise to enforce any provision of these Terms.</li></ul>') !!}
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading12">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false"
                                aria-controls="collapse12">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                12. Law
                            </a>
                        </h4>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                        <div class="panel-body">
                            <ul>
                                The relevant law of these Terms is English law. Any legal proceedings will be heard in the English courts.
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- panel-group -->
        </div>
        <!-- container -->

        <br>
        <br>
        <br>

        <h3>Rules for Draw-Based Games Played Online</h3>
        <em>1st Edition effective as of 25th January 2018</em>
        <br>
        <br>
        The following rules apply when you partake in all prize draws online, including purchasing potential entries via card. Each prize draw has its own game procedures that apply, and some may also have their own specific game rules that apply from time to time.
        When attempting entry for a county-based prize draw, you must only enter the prize draws that match your county of permanent residence. For example, if you reside in Warwickshire, you must only enter Warwickshire based prize draws. Failure to do so will result in the forfeit of your entry and any winnings.
        A prerequisite memory game must be completed before entry into a prize draw can be attempted. This includes an element of human memory-based skill and requires you to memorise a pattern of images and then answer a question in relation to those images.
        <br>
        <br>
        <br>
        <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-1">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="false"
                            aria-controls="collapse-1">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            1. Purchasing Potential Entries
                        </a>
                    </h4>
                </div>
                <div id="collapse-1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-1">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>1.1 You can only purchase potential entries when you are logged into your account and have registered a debitcard.</li>
                                <li>1.2 Each potential entry must be purchased for its full price, unless in the event of free give away prize
                                    draws by The County Jackpot in a promotion or as prizes for The County Jackpot prize draws. Entries can
                                    only be bought by The County Jackpot through the site. You must not trust or purchase anything else (both
                                    physically and digitally) off any other person or site outside of www.thecountyjackpot.com and The County
                                    Jackpot can not be held responsible for any losses made by doing so.</li>
                                <li>1.3 After the prize draw timer ends the prize draw is closed and no more purchases of potential entries for
                                    that specific prize draw can be made.</li>
                                <li>1.4 Your potential entry will only be valid if it is recorded on The County Jackpots system.</li>
                                <li>1.5 You can only buy potential entries and receive prizes in line with these rules, the account terms, and
                                    the game procedures and any game specific rules that apply to a prize draw.</li>
                                <li>1.6 There is no general right for a person to by a potential entry. The County Jackpot can refuse to sell
                                    potential entries to anyone, and/or limit the number of potential entries you can purchase without giving
                                    a reason.</li>
                                <li>1.7 Subject to rule 1.9. the following people cannot purchase a potential entry (and The County Jackpot will
                                    not be liable to pay a prize to them): a). anyone under the age of 16, whether that person is buying
                                    it for themselves or anyone else; b). directors and employees of The County Jackpot; c). specified employees
                                    of any of The County Jackpot’s key contractors or sub-contractors d). personal partners and persons who
                                    are, to some extent, maintained by anyone mentioned in rules 1.7(b) or (c), in either case if living
                                    in the same household as that person; e). any person who has an account which has a status that prohibits
                                    them from buying a potential entry or receiving a prize (including without limitation a person whose
                                    account has been suspended or terminated); and f). anyone else The County Jackpot may decide and specify
                                    in any amendment which is made to these rules or in any other appropriately published communication from
                                    time to time. g). If a prize is paid to anyone listed in rule 1.7, that person will be required to repay
                                    the prize in full, immediately if The County Jackpot requests it.</li>
                                <li>1.9 The County Jackpot will only be able to buy potential entries for the purpose of testing accounts, purchases
                                    and potential prize draws/games and how they operate and The County Jackpot employees will not be entitled
                                    to benefit from any prize won by any such entries.</li>
                                <li>1.10 You must permanently reside in one of the 48 English counties in order to partake in a prize draw and
                                    must only partake in prize draws (and purchase potential entries) that operate in your county of residence
                                    unless specifically stated otherwise. Any attempt to partake in prize draws (including the purchase of
                                    potential entries) that operate in counties outside of that of your permanent residence will be void
                                    and your potential entry and any claim to any prizes will be forfeit and non-refundable.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-2">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false"
                            aria-controls="collapse-2">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            2. Prize Draw Requirements and Entry Purchases
                        </a>
                    </h4>
                </div>
                <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>2.1 All payments made in relation to all current and future prize draws provided by The County Jackpot are non-refundable.</li>
                                <li>2.2 You are responsible for reading these terms and conditions and making sure you are eligible for entry into the provided prize draws.</li>
                                <li>2.3 A prerequisite memory game must be completed before entry into a prize draw can be attempted. This includes an element of human memory-based skill and requires you to memorise a pattern of images and then answer a question in relation to those images. You must submit the answer you believe to be correct (via payment) for consideration into said prize draw and you will not be told whether or not your answer was correct.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-3">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false"
                            aria-controls="collapse-3">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            3. Play Limits
                        </a>
                    </h4>
                </div>
                <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                    <div class="panel-body">
                        <ul>
                            The maximum attempted entry limit is 5 per draw. You must not exceed this limit and any entry that you make over the 5-entry limit will be forfeit regardless of whether your submitted answer is correct and will not be included in that specific draw.
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-4">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false"
                            aria-controls="collapse-4">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            4. Your Responsibilities
                        </a>
                    </h4>
                </div>
                <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>4.1 You are responsible for keeping safe and confidential all information required to claim a prize for a particular entry (including, for example, the relevant winning code provided via email upon winning a prize draw and your identification information). If you are not able to provide sufficient identification information when claiming a prize, the prize will not be paid.</li>
                                <li>4.2 You are also responsible claiming (where applicable) and checking you receive the full amount of any prize you are entitled to.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-5">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-5" aria-expanded="false"
                            aria-controls="collapse-5">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            5. Claiming a Prize
                        </a>
                    </h4>
                </div>
                <div id="collapse-5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-5">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>5.1 You can only claim a prize if you are the holder of an account with a winning entry.</li>
                                <li>5.2 Upon winning a prize draw:

                           a). you will be notified via email (from draw@thecountyjackpot.com) upon winning a prize draw. You are responsible for keeping your account information accurate and up to date as The County Jackpot will only ever contact you through the email address provided by you through your County Jackpot online account. Please make sure to check your junk email as the winner email may be diverted into this area of your emails.

                           b). Please note that The County Jackpot will only ever contact you online about your win via the email address stated throughout Section 5 and you should not trust or provide any sensitive information to any other email address no matter what the email claims.

                           c). you have 200 days to claim your prize after the winner email (of that relevant prize draw) is sent to your email address. If after the end of the 200th day you have not claimed your prize, your entitlement to said prize will be lost and the prize will not be paid. The County Jackpot may attempt to make contact via telephone to the phone number provided by you on your account to notify you of your win and inform you of the winner email you have received. Please note that The County Jackpot will never ask for any sensitive information from you during this phone conversation, nor are The County Jackpot employees at liberty to discuss any information in regard to your win apart from notifying you of the winner email.</li>
                                <li>5.3 You are responsible for making sure you keep all sensitive information (including the unique winner code) about you private, secure and confidential and do not reveal this information to anybody else outside of The County Jackpot winner team. The County Jackpot can not be help responsible for any loss or harm inflicted as the result of breach of confidentiality. This includes the event of others gaining access to your emails and claiming to be you or gaining access to your account using sensitive information you have purposely or inadvertently supplied them with.</li>
                                <li>5.4 You are responsible for keeping all information on your County Jackpot account accurate and up to date and any prize that is paid into the wrong account due to you not keeping your County Jackpot account information accurate and up to date or by providing false information will not be refunded to you and your claim to said prize will be lost.</li>
                                <li>5.5 You can only claim for the highest prize tier your entry has won in. You cannot claim a prize for a lower prize tier, or any otherwise unclaimed prize in that particular prize draw or prize pool.</li>
                                <li>5.6 In the event of winning a physical prize the same winner email process will occur and the prize will be delivered by third party courier to the residential address stated on your account. You are responsible for keeping this information up to date and accurate and any loss of prize or delivery made to a wrong address will be non-refundable to you and your claim to said prize will be void. The County Jackpot may also take legal action against you to reimburse any costs or losses to The County Jackpot as a result of this.</li>
                                <li>5.7 The County Jackpot reserves the right to:

                           a). pay prizes by cheque, bank transfer or direct credit. If payment is made by cheque this will be posted (at your risk) to the address registered to your account (or any other address agreed between The County Jackpot and you);

                           b). ask you to claim your prize in person;

                           c). withhold a prize, providing it is acting reasonably, until it is entirely satisfied that an entry is valid and the claim has been made in good faith;

                           d). withhold a prize (or recover or seek to recover a prize already paid) until it has carried out all appropriate checks and enquiries if in its discretion it believes that you (as the person claiming a prize) are not lawfully entitled to payment of a prize or that a prize has been paid to you in circumstances where The County Jackpot decides that the entry is invalid or defective, or where there is any other reason for The County Jackpot to question entitlement to the prize. Any checks and enquiries will be carried out promptly by The County Jackpot. You shall repay immediately on demand any prize The County Jackpot seeks to recover;

                           e). recover a prize incorrectly paid into your account;

                           f). request proof of entitlement to a prize (including, without limitation, identification information, proof of identity and capacity to claim);

                           g). refuse to pay a prize if you are unable to or fail to produce sufficient identification information when claiming a prize;

                           h). photograph anyone claiming a prize for The County Jackpots records;

                           i). request a court to decide who a prize should be paid to and/or make payment into court.</li>
                                <li>5.8 The right to a prize is not transferable.</li>
                                <li>5.9 The County Jackpot will not be responsible or liable to any person claiming a prize which has been paid to a person who assumed the identity of the relevant account holder.</li>
                                <li>5.10 No interest will be payable on any prize, including without limitation whilst any checks or enquiries are carried out in relation to a winning entry, whilst a dispute about the entry or prize claim is being resolved, or for the period a prize remains unclaimed.

                            <h4>Payment of Prizes to persons with a disability</h4>
                           5.10 If you are a person with a legal, physical or other disability and are claiming a Prize, The County Jackpot may pay the Prize to Your authorised representative.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-6">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-expanded="false"
                            aria-controls="collapse-6">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            6. Prize Draws and Selected Winners
                        </a>
                    </h4>
                </div>
                <div id="collapse-6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-6">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>6.1 The County Jackpot will decide the time, frequency, date and method of the draws for each prize draw.</li>
                                <li>6.2 Each draw will select a winner at random from the successful entrants who were able to correctly answer the prerequisite memory game question.</li>
                                <li>6.3 If a draw is interrupted because of equipment failure or for any other reason, the draw will be completed in line with the applicable draw procedures for that game. If a draw can’t take place on the date or at the time fixed, it will take place as soon as reasonably possible after that date.</li>
                                <li>6.4 If any draw is declared invalid, another draw will take place in line with the applicable draw procedures to determine a winner.</li>
                                <li>6.5 The County Jackpot will only pay a prize based on the official results of the relevant draw recorded electronically in The County Jackpot’s computer system. The County Jackpot will not pay a prize based on results recorded elsewhere, including for example in newspapers, winning telephone lines, or on the site.</li>
                                <li>6.6 The County Jackpot will not be required to make any payment against any incorrectly announced winners.</li>
                                <li>6.7 Where The County Jackpot considers it reasonable to do so, it may postpone a draw for as long as it considers to be appropriate in the circumstances. In that case (by way of example only, where there has been a significant disruption of the sale of potential entries for that draw) The County Jackpot may continue to sell potential entries for that draw beyond that draw’s normal draw break.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-7">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-7" aria-expanded="false"
                            aria-controls="collapse-7">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            7. Information About Winners
                        </a>
                    </h4>
                </div>
                <div id="collapse-7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-7">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>7.1 Except as required by law, The County Jackpot will not disclose the identity of any prize winter with out that winner’s prior consent.</li>
                                <li>7.2 If you win a prize, you understand and accept that The County Jackpot may, if required by law, provide a third party with details of any prize claimed by you or on your behalf, or paid to you.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-8">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-8" aria-expanded="false"
                            aria-controls="collapse-8">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            8. Game Closures etc.
                        </a>
                    </h4>
                </div>
                <div id="collapse-8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-8">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>8.1 The County Jackpot can announce the closing date for an individual prize draw at any time. No entries for that prize draw will be sold after the closing date.</li>
                                <li>8.2 The County Jackpot can also (at its absolute discretion) suspend or withdraw any prize draw.</li></ul>') !!}
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-9">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-9" aria-expanded="false"
                            aria-controls="collapse-9">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            9. Limitation of Liability
                        </a>
                    </h4>
                </div>
                <div id="collapse-9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-9">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>9.1 No refunds will be given in any circumstances.</li>
                                            <li>9.2 If The County Jackpot is fully satisfied after proper and careful inquiries that a cancellation of an entry was wholly and directly the result of The Count Jackpot’s fraud, negligence or error, and that entry would, but for that cancellation, have been a winning entry, then The County Jackpot will not refund the cost of the entry and The County Jackpot’s only liability will be to pay an amount equal to the prize you would have been entitled to if the cancellation did not take place.</li>
                                            <li>9.3 The County Jackpot’s only obligation is to pay the prizes won in any prize draw to the rightful owners of winning entries. The County Jackpot will not be liable in any circumstances for any loss of whatever nature other than the non-payment of a prize you are entitled to under these rules. In particular, but without limitation, The County Jackpot will not be liable for any loss of profits, special, indirect or consequential loss, suffered or incurred by you (or any holder or owner of any entry, any person claiming a prize during the claim period or any other person) that arises out of the withdrawal of any game or from the participation or non-participation of you our any person in any prize draw. This includes the loss, for whatever reason, of the chance to participate in that game.</li>
                                            <li>9.4 The County Jackpot will not be liable to any person for:

                                    a). Events beyond its reasonable control and expectations (for example war, strike, lockout, industrial action, fire, flood. Drought, power cut and/or failure or obstruction of any network, broadcasting or telecommunications service);

                                    b). the failure or destruction of, or damage to, all or part of the computer systems or records of The County Jackpot or any third party (including, without limitation, the site and/or The County Jackpot’s computer system);

                                    c). any mistakes caused by all or part of the computer systems or records of The County Jackpot or any third party (including, without limitation, the site and/or The County Jackpot’s computer system);

                                    d). delays, losses, mistakes or omissions in or made by the postal or other delivery service or by the banking system;

                                    e). any other action or event which prevents or hinders the issue of a valid entry ()including without limitation the failure of the site to display correctly on any device used to view it);

                                    f). the refusal to sell a potential entry to any person or to allow any person to partake in a prize draw online.

                                    g). Any losses caused by you, including the misuse or unauthorized use of passwords, money lost by partaking in the prize draws online and the failure to keep The County Jackpot informed of any changes to your account details;

                                    h). Any losses caused by the failure or malfunction of your equipment or technology, or your internet service provider or mobile phone network operator, or the equipment, technology, internet service provider or mobile phone network operator of any other person or third party.</li>
                                            <li>9.5 Nothing in these rules excludes or limits a) any person’s liability (i) for fraud; or (ii) for death or personal injury caused by breach of any duty that person may have to take reasonable care or exercise reasonable skill; or (b) any other liability which cannot lawfully be excluded or limited.</li>
                                            <li>9.6 You acknowledge and agree that you do not rely on, and shall have not remedy in respect of, any statement, representation or warranty (weather negligently or innocently made) or understanding of any person whether or not such person is a party to these Rules.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-10">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-10" aria-expanded="false"
                            aria-controls="collapse-10">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            10. Disputes and The County Jackpot’s Decisions
                        </a>
                    </h4>
                </div>
                <div id="collapse-10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-10">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>10.1 The County Jackpot’s decision about whether or not an Entry is a Winning Entry, or in relation to any other matter or dispute arising from the payment or non-payment of Prizes, will be final and binding provided that it is a reasonable decision.</li>
                            <li>10.2 The County Jackpot may withhold payment of a Prize and/or make an equivalent payment into court until any dispute has been resolved.</li></ul>') !!}
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-11">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-11" aria-expanded="false"
                            aria-controls="collapse-11">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            11. General
                        </a>
                    </h4>
                </div>
                <div id="collapse-11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-11">
                    <div class="panel-body">
                        {!! nl2br('<ul><li>11.1 Any person who buys a potential Entry or submits an Entry for validation or who claims a Prize in whatever capacity, agrees to be bound by the provisions of any applicable legislation, these Rules, the Privacy Policy, the Account Terms, the Game Procedures, any Game Specific Rules that apply (all as amended from time to time) and any other rules or procedures, statements or explanations The County Jackpot may issue in respect of that Game Played Online.</li>
                            <li>11.2 The County Jackpot may change these Rules, the relevant Game Procedures and any Game Specific Rules applicable to the Games Played Online, and the Account Terms and User Account Terms (including the Privacy Policy) at any time. These changes will be effective immediately from the date of their publication on the Site (or any earlier time The County Jackpot states), or on notification to You that the changes have taken place (whichever takes place sooner) and will apply to Entries bought after the date on which the changes become effective, and/or Entries bought before that date if reasonable in the circumstances. Notification will be by email, Account notification, post or any other form of communication reasonably decided by The County Jackpot. You agree that You will be bound by the changes when You next play a Game Played Online, access Your Account or claim a Prize after the changes have become effective, or (where relevant) when You expressly accept the changes, whichever takes place first.</li>
                            <li>11.3 These Rules, the Account Terms, the Privacy Policy, the applicable Game Procedures and any applicable Game Specific Rules set out the full extent of The County Jackpot’s obligations and liabilities to You in relation to Games Played Online and form the contract between The County Jackpot and You for each Game Played Online. If there is any conflict between these documents, they will apply in the following order (unless The County Jackpot states otherwise: (a) the applicable Game Specific Rules (taking first priority); (b) the applicable Game Procedures; (c) these Rules; (d) the Account Terms (excluding, for this purpose, the Privacy Policy); (e) the Privacy Policy.</li>
                            <li>11.4 If any provision (or part of a provision) in any of the documents mentioned in Rule 11.3 is decided by a court of competent jurisdiction to be void and/or unenforceable, that decision will only affect the particular provision (or part of the provision) and will not, in itself, make the other provisions void or unenforceable.</li>
                            <li>11.5 You may not assign or otherwise transfer (in whole or in part) Your rights and/or obligations under these Rules. Any breach of this Rule may result in the use of Your Account, Your ability to buy potential Entries for The County Jackpot online prize draws, the provision of the Games Played Online and/or access to the Site being terminated immediately by The County Jackpot. The County Jackpot may assign or otherwise transfer its rights and/or obligations under these Rules in whole or in part to any third party at its sole discretion.</li>
                            <li>11.6 Except if The County Jackpot assigns or transfers its rights and/or obligations under these Rules, a person who is not a party to these Rules has no rights under the Contracts (Rights of Third Parties) Act 1999 (as amended or re-enacted from time to time, and any subordinate legislation made under that Act) or otherwise to enforce any provision of these Rules.
                            <li>11.7 You agree that when You contact the Customer Care Team, You will supply any Games-Related Information required by The County Jackpot.</li></ul>') !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-12">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-12" aria-expanded="false"
                            aria-controls="collapse-12">
                            <i class="more-less glyphicon glyphicon-plus"></i>
                            12. Law
                        </a>
                    </h4>
                </div>
                <div id="collapse-12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-12">
                    <div class="panel-body">
                        <ul>
                            The relevant law for these rules is English law. Any legal proceedings will be heard in the English courts.
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <br>
        <br>
        {!! nl2br('<strong>Contact Information</strong>

        <strong> Email Addresses:</strong>
        customercare@thecountyjackpot.com
        enquiries@thecountyjackpot.com

        <strong>Website:</strong>
        www.thecountyjackpot.com
       
        <strong>The County Jackpot Headquarters Address:</strong>
        The County Jackpot Ltd.
        71-75 Shelton Street
        Covent Garden
        London
        WC2H 9JQ


        © The County Jackpot 2018') !!}

    </section>


@endsection
