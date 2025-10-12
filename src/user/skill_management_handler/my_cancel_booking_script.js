// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
// Same as the other cancel booking script but for the provider serves same purpose with slight difference in implementation
document.querySelectorAll('.cancel-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const [bookerId, serviceId, serviceName, credits] = JSON.parse(btn.dataset.id);
        const message = prompt(`Please enter the reason for cancelling "${serviceName}":`);
        if (!message) return;

        const skill = btn.closest('.skill-el');

        fetch('skill_management_handler/my_cancel_booking.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                pid: bookerId,
                sid: serviceId,
                reason: message,
                title: serviceName,
                cost: credits
            })
        })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    skill.outerHTML = `<div class="skill-el"><h3>Skill has been canceled and booker notified</h3></div>`;
                }
            });
    });
});
