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
        addImageEvent();
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
            const line = e.target.closest('.--line');
            console.log(line.querySelector('[name="old_image[]"]'))
            if (line.querySelector('[name="old_image[]"]')) {
                const oldImageInput = line.querySelector('[name="old_image[]"]');
                const editedImageInput = line.querySelector('[name="edited_image[]"]');
                if (oldImageInput.value) {
                    editedImageInput.value = oldImageInput.value;
                    oldImageInput.value = '';
                }
            }
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

// CREATE PRODUCT VALIDATION
addEventListener('load', _ => {
    if (document.querySelector('.--create-product')) {
        document.querySelector('.--error-close-button').addEventListener('click', e => {
            document.querySelector('.--errors-container').style.display = 'none';
        });
        document.querySelector('.--create-product').addEventListener('click', e => {
            e.preventDefault();
            const form = document.querySelector('.--create-product-form');
            const name = form.querySelector('input[name=name]');
            const price = form.querySelector('input[name=price]');
            const discount = form.querySelector('input[name=discount]');
            const description = form.querySelector('textarea[name=description]');
            const errors = [];
            if (name.value.length < 3) {
                errors.push('Product name must be at least 3 characters long');
            }
            if (isNaN(price.value) || price.value.length < 1) {
                errors.push('Price must be a number');
            }
            if (isNaN(discount.value || discount.value.length < 1)) {
                errors.push('Discount must be a number');
            }
            if (description.value.length < 10) {
                errors.push('Description must be at least 10 characters long');
            }
            if (errors.length) {
                document.querySelector('.--create-product-errors').innerHTML = '';
                document.querySelector('.--errors-container').style.display = 'block';

                errors.forEach(error => {
                    document.querySelector('.--create-product-errors').insertAdjacentHTML('beforeend', '<li>' + error + '</li>');
                });
            } else {
                form.submit();
            }
        });
    }
});

// TAGS
addEventListener('load', _ => {

    const addTagEvent = _ => {
        // remove
        document.querySelectorAll('.--remove-tag').forEach(tag => {
            tag.addEventListener('click', e => {
                document.querySelector('.--cover').style.display = 'flex';
                axios.delete(e.target.dataset.url)
                    .then(res => {
                        getTagsList();
                    })
                    .catch(err => console.log(err));
            });
        });
        // update
        document.querySelectorAll('.--update-tag').forEach(tag => {
            tag.addEventListener('click', e => {
                document.querySelector('.--cover').style.display = 'flex';
                axios.put(e.target.dataset.url, {
                    tag: e.target.closest('.--tag').querySelector('h4').innerText
                })
                    .then(res => {
                        document.querySelector('.--cover').style.display = 'none';
                    })
                    .catch(err => {
                        document.querySelector('.--cover').style.display = 'none';
                        const errorClass = '--tag-row-' + err.response.data.id;
                        document.querySelector('.' + errorClass).classList.add('error');
                        console.log(err)
                    });
            });
        });
        // remove error
        document.querySelectorAll('.--tag h4').forEach(tag => {
            tag.addEventListener('focus', _ => {
                tag.closest('.--tag').classList.remove('error');
            });
        });
    }


    if (document.querySelector('.--tags')) {
        // new
        document.querySelector('.--add-tag').addEventListener('click', e => {
            document.querySelector('.--cover').style.display = 'flex';
            axios.post(e.target.dataset.url, {
                tag: document.querySelector('[name=tag]').value
            })
                .then(res => {
                    document.querySelector('[name=tag]').value = '';
                    getTagsList();
                })
                .catch(err => console.log(err));
        })




    }
    const getTagsList = _ => {
        const tagsListBin = document.querySelector('.--tags-list-bin');
        axios.get(document.querySelector('.--tags-list-bin').dataset.url)
            .then(res => {
                tagsListBin.innerHTML = res.data.html;
                document.querySelector('.--cover').style.display = 'none';
                addTagEvent();
            })
            .catch(err => console.log(err));
    }

    if (document.querySelector('.--tags')) {
        getTagsList();
    }
});

//ADD TAGS TO PRODUCT
addEventListener('load', _ => {



    const addProductTagEvent = _ => {
        document.querySelectorAll('.--products-index .--remove-tag:not(.--event-added)').forEach(tag => {
            tag.classList.add('--event-added');
            tag.addEventListener('click', e => {
                e.target.closest('span').remove();
                axios.delete(e.target.dataset.url)
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => console.log(err));
            });
        });
    }

    if (document.querySelector('.--products-index')) {
        document.querySelectorAll('.--product-tags').forEach(tag => {
            const input = tag.querySelector('input');
            const button = tag.querySelector('button');
            button.addEventListener('click', e => {
                axios.post(e.target.dataset.url, {
                    tag: input.value
                })
                    .then(res => {
                        input.value = '';
                        tag.querySelector('.--list').insertAdjacentHTML('beforeend', res.data.html);
                        addProductTagEvent();
                    })
                    .catch(err => console.log(err));
            });
        });
        addProductTagEvent();
    }

    
});
