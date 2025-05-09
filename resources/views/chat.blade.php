<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Assistant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/dist/css/custom.css"/>
</head>
<body class="m-0 p-0 bg-white text-sm font-sans">
<div class="flex flex-col h-full max-h-[500px]">
    <div id="chat-log" class="flex-1 overflow-auto p-4 space-y-2"></div>

    <div class="flex border-t">
        <input
            id="user-input"
            type="text"
            placeholder="Како можеме да ви помогнеме?"
            class="flex-1 p-2 outline-none"
            onkeydown="if(event.key==='Enter') sendMessage();"
        >
        <button
            onclick="sendMessage()"
            class="bg-gray-900 text-white px-4"
        >Send</button>
    </div>
</div>

<script>
    const chatLog = document.getElementById('chat-log');
    const userInput = document.getElementById('user-input');

    const appendMessage = (text, role) => {
        const div = document.createElement('div');
        div.className = `p-2 rounded-lg ${role === 'user' ? 'bg-pink-100 text-right ml-12' : 'bg-gray-100 mr-12'}`;

        if (role === 'assistant') {
            // Remove citation markers like
            text = text.replace(/【\d+:\d+†response\.json】/g, '');

            // Convert markdown-style links to HTML <a> tags
            text = text.replace(/\[([^\]]+)\]\((https?:\/\/[^\s)]+)\)/g, '<a href="$2" class="text-blue-600 underline" target="_blank">$1</a>');

            // Also convert any remaining plain URLs into links (if not already part of markdown)
            text = text.replace(/(?<!["'=\]])(https?:\/\/[^\s<]+)/g, '<a href="$1" class="text-blue-600 underline" target="_blank">$1</a>');

            div.innerHTML = text;
        } else {
            div.innerText = text;
        }

        chatLog.appendChild(div);
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

        // Remove typing...
        chatLog.lastChild.remove();
        appendMessage(data.reply, 'assistant');
    };
</script>

</body>
</html>
