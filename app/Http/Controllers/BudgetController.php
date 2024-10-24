<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $budget = Budget::where('user_id', Auth::id())->first();
        return view('budgets.index', compact('budget'));
    }

    public function edit(Budget $budget)
    {
        if ($budget->user_id != Auth::id()) {
            return redirect()->route('budgets.index')->with('error', 'Unauthorized access');
        }

        return view('budgets.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        if ($budget->user_id != Auth::id()) {
            return redirect()->route('budgets.index')->with('error', 'Unauthorized access');
        }

        $budget->amount = $request->amount;
        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully');
    }
}
