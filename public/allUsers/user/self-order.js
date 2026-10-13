import { handleMessage } from "../customer/helpers.js";
let productSkus = [];
let productIds = [];

// searching product with the given sku. 
document.querySelector('.search-sku-btn').addEventListener('click', async (event) => {
  event.preventDefault();
  event.target.innerHTML = `Searching... &nbsp; <i class="fa fa-search"></i>`;
  const sku = document.querySelector(`input[name="search_sku"]`).value.trim();
  try {
    if (sku.length === 0) {
      event.target.innerHTML = `Inavlid Try Again!... &nbsp; <i class="fa fa-ban"></i>`;
      resetMessage(event);
      throw new Error('Please enter a valid sku!');
    }

    const response = await axios.get(route('admin.get-product-via-sku', sku));
    const product = response.data.data.product;
    const productSizes = response.data.data.productSizes;

    if (productSkus.includes(product.sku)) {
      event.target.innerHTML = `Already Exists! &nbsp; <i class="fa fa-ban"></i>`;
      resetMessage(event);
      throw new Error('The product with the same sku already exists!');
    }

    productSkus.push(product.sku);
    setProduct(product, productSizes);
    event.target.innerHTML = `Product Found! &nbsp; <i class="fa fa-check"></i>`;
    resetMessage(event);
    document.querySelector(`input[name="search_sku"]`).value = '';
    return true;
  } catch (error) {
    if (error.hasOwnProperty('response')) {
      event.target.innerHTML = `Error! Try Again... &nbsp; <i class="fa fa-ban"></i>`;
      resetMessage(event);
      return handleMessage('warning', 'Warning!', error.response.data.message);
    }

    event.target.innerHTML = `Error! Try Again... &nbsp; <i class="fa fa-ban"></i>`;
    resetMessage(event);
    return handleMessage('error', 'Error!', error);
  }
});

// setting the searched product and displaying it for the order purposes
function setProduct(product, productSizes) {
  const sizes = productSizes.map(size => {
    return `
    <option 
      data-product-id="${size.id}"
      data-product-price="${size.price_unit}"
      data-product-stock="${size.stock}"
      value="${size.product_type_value_two.type_value}"
        ${size.stock === 0 ? 'disabled' : ''}
      >
      ${size.product_type_value_two.type_value} | INR ${size.price_unit} 
       ${size.stock === 0 ? '| Out of Stock' : ''}
    </option>`;
  }).join('');

  const template = `
   <div class="row mx-0 my-20">
      <div class="col">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" maxlength="255" value="${product.name.trim()}" />
      </div>
      <div class="col">
        <label class="form-label">Product SKU</label>
        <input type="text" readonly name="sku" class="form-control" maxlength="100" value="${product.sku.trim()}" />
      </div>
      <div class="col">
        <label class="form-label">Product Brand</label>
        <input type="text" name="sku" class="form-control" maxlength="100" value="${product.brand.brand_name}" readonly />
      </div>
      <div class="col">
        <label class="form-label">Product Qty</label>
        <input type="number" min="1" max="${product.stock}" name="quantity[]" class="form-control product-qty" value="1" />
      </div>
      <div class="col">
        <label class="form-label">Product Color</label>
        <input type="text" readonly min="1" maxlength="100" name="color"
          class="form-control" value="${product.product_type_value_one.type_value}"
          style="border-color:${product.product_type_value_one.type_color_code};"
          />
      </div>
      <div class="col">
        <label class="form-label">Select Product Size</label>
        <select class="form-select selected-sizes" required name="size">
          <option value="">Select Size</option>
          ${sizes}
        </select>
      </div>
      <div class="col">
        <label class="form-label">Product Price</label>
        <input type="number" readonly min="0" name="price[]" class="form-control product-price" value="${product.price_unit}" />
      </div>
      <div class="col">
        <label class="form-label">Product Discount</label>
        <input type="number" min="0" name="discount_amount[]" class="form-control discount-amount" />
      </div>
      <div class="col">
        <label class="form-label">Product New Price</label>
        <input type="number" min="0" readonly name="new_price[]" class="form-control new-price" value="${product.price_unit}" />
      </div>
      <div class="col">
        <label class="form-control" style="opacity:0;">&nbsp;</label>
        <a href="javascript:;" class="bg-info p-1 rounded">
          <i class="fa fa-times remove-product" data-product-id="" data-product-sku="${product.sku}"></i>
        </a>
      </div>
    </div>
  `;

  document.querySelector('.more-products').insertAdjacentHTML('beforeend', template);
  return true;
}

// resettng error the message to normal message
function resetMessage(event) {
  setTimeout(() => {
    event.target.innerHTML = `Search &nbsp; <i class="fa fa-search"></i>`;
  }, 3000);
}

