document.addEventListener('click', e => {
    if (e.target.classList.contains('cancel-request')) {
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
                    btn.outerHTML = '<span class="friend-status">Friend Request Cancelled</span>';
                } else {
                    alert(data.error || 'Something went wrong');
                }
            })
            .catch(err => console.error(err))
    }
});