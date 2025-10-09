function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

let dynamicMsg = document.getElementById('msg');

messages = [
    'Submitting Extension Requests',
    'Skipping Lectures',
    'Watching Lecture Recordings on 2x speed',
    'Asking ChatGPT for Help',
    'Complaining about Group Assignments',
    'Doom Scrolling TikTok...',
    '🙏 Google Internship 🙏',
    'What is COMP2030 even about 😭😭😭'
]

setInterval(() => {
    const idx = randomInt(0, messages.length - 1);
    dynamicMsg.textContent = messages[idx];
}, 1500);