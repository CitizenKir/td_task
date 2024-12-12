<?php

namespace App\Services;

use App\Models\Credit\CreditProgram;
use App\Models\Credit\CreditRequest;
use Illuminate\Support\Facades\DB;

class CreditService
{
    private function getCreditProgram(int $price, float $initialPayment, int $loanTerm): CreditProgram
    {
        if ($price >= 1000000 && $initialPayment >= 200000 && $loanTerm <= 60) {
            return CreditProgram::where('id', 1)->first();
        } elseif ($price >= 500000 && $initialPayment >= 400000 && $loanTerm <= 40) {
            return CreditProgram::where('id', 2)->first();
        }
        elseif ($price >= 250000 && $initialPayment >= 600000 && $loanTerm <= 20) {
            return CreditProgram::where('id', 3)->first();
        } else {
            return CreditProgram::where('id', 4)->first();
        }
    }

    private function calculateMonthlyPayment($price, $initialPayment, $loanTerm, $percent)
    {
        $creditSum = $price - $initialPayment;
        $monthlyPercent = $percent / 12 / 100;

        return ($creditSum * $monthlyPercent * pow(1 + $monthlyPercent, $loanTerm)) / (pow(1 + $monthlyPercent, $loanTerm) - 1);
    }

    public function calculateCredit(array $creditInitialData): array
    {
        $price = $creditInitialData['price'];
        $initialPayment = $creditInitialData['initialPayment'];
        $loanTerm = $creditInitialData['loanTerm'];

        $creditProgram = $this->getCreditProgram($price, $initialPayment, $loanTerm);
        $monthlyPayment = $this->calculateMonthlyPayment($price, $initialPayment, $loanTerm, $creditProgram->percent);

        return [
            "programId" => $creditProgram->id,
            "interestRate" => $creditProgram->percent,
            "monthlyPayment" => $monthlyPayment,
            "title" => $creditProgram->name
        ];
    }

    /**
     * @throws \Exception
     */
    public function saveCreditRequest($creditData): array
    {
        $carId = $creditData['carId'];
        $programId = $creditData['programId'];
        $initialPayment = $creditData['initialPayment'];
        $loanTerm = $creditData['loanTerm'];

        DB::beginTransaction();
       try {
           $creditRequest = new CreditRequest();
           $creditRequest->car_id = $carId;
           $creditRequest->credit_program_id = $programId;
           $creditRequest->initial_payment = $initialPayment;
           $creditRequest->loan_term = $loanTerm;

           $result = $creditRequest->save();
           DB::commit();

           return ["success" => $result];
       } catch (\Exception $e) {
           DB::rollBack();
           throw $e;
       }
    }
}
