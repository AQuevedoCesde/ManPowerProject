<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    /**
     * Get the data from the OpenAIService
     * @var array list
     */
    public function getCompletions($data)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . config('app.openai_api_key'),
        ])->withoutVerifying()
            ->post(config('app.openai_api_baseurl') . "/chat/completions", $data)
            ->json();
    }
}
