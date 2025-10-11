<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../inc/dbconn.inc.php';
require_once __DIR__ . '/../inc/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages</title>
    <link rel="stylesheet" href="msg_styles.css">
    <link rel="stylesheet" href="../styles/style.css" />
</head>
<body>
<?php include_header($_SESSION['username'] ?? null); ?>

<div class="page-wrapper-msg">
    <aside class="sidebar">
        <div class="sidebar-header">Chats</div>

        <!-- New Chat UI -->
        <div class="new-chat">
            <select id="friendSelect">
                <option value="">-- Start new chat --</option>
            </select>
            <button id="startChatBtn">Start</button>
        </div>

        <ul class="chat-list" id="chatList"></ul>
    </aside>

    <main class="chat-area">
        <div class="chat-header" id="chatHeader">Select a conversation</div>
        <div class="chat-messages" id="chatMessages"></div>
        <div class="chat-input">
            <input type="text" id="messageInput" placeholder="Type a message..." />
            <button id="sendBtn">Send</button>
        </div>
    </main>
</div>

<script src="msg_script.js"></script>
</body>
</html>
