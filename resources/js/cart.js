const { default: axios } = require("axios");

const formAddToCart  = document.querySelector('.form-add-to-cart')
if(formAddToCart){
    formAddToCart.addEventListener('submit', (e)=> {
        e.preventDefault();
        const data = new FormData(formAddToCart);
        axios.post('/cart/add', data);
    })
}
