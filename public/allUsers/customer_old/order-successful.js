document.addEventListener('DOMContentLoaded', async () => {
    const orderId = document.querySelector('.order-details').value;
    const currency = document.querySelector('.order-details').dataset.currency;
    const couponCode = document.querySelector('.order-details').dataset.couponCode;
    const orderTotal = +document.querySelector('.order-details').dataset.grandTotal;
    const shippingCharge = +document.querySelector('.order-details').dataset.shippingCharges;
    const productIds = document
        .querySelector('.order-details')
        .dataset.productIds.split(',')
        .map(Number);

    const products = [];
    for (let index = 0; index < productIds.length; index++) {
        const productResponse = await axios.get(
            route('gtm.get-product', { productId: productIds[index] })
        );

        const product = productResponse.data.data;
        products.push({
            item_id: product.sku,
            item_name: product.name,
            affiliation: 'Google Merchandise Store',
            coupon: '',
            discount: product.discount,
            index: 0,
            item_brand: product.brand.brand_name,
            item_category:
                product.mapped_categories[0] !== undefined
                    ? product.mapped_categories[0]?.category_name
                    : '',
            item_category2:
                product.mapped_categories[1] !== undefined
                    ? product.mapped_categories[1]?.category_name
                    : '',
            item_category3:
                product.mapped_categories[2] !== undefined
                    ? product.mapped_categories[2]?.category_name
                    : '',
            item_category4:
                product.mapped_categories[3] !== undefined
                    ? product.mapped_categories[3]?.category_name
                    : '',
            item_category5:
                product.mapped_categories[4] !== undefined
                    ? product.mapped_categories[4]?.category_name
                    : '',
            item_list_id: 'related_products',
            item_list_name: 'Related Products',
            item_variant: product.type_value_id_1,
            location_id: 'ChIJIQBpAG2ahYAR_6128GcTUEo',
            price: product.price_unit,
            quantity: 1,
        });
    }


    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    const productPush = dataLayer.push({
        event: 'purchase',
        ecommerce: {
            transaction_id: orderId,
            value: orderTotal,
            tax: 0,
            shipping: shippingCharge,
            currency: currency,
            coupon: couponCode,
            value: products.reduce((total, product) => {
                return total + product.price;
            }, 0),
            items: products,
        },
    });

    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: 'Purchase',
        ecommerce: {
            value: orderTotal,
            currency: currency,
            items: products,
        },
    });
});
