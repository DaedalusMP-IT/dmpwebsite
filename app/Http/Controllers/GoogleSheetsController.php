<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Sheets;
use Illuminate\Http\Request;
use Log;

class GoogleSheetsController extends Controller
{
    private $spreadsheetId = '11Q1gVe03NUKZqGRq2mIeQSBSBdlRM8ID894R5A7sdaA';

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function appendRow(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'service' => 'required|string|max:255',
        ], [
            'name.required' => 'Пожалуйста, введите имя',
            'number.required' => 'Пожалуйста, введите телефон',
            'service.required' => 'Пожалуйста, введите услугу',
        ]);

        try {
            $client = $this->getClient();
            $service = new Google_Service_Sheets($client);

            // Prepare values for Google Sheets
            $values = [
                [
                    $validated['name'],
                    $validated['number'],
                    $validated['service'],
                    now()->format('Y-m-d H:i:s') // Add timestamp
                ]
            ];

            $body = new \Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $range = 'Лист1'; // Sheet name

            $result = $service->spreadsheets_values->append(
                $this->spreadsheetId,
                $range,
                $body,
                $params
            );

            return response()->json([
                'success' => true,
                'message' => 'Заявка успешно отправлена!',
                'updatedRange' => $result->getUpdates()->getUpdatedRange()
            ]);
        } catch (\Exception $e) {
            \Log::error('Google Sheets error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Ошибка при отправке заявки: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getClient() {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API Laravel');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig(storage_path('app/credentials.json'));
        $client->setAccessType('offline');

        // Remove SSL bypass for security - only use if absolutely necessary for local dev
        // $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        // $client->setHttpClient($guzzleClient);

        return $client;
    }
}
