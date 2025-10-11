// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const listingId = btn.dataset.lid;
        const skill = btn.closest('.skill-res');
        const title = btn.closest('.skill-res').previousElementSibling;

        if (confirm(`Are you sure you want to delete "${title.textContent}"?`)) {
            fetch('skill_management_handler/delete_skill.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ listing_id: listingId })
            })
                .then(res => res.json())
                .then(data => {
                    if (data) {
                        // Replace the whole skill block with a simple message
                        skill.innerHTML = `<h3>${title.textContent} has been removed</h3>`;
                    } else {
                        const spanMsg = btn.parentElement.nextElementSibling;
                        spanMsg.hidden = false;
                    }
                });
        }
    });
});
