import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


addEventListener('load', _ => {
    if (document.querySelector('.--add-product')) {
        document.querySelector('.--add-product').addEventListener('click', e => {
            axios.get(e.target.dataset.url)
                .then(res => {
                    document.querySelector('.--products').insertAdjacentHTML('beforeend', res.data.html);
                    addProductEvent();
                })
                .catch(err => console.log(err));
        });
    }
});

const addProductEvent = _ => {
    // select event
    document.querySelectorAll('.--products select:not(.--event-added)').forEach(select => {
        select.classList.add('--event-added');
        select.addEventListener('change', e => {
            const price = e.target.options[e.target.selectedIndex].dataset.price;
            e.target.closest('.--line').querySelector('.--price').value = price;
            const quantity = parseFloat(e.target.closest('.--line').querySelector('.--quantity').value);
            if (isNaN(quantity)) {
                e.target.closest('.--line').querySelector('.--total').value = '0.00';
                return;
            }
            e.target.closest('.--line').querySelector('.--total').value = (price * quantity).toFixed(2);
            calculateTotal();
        });
    });

    // quantity event
    document.querySelectorAll('.--products .--quantity:not(.--event-added)').forEach(select => {
        select.classList.add('--event-added');
        select.addEventListener('input', e => {
            const price = e.target.closest('.--line').querySelector('.--price').value;
            const quantity = parseFloat(e.target.value);
            if (isNaN(quantity)) {
                e.target.closest('.--line').querySelector('.--total').value = '0.00';
                return;
            }
            e.target.closest('.--line').querySelector('.--total').value = (price * quantity).toFixed(2);
            calculateTotal();
        });
    });

    // remove event
    document.querySelectorAll('.--products .--remove-product:not(.--event-added)').forEach(select => {
        select.classList.add('--event-added');
        select.addEventListener('click', e => {
            e.target.closest('.--line').remove();
            calculateTotal();
        });
    });
}

const calculateTotal = _ => {
    let total = 0;
    document.querySelectorAll('.--products .--total').forEach(input => {
        total += parseFloat(input.value);
    });
    document.querySelector('.--amount').value = total.toFixed(2);
}