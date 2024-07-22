<?php

namespace App\Masivian\Email;

use GuzzleHttp\Client;

class EmailApi
{
    /**
     * @param $subject <string>
     * @param $recipients <Array>
     * @param $view <String>
     * @param $dataEmail, <Array> Array whit keys
     * @param $verify Boolean True or False
     * 
     */
    public static function sendEmail($subject, $recipients, $view, $dataEmail = null, $verify = false)
    {
        $html = view($view, $dataEmail)->render();
        $recipientsData = [];
        $devEmail = [['To' => config('app.email_dev')]];


        foreach ($recipients as $key => $value) {
            array_push($recipientsData, ['To' => trim($value)]);
        }

        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'x-api-key' =>  config('app.masivian_api_key')
            ]
        ]);

        $data = [
            'json' => [
                "Subject" => $subject,
                "From" => "ManpowerGroup Colombia <sistemassp@manpower.com.co>",
                "Template" => [
                    "Type" => "text/html",
                    "Value" => $html
                ],
                "Recipients" => (config('app.env') == 'production') ? $recipientsData : $devEmail
            ],
            'verify' => $verify,
        ];

        return $client->post(config('app.masivian_endpoint'), $data);
    }
}
