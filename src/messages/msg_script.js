// =======================
// Message Inbox Frontend
// =======================

let currentConv = null;

const chatList      = document.getElementById('chatList');
const chatHeader    = document.getElementById('chatHeader');
const chatMessages  = document.getElementById('chatMessages');
const messageInput  = document.getElementById('messageInput');
const sendBtn       = document.getElementById('sendBtn');

// -----------------------
// Load sidebar chats
// -----------------------
function loadConversations() {
    fetch('get_conversations.php')
        .then(r => {
            if (!r.ok) throw new Error('Failed to load conversations');
            return r.json();
        })
        .then(data => {
            chatList.innerHTML = '';
            if (data.length === 0) {
                const li = document.createElement('li');
                li.textContent = 'No conversations';
                li.style.opacity = '0.6';
                chatList.appendChild(li);
                return;
            }
            data.forEach(conv => {
                const li = document.createElement('li');
                li.textContent = conv.other_name;
                li.dataset.id = conv.conversation_id;
                li.addEventListener('click', () =>
                    selectConversation(conv.conversation_id, conv.other_name, li)
                );
                chatList.appendChild(li);
            });
        })
        .catch(err => console.error(err));
}
loadConversations();

// -----------------------
// Select a conversation
// -----------------------
function selectConversation(id, name, li) {
    currentConv = id;
    [...chatList.children].forEach(c => c.classList.remove('active'));
    li.classList.add('active');
    chatHeader.textContent = name;
    fetchMessages();
}

// -----------------------
// Fetch messages
// -----------------------
function fetchMessages() {
    if (!currentConv) return;

    fetch(`get_messages.php?conversation_id=${encodeURIComponent(currentConv)}`)
        .then(r => {
            if (!r.ok) throw new Error('Failed to load messages');
            return r.json();
        })
        .then(msgs => {
            chatMessages.innerHTML = '';
            const myName = document.querySelector('.user-name')?.textContent.trim();

            msgs.forEach(m => {
                const div = document.createElement('div');
                div.classList.add('message');
                div.classList.add(m.user_name === myName ? 'sent' : 'received');
                div.textContent = m.message_text;
                chatMessages.appendChild(div);
            });

            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(err => console.error(err));
}

// -----------------------
// Poll for new messages
// -----------------------
setInterval(fetchMessages, 3000);

// -----------------------
// Send a message
// -----------------------
function sendMessage() {
    const text = messageInput.value.trim();
    if (!text || !currentConv) return;

    fetch('send_messages.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `conversation_id=${encodeURIComponent(currentConv)}&text=${encodeURIComponent(text)}`
    })
        .then(r => {
            if (!r.ok) throw new Error('Failed to send');
            return r.json();
        })
        .then(() => {
            messageInput.value = '';
            fetchMessages();
        })
        .catch(err => console.error(err));
}

sendBtn.addEventListener('click', sendMessage);
messageInput.addEventListener('keypress', e => {
    if (e.key === 'Enter') sendMessage();
});
