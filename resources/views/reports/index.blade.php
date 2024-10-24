@extends('layouts.app')

@section('content')
<h2>Expense Report</h2>

<canvas id="expenseChart" width="400" height="200"></canvas>

<h2 class="mt-5">Budget Overview</h2>

<p><strong>Current Budget:</strong> ${{ $budgetAmount }}</p>

<script>
    var ctx = document.getElementById('expenseChart').getContext('2d');
    var expenseChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($expenseLabels),
            datasets: [{
                label: 'Expenses',
                data: @json($expenseData),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
