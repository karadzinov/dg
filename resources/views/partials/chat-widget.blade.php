<!-- Floating Chat Button -->
<style>
    #chat-toggle {
        position: fixed;
        bottom: 154px;
        right: 24px;
        background: #F9B6A4;
        color: white;
        border-radius: 9999px;
        padding: 14px 20px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1000;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }

    #chat-toggle:hover {
        transform: scale(1.05);
    }

    #chat-box {
        display: none;
        position: fixed;
        bottom: 80px;
        right: 24px;
        width: 400px;
        height: 520px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.25);
        overflow: hidden;
        z-index: 1001;
    }

    /* Mobile responsive overrides */
    @media (max-width: 576px) {
        #chat-toggle {
            bottom: 120px;
            right: 16px;
            padding: 12px 16px;
            font-size: 14px;
        }

        #chat-box {
            right: 8px;
            left: 8px;
            bottom: 100px;
            width: auto;
            height: 80vh;
            max-height: 520px;
            border-radius: 12px;
        }
    }
</style>
<div id="chat-toggle">
    💬 Како да ви помогнеме?
</div>
<div id="chat-box">
    <iframe src="/chat" style="width: 100%; height: 100%; border: none;"></iframe>
</div>

<script>
    const toggle = document.getElementById('chat-toggle');
    const box = document.getElementById('chat-box');

    toggle.addEventListener('click', () => {
        box.style.display = box.style.display === 'none' ? 'block' : 'none';
    });
</script>
