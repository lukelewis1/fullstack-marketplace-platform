console.log("Script Loaded");
document.addEventListener('click', e => {
    if (e.target.classList.contains('remove-friend')) {
        const btn = e.target;
        const friendId = btn.dataset.id;

        fetch('remove_friend.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'friend_id=' + encodeURIComponent(friendId)
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    btn.outerHTML = '<span class="friend-status">Friend Removed</span>';
                } else {
                    alert(data.error || 'Something went wrong');
                }
            })
            .catch(err => console.error(err))
    }
});