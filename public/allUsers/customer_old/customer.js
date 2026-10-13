import { handleMessage } from "./helpers.js";

document.addEventListener('DOMContentLoaded', async () => {
//   await getCartProducts();

//   document.querySelector('.newsletter-form').addEventListener('submit', async (event) => {
//     event.preventDefault();
//     const email = document.querySelector(`input[name="newsletter_email"]`).value.trim();
//     try {
//       if (email.length === 0) {
//         throw 'Please enter a valid email!';
//       }
//       const response = await axios.post(route('customer.subscribe-newsletter'), { email });
//       const { message } = response.data;
//       return handleMessage('success', 'Yay!', message);
//     } catch (error) {
//       if (error.hasOwnProperty('response')) {
//         return handleMessage('error', 'Uh Oh!', error.response.data.message);
//       }
//       if (typeof error === 'string') {
//         return handleMessage('error', 'Uh Oh!', error);
//       }
//     }
//   });
//   document.querySelector('.newsletter-form-2').addEventListener('submit', async (event) => {
//     event.preventDefault();
//     const email = document.querySelector(`input[name="newsletter_email_2"]`).value.trim();
//     try {
//       if (email.length === 0) {
//         throw 'Please enter a valid email!';
//       }
//       const response = await axios.post(route('customer.subscribe-newsletter'), { email });
//       const { message } = response.data;
//       localStorage.setItem('newsletterPopup', 'hide');
//       $.magnificPopup.proto.close.call(this);
//       return handleMessage('success', 'Yay!', message);
//     } catch (error) {
//       if (error.hasOwnProperty('response')) {
//         return handleMessage('error', 'Uh Oh!', error.response.data.message);
//       }
//       if (typeof error === 'string') {
//         return handleMessage('error', 'Uh Oh!', error);
//       }
//     }
//   });
});



export async function getUnseenNotification() {
    try {
        const response = await axios.get(route('buyer.get-unseen-notification-count'));
        const count = response?.data?.data?.unseenNotificationCount ?? 0;

        document.querySelectorAll('.notification-count').forEach(element => {
            element.textContent = count > 0 ? `(${count})` : '';
        });

    } catch (error) {
        console.error('Notification fetch error:', error);
    }
}

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.addEventListener('message', (event) => {
        if (event.data?.type === 'NEW_NOTIFICATION') {
            getUnseenNotification();
        }
    });
}

document.addEventListener('DOMContentLoaded', async function () {
    await getUnseenNotification();
});

const lastUrlSegment = location.pathname.split("/").pop();

