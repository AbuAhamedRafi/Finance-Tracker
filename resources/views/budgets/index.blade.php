@extends('layouts.app')

@section('content')
<h2>Your Budget</h2>

@if($budget)
    <p><strong>Current Budget:</strong> ${{ $budget->amount }}</p>
    <a href="{{ route('budgets.edit', $budget) }}" class="btn btn-warning">Edit Budget</a>
@else
    <p>No budget set. Please create one.</p>
    <a href="{{ route('budgets.create') }}" class="btn btn-primary">Set Budget</a>
@endif
@endsection
