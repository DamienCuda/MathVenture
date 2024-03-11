document.addEventListener('DOMContentLoaded', function() {
    // Remove flash messages after 5 seconds
    setTimeout(function() {
        var flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(function(message) {
            message.remove();
        });
    }, 4000);
});