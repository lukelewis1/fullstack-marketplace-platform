const link = document.getElementById('logout-link');
const modal = document.getElementById('logout-modal');

document.getElementById('logout-yes').onclick = () => { window.location.href = link.href; };
document.getElementById('logout-no').onclick = () => { modal.style.display = 'none'; };

link.addEventListener('click', e => {
    e.preventDefault();
    modal.style.display = 'block';
});