// removing the selected product from the view and from arrays as well
document.querySelector('.more-products').addEventListener('click', (event) => {
  if (event.target.classList.contains('remove-product')) {
    const btn = event.target;
    productSkus = productSkus.filter(productSku => productSku !== btn.dataset.productSku);
    productIds = productIds.filter(productId => productId !== btn.dataset.productId);
    btn.parentElement.parentElement.parentElement.remove();
    setSelectedSizes();
  }
});

// setting selected size product ids in an array
document.querySelector('.more-products').addEventListener('change', (event) => {
  if (event.target.classList.contains('selected-sizes')) {
    setSelectedSizes();
  }
});

function setSelectedSizes() {
  productIds = [];
  document.querySelectorAll('.selected-sizes').forEach(selectBox => {
    if (Number.isInteger(+selectBox.options[selectBox.selectedIndex].dataset.productId)) {
      productIds.push(+selectBox.options[selectBox.selectedIndex].dataset.productId);
      selectBox.parentElement.parentElement.querySelector('.remove-product').dataset.productId = +selectBox.options[selectBox.selectedIndex].dataset.productId;
      selectBox.parentElement.parentElement.querySelector('.product-qty').setAttribute('max', selectBox.options[selectBox.selectedIndex].dataset.productStock)

      const discountValue = +selectBox.parentElement.parentElement.querySelector(`.discount-amount`).value;
      const productQty = +selectBox.parentElement.parentElement.querySelector(`.product-qty`).value;
      const priceInput = +selectBox.options[selectBox.selectedIndex].dataset.productPrice;
      const newPriceInput = selectBox.parentElement.parentElement.querySelector(`.new-price`);
      newPriceInput.value = (productQty * +priceInput) - discountValue;

    }

    const productIdTemplate = productIds.map(productId => {
      return `<input type="hidden" name="product_id[]" value="${productId}" />`;
    }).join('');

    document.querySelector('.product-ids').innerHTML = productIdTemplate;

  });
}

// calculating product price by its quantity and discount
document.querySelector('.more-products').addEventListener('input', (event) => {
  if (event.target.classList.contains('product-qty')) {
    const input = event.target;
    let discountValue = +input.parentElement.parentElement.querySelector(`.discount-amount`).value;

    if (+input.value >= +input.getAttribute('max')) {
      input.value = +input.getAttribute('max');
    }

    const priceInput = input.parentElement.parentElement.querySelector(`.product-price`);
    const newPriceInput = input.parentElement.parentElement.querySelector(`.new-price`);
    newPriceInput.value = (+input.value * +priceInput.value) - discountValue;
    return true;
  }

  if (event.target.classList.contains('discount-amount')) {
    const input = event.target;
    let discountValue = +input.value;
    const price = +input.parentElement.parentElement.querySelector(`.product-price`).value
    const newPriceInput = input.parentElement.parentElement.querySelector(`.new-price`);
    const quantity = +input.parentElement.parentElement.querySelector(`.product-qty`).value;

    const total = price * quantity;
    if (discountValue >= total) {
      input.value = price;
      discountValue = price;
    }

    const productPrice = price * +input.parentElement.parentElement.querySelector(`.product-qty`).value;

    newPriceInput.value = productPrice - discountValue;
    return true;
  }
});

// setting wallet money maximum amount to be deducted
document.querySelector('input[name="wallet_money"]').addEventListener('input', event => {
  if (+event.target.value >= +event.target.getAttribute('max')) {
    event.target.value = event.target.getAttribute('max');
  }
  if (document.querySelector('.apply-wallet-button').dataset.walletApplied === 'yes') {
    document.querySelector(`input[name="wallet_used"]`).value = event.target.value;
  }
});

// setting wallet used amount
document.querySelector('.apply-wallet-button').addEventListener('click', event => {
  if (event.target.dataset.walletApplied === 'no') {
    event.target.dataset.walletApplied = 'yes';
    event.target.innerHTML = `Click to remove wallet amount &nbsp;<i class="fa fa-times"></i>`;
    document.querySelector(`input[name="wallet_used"]`).value = document.querySelector(`input[name="wallet_money"]`).value;
    return true;
  }
  if (event.target.dataset.walletApplied === 'yes') {
    event.target.dataset.walletApplied = 'no';
    event.target.innerHTML = `Apply Wallet Amount &nbsp;<i class="fa fa-money"></i>`;
    document.querySelector(`input[name="wallet_used"]`).value = '';
    return true;
  }
});

document.querySelector('.order-form').addEventListener('submit', event => {
  event.preventDefault();
  if (productIds.length === 0) {
    handleMessage('warning', 'Warning!', 'Please select atleast one product!');
    return false;
  }
  event.target.submit();
});
