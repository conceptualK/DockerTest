$(document).ready(function() {
    $('#fetchDataButton').click(function() {
        // Get the value from the input field
        const palletId = $('#palletIdInput').val();

        $.ajax({
            url: 'http://10.19.5.106:5001/api/fLocation',
            headers: {'Content-Type': 'application/json'},
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify({ "palletId": palletId }),
            success: function(data) {
                console.log(data);
                $('#result').html(JSON.stringify(data, null, 2));

                const map = $('#map');
                map.empty(); // Clear existing markers

                if (data.X && data.Y) {
                    const xPercent = parseFloat(data.X);
                    const yPercent = parseFloat(data.Y);

                    if (!isNaN(xPercent) && !isNaN(yPercent)) {
                        const marker = $('<div></div>')
                            .addClass('box')
                            .css({
                                left: `${xPercent}%`,
                                top: `${yPercent}%`,
                                transform: 'translate(-50%, -50%)' // Center the marker
                            });

                        map.append(marker);
                    } else {
                        $('#result').html('Invalid coordinates.');
                    }
                } else {
                    $('#result').html('Coordinates not found.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
                $('#result').html('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
});
