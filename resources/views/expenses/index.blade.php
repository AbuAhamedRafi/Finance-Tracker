@extends('layouts.app')

@section('content')
<h2>Your Expenses</h2>

<a href="{{ route('expenses.create') }}" class="btn btn-primary">Add Expense</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Category</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($expenses as $expense)
        <tr>
            <td>{{ $expense->category }}</td>
            <td>{{ $expense->amount }}</td>
            <td>{{ $expense->description }}</td>
            <td>{{ $expense->expense_date }}</td>
            <td>
                <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
