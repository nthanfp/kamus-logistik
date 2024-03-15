<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class GenerateAIController extends Controller
{
    private $openAI;

    public function __construct(OpenAIService $openAI)
    {
        $this->openAI = $openAI;
    }

    public function generate(Request $request)
    {
        try {
            // Get the generated prompt
            $prompt = $this->openAI->generateDictionaryPrompt(10);

            // Send the prompt to OpenAI
            $resMessage = $this->openAI->sendMessage($prompt);

            // Parsing response
            $parsedResponse = json_decode($resMessage, true);

            // Check if the response contains 'dictionary' data
            if (!isset($parsedResponse['dictionary']) || !is_array($parsedResponse['dictionary'])) {
                throw new \Exception('Invalid response from OpenAI: Missing dictionary data');
            }

            // Iterate over each dictionary entry in the response and save it
            $insertedIds = [];
            foreach ($parsedResponse['dictionary'] as $entry) {
                $insertData = Dictionary::create([
                    'indonesian' => $entry['indonesian'],
                    'indonesian_slug' => $entry['indonesian_slug'],
                    'indonesian_definition' => $entry['indonesian_definition'],
                    'english' => $entry['english'],
                    'english_slug' => $entry['english_slug'],
                    'english_definition' => $entry['english_definition'],
                ]);
                $insertedIds[] = $insertData->id;
            }

            // return success response with inserted ids
            return response()->json([
                'status' => 'success',
                'message' => 'Kamus berhasil dihasilkan',
                'inserted_ids' => $insertedIds,
            ], 200);
        } catch (\Exception $e) {
            // return error response
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
