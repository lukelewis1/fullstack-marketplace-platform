// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

// All JS files in the friends directory are all just variants of each other to handle the different types of buttons
// around friend requests. They all are click event listeners that when the click happens they call their respective
// PHP sql handler that updates the information in the DB accordingly. Once the call is made the bool is returned they update the
// client side with validation of the action.
document.addEventListener('click', e => {
    if (e.target.classList.contains('deny-request')) {
        const btn = e.target;
        const friendId = btn.dataset.id;

        fetch('deny_request.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'friend_id=' + encodeURIComponent(friendId)
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    btn.outerHTML = '<span class="friend-status">Friend Request Denied</span>';
                } else {
                    alert(data.error || 'Something went wrong');
                }
            })
            .catch(err => console.error(err))
    }
});