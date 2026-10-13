document.addEventListener('DOMContentLoaded', async () => {
//   await getCartPageProducts();
  const productIds = await getCartPageProducts();
  console.log(productIds)
  
  const products = [];
    for (let index = 0; index < productIds.length; index++) {
        const productResponse = await axios.get(
            route('gtm.get-product', { productId: productIds[index] })
        );
        const product = productResponse.data.data;
        console.log(product)
        products.push({
            item_id: product.sku,
            item_name: product.name,
            affiliation: 'Google Merchandise Store',
            coupon: '',
            discount: product.discount,
            index: 0,
            item_brand: product.brand?.brand_name,
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
            item_variant: product.type_value_id_1.type_value,
            location_id: 'ChIJIQBpAG2ahYAR_6128GcTUEo',
            price: product.price_unit,
            quantity: 1,
        });
    }
  
  dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
     productPush = dataLayer.push({
        event: 'view_cart',
        ecommerce: {
            currency: 'INR',//document.querySelector('.selected-currency').value,
            value: products.reduce((total, product) => {
                return total + product.price;
            }, 0),
            items: products,
        },
    });
});

export async function getCartPageProducts() {
  const response = await axios.get(route('buyer.get-cart-products'));
  const { data: responseData } = response;
  const { status, message, data: messageData } = responseData;
  const products = messageData.cartProducts;
  
 
  const grandTotal = messageData.grandTotal;
  const getCurrentCurrency = messageData.getCurrentCurrency;
  let template = ``;
  template = products.map(product => {
       console.log(product)
    return `
    <tr class="cart__row border-bottom line1 cart-flex border-top">
      <td class="cart-delete text-center small--hide"><a href="javascript:;" title="Remove"  data-product-id="${product.productId}"  data-cart-id="${product.id}"
          class="btn btn--secondary cart__remove remove-icon position-static remove-cart-product" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Remove item">X</a></td>
      <td class="cart__image-wrapper cart-flex-item">
        <a href="javascript:;"><img class="cart__image blur-up lazyload"
            data-src="${product.productImage}"
            src="${product.productImage}"
            alt="${product.name}" width="80" /></a>
      </td>
      <td class="cart__meta small--text-left cart-flex-item">
        <div class="list-view-item__title">
          <a href="javascript:;">${product.name}</a>
        </div>
        <div class="cart__meta-text">
          Color: ${product.color}<br>Size: ${product.size}<br/>
          Qty: ${product.cartQuantity}<br/>
          ${product.customName.length > 0 ? `Custom Name: ${product.customName}` : ``}
        </div>
      </td>
      <td class="cart__price-wrapper cart-flex-item text-center small--hide">
        <span class="money">${getCurrentCurrency.currency} ${(product.sellingPrice * getCurrentCurrency.con_ratio).toFixed(2)}</span>
      </td>
      <td class="cart__update-wrapper cart-flex-item text-end text-md-center">
        <div class="cart__qty d-flex justify-content-end justify-content-md-center">
          <div class="qtyField">
            <a class="qtyBtn minus qty-minus" href="javascript:void(0);">-</a>
            <input class="cart__qty-input qty product-qty-box" type="text" readonly value="${product.cartQuantity}" data-product-stock="${product.stock}" data-cart-id="${product.id}" data-product-id="${product.productId}" />
            <a class="qtyBtn plus qty-plus" href="javascript:void(0);">+</a>
          </div>
        </div>
        <a href="javascript:;" title="Remove" data-cart-id="${product.id}"
          class="removeMb d-md-none d-inline-block text-decoration-underline mt-2 me-3 remove-cart-product cart-delete">Remove</a>
      </td>
      <td class="cart-price cart-flex-item text-center small--hide">
        <span class="money fw-500 total-${product.id}">${getCurrentCurrency.currency} ${((product.sellingPrice * getCurrentCurrency.con_ratio) * product.cartQuantity).toFixed(2)}</span>
      </td>
      ${product.buyerId !== null && product.buyerId !== undefined ? `<td class="cart-price cart-flex-item text-center small--hide">
        <a href="${route('buyer.move-to-wishlist', [product.buyerId, product.cartId])}" class="money fw-500">Save for later</a>
      </td>` : ''}
    </tr>
  `
  }).join('');
  document.querySelector('.cart-productss').innerHTML = template;
  document.querySelector('.cart-page-sub-total').textContent = `${getCurrentCurrency.currency} ${(grandTotal * getCurrentCurrency.con_ratio).toFixed(2)}`;
  // document.querySelector('.cart-page-grand-total').textContent = `$ ${grandTotal.toFixed(2)}`;
  if (products.length === 0) {
    return document.querySelector('.cart-row').innerHTML = `
    <div class="col-md-12 text-center">
      <h1 style="font-family: Playfair Display!important;">Uh Oh!</h1>
      <p  style="font-family: Playfair Display!important;">Seems like your cart is empty!!</p>
    </div>
    <div class="d-flex justify-content-center col-md-12">
      <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_qargqtj3.json"
        background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay>
        </div>
    <div class="col-md-12 text-center">
      <a class="btn bg-current text-white rounded-6 py-2" href="${route('home')}">Keep Shopping</a>
    </div>
  `;
  
  
  }
return products.map((product)=>product.productId);
}
