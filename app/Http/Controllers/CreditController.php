<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditCalculateRequest;
use App\Http\Requests\CreditSaveRequest;
use App\Services\CreditService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreditController extends Controller
{
    private $creditService;
    public function __construct (CreditService $creditService) {
        $this->creditService = $creditService;
    }
    public function calculate(CreditCalculateRequest $request): JsonResponse
    {
        return response()->json($this->creditService->calculateCredit($request->validated()));
    }

    public function save(CreditSaveRequest $request): JsonResponse
    {
        return response()->json($this->creditService->saveCreditRequest($request->validated()));
    }
}
