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

            if (msgs.length === 0) {
                const empty = document.createElement('div');
                empty.classList.add('message');
                empty.style.opacity = '0.6';
                empty.textContent = 'No messages yet';
                chatMessages.appendChild(empty);
            }

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

// -------------------------------
// Populate friend dropdown & start chat
// -------------------------------
const friendSelect = document.getElementById('friendSelect');
const startChatBtn = document.getElementById('startChatBtn');

function loadFriends() {
    fetch('get_friends.php')
        .then(r => r.json())
        .then(friends => {
            friendSelect.innerHTML = '<option value="">-- Start new chat --</option>';
            friends.forEach(f => {
                const opt = document.createElement('option');
                opt.value = f.id;
                opt.textContent = f.user_name;
                friendSelect.appendChild(opt);
            });
        })
        .catch(err => console.error(err));
}

startChatBtn.addEventListener('click', () => {
    const fid = friendSelect.value;
    if (!fid) return;

    fetch('create_conversations.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `friend_id=${encodeURIComponent(fid)}`
    })
        .then(r => r.json())
        .then(data => {
            loadConversations(); // refresh sidebar
            if (data.conversation_id) {
                currentConv = data.conversation_id;
                const friendName = friendSelect.options[friendSelect.selectedIndex].text;
                chatHeader.textContent = friendName;
                fetchMessages();

                // highlight the conversation in the sidebar
                setTimeout(() => {
                    const li = [...chatList.children].find(c => c.dataset.id == currentConv);
                    if (li) li.classList.add('active');
                }, 300);
            }
        })
        .catch(err => console.error(err));
});

// Call on page load
loadFriends();
