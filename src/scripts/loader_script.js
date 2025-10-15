// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
// very basic script used to dynamically display a variety of fun messages to users as they load im
function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

let dynamicMsg = document.getElementById('msg');

messages = [
    '🙏 Google Internship 🙏',
    'What is COMP2030 even about 😭😭😭',
    'git push --force origin main',
    'sudo rm -rf / --no-preserve-root ✌️😭',
    '🦁 The lion does not concern himself with AI-Acknowledgements 🦁',
    'How to centre a div?'
]

setInterval(() => {
    const idx = randomInt(0, messages.length - 1);
    dynamicMsg.textContent = messages[idx];
}, 1500);