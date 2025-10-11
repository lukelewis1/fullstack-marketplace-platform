// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.pending-conf').forEach(btn => {
        btn.addEventListener('click', () => {
            const skill = btn.closest('.skill-el');
            const bookingId = btn.dataset.id;

            fetch('skill_management_handler/confirm_booking.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({bid: bookingId})
            })
                .then(res => res.json())
                .then(data => {
                    if (data) {
                        skill.outerHTML = `<div class="skill-el"><h3>You've now confirmed this booking.</h3></div>`;
                    }
                });
        });
    });
});