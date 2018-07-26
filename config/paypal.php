<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID',''),
    'secret' => env('PAYPAL_SECRET',''),
    'curreny' => 'GBP',
    // 'webprofile' => 'XP-STQN-WFPS-XVGL-RCNE', //local
    // 'webprofile' => 'XP-HQ5B-X2YN-LKU9-MTKD', // Prod
    'webprofile' => 'XP-DHH2-5SFQ-4QKS-CLEU', // Prod live
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];