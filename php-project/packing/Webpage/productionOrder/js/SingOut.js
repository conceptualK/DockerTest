function singOUT() {
    $.ajax({
        url: '/Packing/logout.php',
        type: 'POST',
        success: function (response) {
            console.log('Auto logout successful');
            window.location.href = '/Packing';
        },
        error: function (xhr, status, error) {
            console.error('Auto logout error:', error);
        }
    });
}
