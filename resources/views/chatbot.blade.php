<!-- Welcome Message Modal -->
<div class="modal fade" id="chatbot-welcome-modal" tabindex="-1" aria-labelledby="chatbotWelcomeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatbotWelcomeLabel">Добредојдовте на Dragigosti!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Мило ни е што сте тука! Како можеме да ви помогнеме во организацијата на вашата свадба? Ве молиме започнете со прашање.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Затвори</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="start-chat-btn">Започнете чат</button>
            </div>
        </div>
    </div>
</div>

<!-- Floating Chatbot Button -->
<div id="chatbot-btn-container">
    <button id="chatbot-btn" class="btn btn-primary rounded-circle shadow-lg">
        <i class="bi bi-chat-dots"></i>
    </button>
</div>
