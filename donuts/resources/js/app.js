if (document.querySelector('#--hole')) {
    const hole = document.querySelector('#--hole');
    const text = hole.querySelector('b');
    const input = hole.querySelector('input');

    input.addEventListener('input', _ => {
        text.innerText = input.value;
    });
}

document.querySelectorAll('.--msgs .alert').forEach(alert => {
    alert.querySelector('button').addEventListener('click', e => {
        e.preventDefault();
        alert.remove();
    });
});