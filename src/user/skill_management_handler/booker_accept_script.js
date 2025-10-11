// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById('reviewModal');
    const reviewType = document.getElementById('reviewType');
    const reviewText = document.getElementById('reviewText');
    const likeBtn = document.getElementById('likeBtn');
    const dislikeBtn = document.getElementById('dislikeBtn');
    let selectedBooking = null;

    // Mutually exclusive like/dislike
    likeBtn.addEventListener('click', () => {
        likeBtn.classList.add('active');
        dislikeBtn.classList.remove('active');
    });
    dislikeBtn.addEventListener('click', () => {
        dislikeBtn.classList.add('active');
        likeBtn.classList.remove('active');
    });

    // Open modal on confirm button click
    document.querySelectorAll('.confirm-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            selectedBooking = btn.dataset.bid;
            serviceId = btn.dataset.sid;
            modal.style.display = 'flex';
        });
    });

    // Cancel
    document.getElementById('cancelModal').addEventListener('click', () => {
        modal.style.display = 'none';
        selectedBooking = null;
    });

    // Submit review
    document.getElementById('confirmSubmit').addEventListener('click', () => {
        if (!selectedBooking) return;

        const reviewData = {
            bid: selectedBooking,
            type: reviewType.value,
            sentiment: likeBtn.classList.contains('active') ? 'like' :
                dislikeBtn.classList.contains('active') ? 'dislike' : null,
            review: reviewText.value,
            sid: serviceId
        };
        console.log(reviewData);

        fetch('skill_management_handler/booker_accept.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams(reviewData)
        })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    modal.style.display = 'none';
                    const skill = document.querySelector(`.confirm-btn[data-bid="${selectedBooking}"]`).closest('.skill-el');
                    skill.outerHTML = `<div class="skill-el"><h3>Thank you for confirming and reviewing this service.</h3></div>`;
                }
            });
    });
});