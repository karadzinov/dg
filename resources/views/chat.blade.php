<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Assistant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900 font-sans h-screen flex flex-col">

<!-- Chat Log -->
<main id="chat-log" class="flex-1 overflow-y-auto p-4 space-y-4">
    <!-- Messages injected here dynamically -->
</main>

<!-- Input Section -->
<footer class="border-t p-4">
    <div class="flex items-center gap-2">
        <input
            id="user-input"
            type="text"
            placeholder="Како можеме да ви помогнеме?"
            class="flex-1 rounded-full border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400 transition"
            onkeydown="if(event.key==='Enter') sendMessage();"
        >
        <button
            onclick="sendMessage()"
            class="bg-gray-900 text-white rounded-full px-4 py-2 hover:bg-gray-700 transition flex items-center gap-1">
            <!-- Upward white paper plane icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white transform" viewBox="0 0 24 24" fill="currentColor">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
            </svg>
        </button>
    </div>
</footer>

<!-- Chat Script -->
<script>
    const chatLog = document.getElementById('chat-log');
    const userInput = document.getElementById('user-input');

    const createMessageElement = (text, role) => {
        const container = document.createElement('div');
        container.className = `flex ${role === 'user' ? 'justify-end' : 'justify-start'} items-start gap-2 animate-fade-in`;

        const avatar = document.createElement('div');
        avatar.className = `w-8 h-8 rounded-full flex items-center justify-center font-bold text-white shrink-0 ${role === 'user' ? 'bg-blue-500' : 'bg-gray-500'}`;
        avatar.textContent = role === 'user' ? 'U' : 'A';

        const bubble = document.createElement('div');
        bubble.className = `${role === 'user' ? 'bg-blue-100 text-right' : 'bg-gray-100 text-left'} p-3 rounded-xl max-w-xs whitespace-pre-wrap text-sm shadow`;

        if (role === 'assistant') {
            text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            text = text.replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+)\)/g, '<a href="$2" class="text-blue-600 underline" target="_blank">$1</a>');
            text = text.replace(/(?<![">])(https?:\/\/[^\s<]+)/g, '<a href="$1" class="text-blue-600 underline" target="_blank">$1</a>');
            bubble.innerHTML = text;
        } else {
            bubble.textContent = text;
        }

        if (role === 'user') {
            container.appendChild(bubble);
            container.appendChild(avatar);
        } else {
            container.appendChild(avatar);
            container.appendChild(bubble);
        }

        return container;
    };

    const appendMessage = (text, role) => {
        const messageEl = createMessageElement(text, role);
        chatLog.appendChild(messageEl);
        chatLog.scrollTop = chatLog.scrollHeight;
    };

    const sendMessage = async () => {
        const text = userInput.value.trim();
        if (!text) return;

        appendMessage(text, 'user');
        userInput.value = '';

        appendMessage('Typing...', 'assistant');

        const res = await fetch('/api/assistant-chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ message: text })
        });
        const data = await res.json();

        chatLog.lastChild.remove(); // Remove "Typing..."
        appendMessage(data.reply, 'assistant');
    };
</script>

<style>
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(4px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</body>
</html>
