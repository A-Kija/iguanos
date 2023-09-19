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


// MIN MAX SLIDERS
addEventListener('load', _ => {
    if (document.querySelector('input[type=range]')) {
        const min = document.querySelector('input[name=min]');
        const max = document.querySelector('input[name=max]');
        const minVal = document.querySelector('#min');
        const maxVal = document.querySelector('#max');

        min.addEventListener('input', e => {
            minVal.innerHTML = e.target.value;
            if (parseInt(max.value) < parseInt(min.value)) {
                max.value = min.value;
                maxVal.innerHTML = min.value;
            }
        });
        max.addEventListener('input', e => {
            maxVal.innerHTML = e.target.value;
            if (parseInt(max.value) < parseInt(min.value)) {
                min.value = max.value;
                minVal.innerHTML = max.value;
            }
        });
    }
});

// SEARCH CLIENT FOR INVOICE
addEventListener('load', _ => {
    if (document.querySelector('.--search-client')) {
        document.querySelector('.--search-client').addEventListener('input', e => {
            const search = e.target.value;
            if (search.length > 2) {
                axios.get(e.target.dataset.url + '?q=' + search)
                    .then(res => {
                        document.querySelector('.--clients-list').innerHTML = res.data.html;
                        addClientEvent();
                    })
                    .catch(err => console.log(err));
            }
        });
        // loose focus
        document.querySelector('.--search-client').addEventListener('blur', e => {
            e.target.value = '';
            setTimeout(_ => {
                document.querySelector('.--clients-list').innerHTML = '';
            }, 200);
        });
    }
});

const addClientEvent = _ => {
    document.querySelectorAll('.--clients-list li').forEach(li => {
        li.addEventListener('click', e => {
            document.querySelector('.--selected-client-name').value = e.target.dataset.name;
            document.querySelector('input[name=client_id]').value = e.target.dataset.id;
        });
    });
}

// ADD IMAGE INPUT LINE
addEventListener('load', _ => {
    if (document.querySelector('.--images-lines')) {
        document.querySelector('.--add-image').addEventListener('click', e => {
            axios.get(e.target.dataset.url)
                .then(res => {
                    document.querySelector('.--images-lines').insertAdjacentHTML('beforeend', res.data.html);
                    addImageEvent();
                })
                .catch(err => console.log(err));
        });
    }
});

const addImageEvent = _ => {
    renumberImages();
    document.querySelectorAll('.--images-lines .--line:not(.--event-added)').forEach(line => {
        line.classList.add('--event-added');


        // remove event
        line.querySelector('.--remove-image').addEventListener('click', e => {
            e.target.closest('.--line').remove();
            renumberImages();
        });
        // preview image
        line.querySelector('.--image').addEventListener('change', e => {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.onload = e => {
                line.querySelector('.--image-preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        });
    });
}

const renumberImages = _ => {
    let i = 1;
    document.querySelectorAll('.--images-lines .--line').forEach(line => {
        line.querySelector('h2.--row').innerHTML = i;
        i++;
    });
}