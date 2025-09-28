setInterval(() => {
    fetch('/messages/check_unseen.php') // returns a bool true or false
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('msg-badge');
            const link = badge.closest('a');
            // if unseen is true remove the hidden state from the style so it shows on the nav bar
            // else unseen is false and make the indicator hidden
            if (data.unseen) {
                badge.classList.remove('hidden');
                link.classList.add('unread');
            } else {
                badge.classList.add('hidden');
                link.classList.remove('unread');
            }
        });
}, 1000);