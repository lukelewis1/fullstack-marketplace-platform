document.querySelectorAll('.confirm-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const skill = btn.closest('.skill-el');
        const bookingId = btn.dataset.id;

        fetch('skill_management_handler/provider_accept.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({bid: bookingId})
        })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    skill.outerHTML = `<div class="skill-el"><h3>You've confirmed your skill has been successfully completed, await the bookers confirmation for transfer of FUSS Credits.</h3></div>`;
                }
            });
    });
});