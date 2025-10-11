// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

setInterval(() => {
    fetch('/user/friends/check_requests.php') // your new PHP file
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('req-badge');
            if (!badge) return; // safety check

            const link = badge.closest('a');

            if (data.request) {
                badge.classList.remove('hidden');
                link.classList.add('unread');
            } else {
                badge.classList.add('hidden');
                link.classList.remove('unread');
            }
        })
        .catch(err => console.error(err));
}, 1000);
