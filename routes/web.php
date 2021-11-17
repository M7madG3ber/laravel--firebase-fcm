<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    /**
     * Key & Token
     */
    $SERVER_API_KEY = 'AAAAGFf3GoE:APA91bES2pz-IVK7T5vxcxgV8T2toLJy7HubQUrXlYFe-kqhaSsmad-SY1p3drqbi8YJua9EnCkReTNp6Sk9R78nAFARe5shoV_00jIF5QzxlV3KM4DqXYD4VtTHgvWs8NdVjawH-dSx';
    $tokens = [
        'fOGR6w4YSv2cUasH4oRzpO:APA91bGN6tb-H4m4HR3gQukU9v0_lwVrbpjvS2SZl_2CcizE-DBLh0W1LcJhaxLSjZURWn_mF2EUwPPjoPN92bqxdDxBhMBomu_wyMBwghMzTs67ivnQt1FPQh22qidKT4Ph_LAstlhd'
    ];

    /**
     * Data
     */
    $data = [
        'registration_ids' => $tokens,
        'notification' => [
            'title' => 'test',
            'bodr=' => 'test test',
            'sound' => 'default'
        ]
    ];
    $data = json_encode($data);

    /**
     * Headers
     */
    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json'
    ];

    /**
     * Request
     */
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $response = curl_exec($ch);

    dd($response);
});