import { handleMessage } from "./helpers.js";

document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', async function (event) {
        if (event.target.matches('.compare_checkbox_div .compare_checkbox')) {

            let product_id = event.target.dataset.productId;
            console.log(product_id);
            try {
                const response = await axios.get('/product/compare/store', { params: { product_id: product_id } });

                const { status, message, data } = response.data;
                location.reload();
                // handleMessage('success', 'Success!', message);
            } catch (error) {
                console.error("Error fetching product data:", error);
            }
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', async function (event) {
        if (event.target.matches('.compare_checkbox_div .supplier_compare_checkbox')) {

            let supplier_id = event.target.dataset.supplierId;
            console.log(supplier_id);
            try {
                const response = await axios.get('/product/supplier/store', { params: { supplier_id: supplier_id } });

                const { status, message, data } = response.data;
                location.reload();
                // handleMessage('success', 'Success!', message);
            } catch (error) {
                console.error("Error fetching supplier data:", error);
            }
        }
    });
});

