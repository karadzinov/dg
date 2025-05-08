<!-- Floating Chat Button -->
<div id="chat-toggle" style="
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
">
    💬 Како да ви помогнеме?
</div>

<!-- Chat Popup -->
<div id="chat-box" style="
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
">
    <iframe src="/chat" style="width: 100%; height: 100%; border: none;"></iframe>
</div>

<script>
    const toggle = document.getElementById('chat-toggle');
    const box = document.getElementById('chat-box');

    toggle.addEventListener('click', () => {
        box.style.display = box.style.display === 'none' ? 'block' : 'none';
    });
</script>
