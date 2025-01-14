    setTimeout(function() {
        $.ajax({
            url: 'logout.php', 
            type: 'POST',
            success: function(response) {
                console.log('Auto logout successful');
                window.location.href = '/PMC';
            },
            error: function(xhr, status, error) {
                console.error('Auto logout error:', error);
            }
        });
    }, 21600000); 


