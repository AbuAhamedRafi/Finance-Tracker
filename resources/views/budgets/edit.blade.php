@extends('layouts.app')

@section('content')
<h2>Edit Budget</h2>

<form action="{{ route('budgets.update', $budget) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="amount" class="form-label">Budget Amount</label>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $budget->amount }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Budget</button>
</form>
@endsection
