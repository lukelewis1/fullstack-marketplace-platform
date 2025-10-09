document.querySelectorAll('.cancel-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const [providerId, serviceId, serviceName, credits] = JSON.parse(btn.dataset.id);
        const message = prompt(`Please enter the reason for cancelling "${serviceName}":`);
        if (!message) return;

        const skill = btn.closest('.skill-el');

        fetch('skill_management_handler/cancel_booking.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                pid: providerId,
                sid: serviceId,
                reason: message,
                title: serviceName,
                cost: credits
            })
        })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    skill.outerHTML = `<div class="skill-el"><h3>Skill has been canceled and provider notified</h3></div>`;
                }
            });
    });
});
