@extends('app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Broobe Challenge</h1>
        <form id="metrics-form" action="{{ route('metrics.fetch') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="url" class="label-form">URL:</label>
                <input type="text" id="url" name="url" class="form-control" placeholder="https://example.com" required>
            </div>
            <input type="hidden" name="strategy_id" value="1">
            <div class="form-group">
                <label class="label-form">Categories:</label><br>
                @foreach(['ACCESSIBILITY', 'BEST_PRACTICES', 'PERFORMANCE'] as $category)
                    <div class="form-check">
                        <input type="checkbox" id="{{ strtolower($category) }}" name="categories[]" value="{{ $category }}" class="form-check-input">
                        <label for="{{ strtolower($category) }}" class="form-check-label">{{ ucfirst(strtolower($category)) }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="strategy" class="label-form">Strategy:</label>
                <select id="strategy" name="strategy" class="form-control" required>
                    <option value="">Select Strategy</option>
                    @foreach($strategies as $strategy)
                        <option value="{{ $strategy->name }}">{{ ucfirst(strtolower($strategy->name)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Fetch Metrics</button>
            </div>
        </form>

        <div id="metrics-result" class="mt-4">
            <div class="loading-message mt-4">Loading...</div>
        </div>
        <div class="mt-4">
            <button id="save-metrics" type="button" class="btn btn-success">Save Metric Run</button>
        </div>
        <br>
        <div class="mt-4">
            <a href="/historyMetrics" type="button" class="btn btn-success">History Metrics</a>
        </div>
    </div>
@endsection
