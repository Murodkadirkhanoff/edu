<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Services\Billing\PaymeService;
use Illuminate\Http\Request;


class PaymeController extends Controller
{
    public function handle(Request $request, PaymeService $paymeService)
    {
        $method = $request->get('method');
        $params = $request->input('params', []);

        try {
            return response()->json(
                $paymeService->handle($method, $params)
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ]
            ]);
        }
    }

}