export async function getCartProducts() {
  const response = await axios.get(route('buyer.get-cart-products'));
  const { data: responseData } = response;
  const { status, message, data: messageData } = responseData;
  const products = messageData.cartProducts;
  let grandTotal = messageData.grandTotal;
  const getCurrentCurrency = messageData.getCurrentCurrency;
  const shippingCharges = messageData.shippingCharge;
  grandTotal += messageData.shippingCharge;

  let template = ``;

  template = products.map(product => {
    return `
    <li class="item d-flex justify-content-center align-items-center">
        <a class="product-image" href="javascript:;">
          <img class="blur-up lazyloaded" src="${product.productImage}" alt="${product.name}" title="${product.name}">
        </a>
        <div class="product-details">
          <a class="product-title" href="javascript:;">${product.name}</a>
          <div class="variant-cart">${product.color} / ${product.size}</div>
          <div class="priceRow">
            <div class="product-price">
              <span class="money">${getCurrentCurrency.currency} ${(product.sellingPrice * getCurrentCurrency.con_ratio).toFixed(2)}</span>
            </div>
          </div>
        </div>
        <div class="qtyDetail text-center">
          <div class="wrapQtyBtn">
            <div class="qtyField">
              <a class="qtyBtn plus qty-minus" href="javascript:void(0);">-</a>
              <input type="text" class="qty product-qty-box" value="${product.cartQuantity}" readonly data-product-stock="${product.stock}" data-cart-id="${product.id}" data-product-id="${product.productId}">
              <a class="qtyBtn minus  qty-plus" href="javascript:void(0);">+</a>
            </div>
          </div>
          <a href="javascript:;" class="remove remove-cart-product" data-cart-id="${product.id}" data-product-id="${product.productId}" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove">X</a>
        </div>
      </li>
  `
  }).join('');
  document.querySelector('.cart-products').innerHTML = template;
  // document.querySelector('.cart-sub-total').textContent = `$ ${grandTotal.toFixed(2)}`;
  document.querySelector('.cart-grand-total').textContent = `${getCurrentCurrency.currency} ${(grandTotal * getCurrentCurrency.con_ratio).toFixed(2)}`;
  document.querySelector('.cart-shipping-total').textContent = `${getCurrentCurrency.currency} ${shippingCharges.toFixed(2)}`;

  if (lastUrlSegment === 'cart') {
    document.querySelector('.cart-page-sub-total').textContent = `${getCurrentCurrency.currency} ${(grandTotal * getCurrentCurrency.con_ratio).toFixed(2)}`;
    document.querySelector('.cart-page-shipping-total').textContent = `${getCurrentCurrency.currency} ${shippingCharges.toFixed(2)}`;
    // document.querySelector('.cart-page-grand-total').textContent = `₹ ${grandTotal.toFixed(2)}`;
  }

  const initialValue = 0;
  const sumOfTotalCartQuantity = products.reduce(
    (previousValue, currentValue) => previousValue + currentValue.cartQuantity,
    initialValue
  );
  document.querySelectorAll('.cart-count').forEach(element => {
    element.textContent = sumOfTotalCartQuantity;
  });
}
if (document.querySelector('.wishlist-div') !== null && document.querySelector('.wishlist-div') !== undefined) {
    console.log('sdfs');
  document.querySelectorAll('.wishlist-div').forEach(button => {
    button.addEventListener('click', async btn => {
        console.log('sdfssfsfsdf');
      if (btn.target && btn.target.classList.contains('wishlist-live-btn')) {
        const product_id = +btn.target.dataset.productId;
        const response = await axios.post(route('buyer.add-to-wishlist'), {
          product_id
        });
        const { data: responseData } = response;
        const { status, message, data: messageData } = responseData;
        if (status === 'success') {
          if (btn.target.classList.contains('text-danger')) {
            btn.target.classList.remove('text-danger');
          } else {
            btn.target.classList.add('text-danger');
          }
          document.querySelectorAll('.wishlist-count').forEach(element => {
            element.textContent = messageData[0];
          });
        }
      }

    });
  });
}

if (document.querySelector('.designer-wishlist-div') !== null && document.querySelector('.designer-wishlist-div') !== undefined) {
  document.querySelectorAll('.designer-wishlist-div').forEach(button => {
    button.addEventListener('click', async btn => {
      if (btn.target && btn.target.classList.contains('wishlist-live-designer-btn')) {
        const designer_id = +btn.target.dataset.designerId;
        const response = await axios.post(route('buyer.add-to-wishlist-designer'), {
          designer_id
        });
        const { data: responseData } = response;
        const { status, message, data: messageData } = responseData;
        if (status === 'success') {
          if (btn.target.classList.contains('text-danger')) {
            btn.target.classList.remove('text-danger');
            btn.target.classList.remove('an-heart');
            btn.target.classList.add('an-heart-l');
          } else {
            btn.target.classList.add('text-danger');
            btn.target.classList.add('an-heart');
            btn.target.classList.remove('an-heart-l');
          }
        }
      }
    });
  });
}

if (document.querySelector('.copy-text') !== null && document.querySelector('.copy-text') !== undefined) {
  document.querySelectorAll('.copy-text').forEach(elements => {
    elements.addEventListener('click', button => {
      const element = document.querySelector(button.target.dataset.className);
      // Select the text field
      element.select();
      element.setSelectionRange(0, 99999); // For mobile devices
      // Copy the text inside the text field
      navigator.clipboard.writeText(element.value);

      return handleMessage('success', 'Yay!', 'Referral link has been copied to your clipboard');
    });
  });
}