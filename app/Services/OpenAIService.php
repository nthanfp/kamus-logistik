<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OpenAIService
{
    private $authorization;
    private $endpoint;
    private $httpClient;

    public function __construct()
    {
        $this->authorization = env('OPEN_AI_KEY');
        $this->endpoint = 'https://api.openai.com/v1/chat/completions';

        $this->httpClient = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->authorization,
            ],
        ]);
    }

    public function sendMessage($message)
    {
        try {
            $data = [
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $message,
                    ],
                ],
                'model' => 'gpt-3.5-turbo-1106',
                'response_format' => ['type' => 'json_object']
            ];

            $response = $this->httpClient->post($this->endpoint, [
                'json' => $data,
            ]);

            if ($response->getStatusCode() === 200) {
                $arrResult = json_decode($response->getBody(), true);
                $resultMessage = $arrResult["choices"][0]["message"]["content"];
                return $resultMessage;
            } else {
                throw new \Exception('Error: Unexpected HTTP status code - ' . $response->getStatusCode());
            }
        } catch (RequestException $e) {
            $message = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage();
            $message = json_decode($message, true);
            throw new \Exception('Error sending the message : ' . $message['error']['message']);
        }
    }

    public function generateDictionaryPrompt($number_of_dictionary)
    {
        // Construct the prompt
        $prompt = "Hasilkan {$number_of_dictionary} item dictionary " . PHP_EOL .
            "Kata/Dictionary harus berkaitan dengan logistik " . PHP_EOL .
            "Perhatian: Mohon jawab dengan format JSON berikut:" . PHP_EOL .
            '{
                "dictionary": [
                    {
                        "indonesian": "", // Masukkan kata dalam Bahasa Indonesia di sini
                        "indonesian_slug": "", // Masukkan slug unik untuk kata dalam Bahasa Indonesia di sini (contoh: kata-dalam-bahasa-indonesia)
                        "indonesian_definition": "", // Masukkan definisi untuk kata dalam Bahasa Indonesia di sini
                        "english": "", // Masukkan kata dalam Bahasa Inggris di sini
                        "english_slug": "", // Masukkan slug unik untuk kata dalam Bahasa Inggris di sini (contoh: word-in-english)
                        "english_definition": "" // Masukkan definisi untuk kata dalam Bahasa Inggris di sini
                    },
                    // Jika Anda perlu menambahkan lebih banyak kata, tambahkan entri tambahan di sini seperti contoh di atas
                ]
            }' . PHP_EOL .
            "Pastikan untuk mengisi setiap properti dengan informasi yang relevan. Mohon perhatikan bahwa 'indonesian_slug' dan 'english_slug' harus unik dan menggambarkan kata yang sesuai." . PHP_EOL .
            "Untuk 'indonesian_slug' dan 'english_slug', pastikan menggunakan huruf kecil dan pisahkan spasi dengan tanda '-' (dash). Contoh: kata-dalam-bahasa-indonesia" . PHP_EOL . "
            ";

        // Return the generated prompt
        return $prompt;
    }
}
