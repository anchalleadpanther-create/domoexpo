import { handleMessage } from "./helpers.js";

document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', async function (event) {
        if (event.target.matches('.compare_checkbox_div .compare_checkbox')) {
            
            let product_id = event.target.dataset.productId;
            console.log(product_id);
            try {
                const response = await axios.get('/product/compare/store', { params: { product_id: product_id } });
                // console.log(response);
                const { status, message, data } = response.data;
                handleMessage('success', 'Success!', message);
            } catch (error) {
                console.error("Error fetching product data:", error);
            }
        }
    });
});

