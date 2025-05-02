<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Chat Assistant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chat-box {
            max-height: 500px;
            overflow-y: auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .chat-bubble {
            padding: 10px 15px;
            border-radius: 20px;
            margin-bottom: 10px;
            max-width: 80%;
        }

        .chat-bubble.user {
            background-color: #d1e7dd;
            align-self: flex-end;
            text-align: right;
        }

        .chat-bubble.assistant {
            background-color: #e2e3e5;
            align-self: flex-start;
        }

        .chat-output {
            display: flex;
            flex-direction: column;
        }

        .chat-footer {
            margin-top: 15px;
        }

        .chat-container {
            max-width: 700px;
            margin: 30px auto;
        }

        .message-meta {
            font-size: 0.8em;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container chat-container">
    <h3 class="text-center mb-4">🤖 Site Assistant Chat</h3>

    <div id="chat-output" class="chat-box chat-output d-flex flex-column mb-3">
        <!-- Messages will be dynamically inserted here -->
    </div>

    <form id="chat-form" class="d-flex chat-footer">
        <input type="text" id="user-message" class="form-control me-2" placeholder="Type your message..." required>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<script>
    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const messageBox = document.getElementById('user-message');
        const userMessage = messageBox.value.trim();
        if (!userMessage) return;

        messageBox.value = '';
        const loadingId = addMessage('assistant', 'Thinking...');
        addMessage('user', userMessage);

        fetch('/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ question: userMessage })
        })
            .then(res => res.json())
            .then(data => {
                const answer = (data.answer || 'Sorry, no response.')
                    // Markdown links
                    .replace(/\*\*\[([^\]]+)\]\(([^)]+)\)\*\*/g, '<strong><a href="$2" target="_blank">$1</a></strong>')
                    // Plain URLs
                    .replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank">$1</a>')
                    // Line breaks
                    .replace(/\n/g, '<br>');

                updateMessage(loadingId, `<div>${answer}</div>`);
            })
            .catch(() => {
                updateMessage(loadingId, 'There was an error. Please try again later.');
            });
    });

    function addMessage(type, content) {
        const message = document.createElement('div');
        const id = 'msg-' + Date.now();
        message.id = id;
        message.className = `chat-bubble ${type}`;
        message.innerHTML = content;
        document.getElementById('chat-output').appendChild(message);
        document.getElementById('chat-output').scrollTop = document.getElementById('chat-output').scrollHeight;
        return id;
    }

    function updateMessage(id, newContent) {
        const message = document.getElementById(id);
        if (message) {
            message.innerHTML = newContent;
        }
    }
</script>

</body>
</html>
