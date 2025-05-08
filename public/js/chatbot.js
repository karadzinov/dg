// Open the welcome message modal when the page loads
window.onload = function() {
    var myModal = new bootstrap.Modal(document.getElementById('chatbot-welcome-modal'), {
        keyboard: false
    });
    myModal.show();
}

// Open the chat window when the "Start Chat" button is clicked
document.getElementById('start-chat-btn').addEventListener('click', function() {
    // Close the welcome modal
    var myModal = bootstrap.Modal.getInstance(document.getElementById('chatbot-welcome-modal'));
    myModal.hide();

    // Open the chat interface (this is where you can implement your chatbot window)
    // You can replace this with your existing chat window initialization code
    document.getElementById('chatbot-btn').click();
});

// Chatbot button to show the chat interface (just an example to trigger)
document.getElementById('chatbot-btn').addEventListener('click', function() {
    // Implement your chat window toggle or modal here
    alert("Chatbot window opened!");
});
