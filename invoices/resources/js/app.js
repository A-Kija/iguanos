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
        })
        .catch(err => console.log(err));
    });
}





});