<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        // Get expenses for the logged-in user
        $expenses = Expense::where('user_id', Auth::id())->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        // Store new expense
        $expense = new Expense();
        $expense->user_id = Auth::id();
        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->expense_date = $request->expense_date;
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully');
    }

    public function edit(Expense $expense)
    {
        // Only allow user to edit their own expense
        if ($expense->user_id != Auth::id()) {
            return redirect()->route('expenses.index')->with('error', 'Unauthorized access');
        }

        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        if ($expense->user_id != Auth::id()) {
            return redirect()->route('expenses.index')->with('error', 'Unauthorized access');
        }

        $expense->category = $request->category;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->expense_date = $request->expense_date;
        $expense->save();

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');
    }

    public function destroy(Expense $expense)
    {
        if ($expense->user_id != Auth::id()) {
            return redirect()->route('expenses.index')->with('error', 'Unauthorized access');
        }

        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }
}
