import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


addEventListener('load', _ => {
    if (document.querySelector('.--add-product')) {
        addProductEvent();
        calculateTotal();
        document.querySelector('.--add-product').addEventListener('click', e => {
            axios.get(e.target.dataset.url)
                .then(res => {
                    document.querySelector('.--products').insertAdjacentHTML('beforeend', res.data.html);
                    addProductEvent();
                    addInRow();
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
            } else {
                calculateLineTotal(e.target.closest('.--line'));
            }
            calculateTotal();
        });
    });

    // quantity event
    document.querySelectorAll('.--products .--quantity:not(.--event-added)').forEach(select => {
        select.classList.add('--event-added');
        select.addEventListener('input', e => {
            const quantity = parseFloat(e.target.value);
            if (isNaN(quantity)) {
                e.target.closest('.--line').querySelector('.--total').value = '0.00';
            } else {
                calculateLineTotal(e.target.closest('.--line'));
            }
            calculateTotal();
        });
    });

    // remove event
    document.querySelectorAll('.--products .--remove-product:not(.--event-added)').forEach(select => {
        select.classList.add('--event-added');
        select.addEventListener('click', e => {
            e.target.closest('.--line').remove();
            calculateTotal();
            addInRow();
        });
    });
}

const calculateTotal = _ => {
    let total = 0;
    document.querySelectorAll('.--products .--total').forEach(input => {
        console.log(input.value);
        total += parseFloat(input.value);
    });
    document.querySelector('.--amount').value = total.toFixed(2);
}

const calculateLineTotal = line => {
    const price = line.querySelector('.--price').value;
    const quantity = parseFloat(line.querySelector('.--quantity').value);
    line.querySelector('.--total').value = (price * quantity).toFixed(2);
}

const addInRow = _ => {
    let i = 1;
    document.querySelectorAll('.--products .--line').forEach(line => {
        line.querySelector('h5.--in-row').innerHTML = i;
        line.querySelector('input.--in-row').value = i;
        i++;
    });
}