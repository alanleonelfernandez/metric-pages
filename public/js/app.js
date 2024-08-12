$(document).ready(function() {;
    $('#save-metrics').hide();
    $('.loading-message').hide();

    $('#metrics-form').on('submit', function(event) {
        event.preventDefault();

        $('.loading-message').show();

        $.ajax({
            url: metricsFetchUrl,
            method: 'POST',
            data: {
                url: $('#url').val(),
                categories: $('input[name="categories[]"]:checked').map(function() { return this.value; }).get(),
                strategy: $('#strategy').val(),
                _token: $('input[name="_token"]').val()
            },
            success: function(response) {
                if (response.metrics) {
                    let metrics = response.metrics;
                    let resultsHtml = '';
                    for (let category in metrics) {
                        if (metrics.hasOwnProperty(category)) {
                            let score = metrics[category] !== null ? metrics[category] : 'N/A';
                            resultsHtml += `<p>${category}: ${score}</p>`;
                        }
                    }
                    $('#metrics-result').html(resultsHtml);
                    $('#save-metrics').show();
                } else {
                    $('#metrics-result').html('<p>No metrics found.</p>');
                }
                $('.loading-message').hide();
            },
            error: function(xhr, status, error) {
                $('#metrics-result').html('<p>Error fetching metrics.</p>');
                $('.loading-message').hide();
            }
        });
    });

    $('#save-metrics').on('click', function() {
        var metricsData = {
            url: $('#url').val(),
            accessibility_metric: $('p:contains("ACCESSIBILITY:")').text().split(': ')[1] || null,
            performance_metric: $('p:contains("PERFORMANCE:")').text().split(': ')[1] || null,
            best_practices_metric: $('p:contains("BEST PRACTICES:")').text().split(': ')[1] || null,
            strategy_id: $('input[name="strategy_id"]').val(),
            _token: $('input[name="_token"]').val()
        };
    
        $.ajax({
            url: metricsSaveUrl,
            method: 'POST',
            data: metricsData,
            success: function(response) {
                if (response.success) {
                    alert('Metrics saved successfully.');
                } else {
                    alert('Error saving metrics.');
                }
            },
            error: function() {
                alert('Error saving metrics.');
            }
        });
    });
});
