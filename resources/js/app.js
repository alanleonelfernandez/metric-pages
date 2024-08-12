$(document).ready(function() {
    $('#metrics-form').on('submit', function(event) {
        console.log("hola estoy en resources");
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: '/fetch-metrics',
            method: 'POST',
            data: formData,
            success: function(response) {
                var resultHtml = '<h3>Metrics</h3>';
                $.each(response, function(key, value) {
                    if (key.startsWith('categoryScores')) {
                        $.each(value, function(category, score) {
                            resultHtml += `<p>${category}: ${score}</p>`;
                        });
                    }
                });
                $('#metrics-result').html(resultHtml);
            },
            error: function() {
                $('#metrics-result').html('<p>Error fetching metrics.</p>');
            }
        });
    });
    $('#save-metrics').on('click', function() {
        var formData = $('#metrics-form').serialize();
        
        $.ajax({
            url: '/save-metrics',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Metrics saved successfully.');
            },
            error: function() {
                alert('Error saving metrics.');
            }
        });
    });
});