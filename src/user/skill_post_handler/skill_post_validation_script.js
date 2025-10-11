// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

const titleInput = document.getElementById('title');
const topicInput = document.getElementById('topic');
const lenError = document.querySelectorAll('.posting-err');

//Checks for if inputs are too long
titleInput.addEventListener('input', () => {
    if (titleInput.value.length > 50) {
        lenError[0].style.display = 'block';
    } else {
        lenError[0].style.display = 'none';
    }
});

topicInput.addEventListener('input', () => {
    if (topicInput.value.length > 60) {
        lenError[1].style.display = 'block';
    } else {
        lenError[1].style.display = 'none';
    }
});

// Dynamic characters left handling
const descriptionInput = document.getElementById('description');
const charsLeft = document.getElementById('char-count');

descriptionInput.addEventListener('input', () => {
    charsLeft.textContent = (250 - descriptionInput.value.length).toString();
});