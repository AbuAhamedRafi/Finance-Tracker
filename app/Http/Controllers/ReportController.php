<?php

namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Fetch current user's expenses and budget
        $expenses = Expense::where('user_id', Auth::id())->get();
        $budget = Budget::where('user_id', Auth::id())->first();

        // Prepare data for the charts
        $expenseData = $expenses->pluck('amount');
        $expenseLabels = $expenses->pluck('created_at')->map(function ($date) {
            return $date->format('M d, Y');
        });

        $budgetAmount = $budget ? $budget->amount : 0;

        return view('reports.index', compact('expenseData', 'expenseLabels', 'budgetAmount'));
    }
}
