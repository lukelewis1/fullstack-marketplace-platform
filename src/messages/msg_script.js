// Dummy data for demo
const conversations = [
    {id: 1, name: "Hans", messages: [
            {sender: "me", text: "Hey Hans!"},
            {sender: "Hans", text: "Hi, what's up?"},
        ]},
    {id: 2, name: "Luke", messages: [
            {sender: "Luke", text: "Hey! Any updates?"},
            {sender: "me", text: "Working on it now."},
        ]},
    {id: 3, name: "Seth", messages: [
            {sender: "Seth", text: "This platform is cool."},
            {sender: "me", text: "Thanks Seth!"},
        ]}
];

const chatList = document.getElementById('chatList');
const chatHeader = document.getElementById('chatHeader');
const chatMessages = document.getElementById('chatMessages');
const messageInput = document.getElementById('messageInput');
const sendBtn = document.getElementById('sendBtn');

let currentConv = null;

// Build sidebar
conversations.forEach(conv => {
    const li = document.createElement('li');
    li.textContent = conv.name;
    li.addEventListener('click', () => selectConversation(conv, li));
    chatList.appendChild(li);
});

function selectConversation(conv, li) {
    currentConv = conv;
    [...chatList.children].forEach(el => el.classList.remove('active'));
    li.classList.add('active');
    chatHeader.textContent = conv.name;
    renderMessages(conv.messages);
}

function renderMessages(msgs) {
    chatMessages.innerHTML = '';
    msgs.forEach(m => {
        const div = document.createElement('div');
        div.classList.add('message', m.sender === 'me' ? 'sent' : 'received');
        div.textContent = m.text;
        chatMessages.appendChild(div);
    });
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

sendBtn.addEventListener('click', sendMessage);
messageInput.addEventListener('keypress', e => { if (e.key === 'Enter') sendMessage(); });

function sendMessage() {
    const text = messageInput.value.trim();
    if (!text || !currentConv) return;
    currentConv.messages.push({sender: 'me', text});
    renderMessages(currentConv.messages);
    messageInput.value = '';
}
