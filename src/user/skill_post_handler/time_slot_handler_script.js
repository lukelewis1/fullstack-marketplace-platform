// Dynamically adds new timeslots for each day so users can have more than one timeslot on a given day
document.querySelectorAll('.day').forEach(dayBlock => {
    dayBlock.querySelector('.add-slot').addEventListener('click', () => {
        const timeslots = dayBlock.querySelector('.timeslot');
        const day = dayBlock.dataset.day;
        const slot = document.createElement('div');
        slot.classList.add('slot');
        slot.innerHTML = `<input type="time" name="${day}_start[]">
                          <input type="time" name="${day}_end[]">
                          <button type="button" class="remove-slot">Remove</button>`;
        timeslots.append(slot);

        slot.querySelector('.remove-slot').addEventListener('click', () => {
            slot.remove();
        });
    });
});