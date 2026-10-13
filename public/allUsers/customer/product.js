import { handleMessage } from "./helpers.js";
import { getCartProducts } from "./customer.js";

const lastUrlSegment = location.pathname.split("/").pop();
/* 
  Add to cart functionality
*/
if (
    document.querySelector(".add-to-cart-btn") !== null &&
    document.querySelector(".add-to-cart-btn") !== undefined
) {
    document.querySelectorAll(".add-to-cart-btn").forEach((button) => {
        button.addEventListener("click", async (btn) => {
            const cartBtn = btn.target;
            const addVia = btn.target.dataset.clickFrom;
            const cartQuantityDiv =
                document.querySelector(".cart-quantity-div");
            // const quantity = 1;
            const quantity = cartQuantityDiv.querySelector('.product-qty-box').value;
            // alert(quantity)
            const quantityBox =
                cartQuantityDiv.querySelector(".product-qty-box");
            const productId = +cartBtn.dataset.productId;
            const custom_name = document.querySelector(".custom-name-input").value;
            const custom_image_input = document.querySelector(".custom-image-input");
            const custom_image = custom_image_input.files[0]; // Get the file from the input

            const is_gift = document.querySelector(".is-gift").value;
            const gifting_message = null;
            let color = "";
            let size = "";
            let sizeSelected = false;
            /* checking if any size is selected or not */
            document.querySelectorAll(".size-chip").forEach((chip) => {
                if (chip.parentElement.classList.contains("active")) {
                    color = chip.dataset.productColor;
                    size = chip.dataset.productSize;
                    sizeSelected = true;
                }
            });

            if (!sizeSelected) {
                return handleMessage(
                    "error",
                    "Uh Oh!",
                    "Please select a size first!"
                );
            }

            const response = await axios.post(route("buyer.add-to-cart"), {
                product_id: productId,
                quantity,
                color,
                size,
                custom_name,
                custom_image,
                is_gift,
                gifting_message,

            }, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            const { data: responseData } = response;
            const { status, message, data: messageData } = responseData;
            quantityBox.dataset.cartId = messageData.id;



            const productResponse = await axios.get(route('gtm.get-product', { productId }));
            const product = productResponse.data.data;
            dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
            const productPush = dataLayer.push({
                event: 'add_to_cart',
                ecommerce: {
                    currency: 'INR',
                    value: product.price_unit,
                    items: [
                        {
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
                        },
                    ],
                },
            });


            if (status === "success") {
                quantityBox.value = messageData.quantity;
                quantityBox.dataset.productStock = messageData.stock;
                quantityBox.dataset.cartId = messageData.id;
                quantityBox.dataset.productId = messageData.product_id;
                await getCartProducts();
                if (addVia === "buy-now") {
                    setTimeout(function () {
                        location.href = route("buyer.checkout");
                    }, 1000);
                }
                return handleMessage("success", "Yay!", message);
            } else {
                quantityBox.value = messageData.quantity;
                return handleMessage("error", "Something went wrong", message);
            }
        });
    });
}

/* 
  Cart product methods: [increaseCartQuantity, decreaseCartQuantity, removeCartProduct]
*/

document.querySelectorAll(".cart-productss").forEach((button) => {
    button.addEventListener("click", async (btn) => {
        console.log(btn.target);
        if (btn.target.classList.contains("qty-plus")) {
            return await increaseCartQuantity(btn);
        }

        if (btn.target.classList.contains("qty-minus")) {
            return await decreaseCartQuantity(btn);
        }

        if (btn.target.classList.contains("remove-cart-product")) {
            return await removeCartProduct(btn);
        }
    });
});

/* 
  Increasing cart product quantity
*/
async function increaseCartQuantity(btn) {
    const cartBtn = btn.target;
    const quantityBox = cartBtn.previousElementSibling;
    console.log(cartBtn.previousElementSibling);
    const maxStock = +quantityBox.dataset.productStock;
    const cartId = +quantityBox.dataset.cartId;
    const response = await axios.get(
        route("buyer.increase-quantity", [cartId, maxStock])
    );

    const { data: responseData } = response;
    const { status, message, data: messageData } = responseData;

    if (status === "success") {
        quantityBox.value = messageData.quantity;
        if (lastUrlSegment === "cart") {
            document.querySelector(
                `.total-${messageData.id}`
            ).textContent = `₹ ${(
                messageData.price_unit * messageData.quantity
            ).toFixed(2)}`;
        }
        await getCartProducts();
        // return handleMessage('success', 'Yay!', message);
    } else {
        return handleMessage("error", "Something went wrong", message);
    }
}

/* 
  Decreasing cart product quantity
*/
async function decreaseCartQuantity(btn) {
    const cartBtn = btn.target;
    const quantityBox = cartBtn.nextElementSibling;
    const cartId = +quantityBox.dataset.cartId;

    const response = await axios.get(route("buyer.reduce-quantity", [cartId]));

    const { data: responseData } = response;
    const { status, message, data: messageData } = responseData;

    if (status === "success") {
        quantityBox.value = messageData.quantity;
        if (lastUrlSegment === "cart") {
            document.querySelector(
                `.total-${messageData.id}`
            ).textContent = `₹ ${(
                messageData.price_unit * messageData.quantity
            ).toFixed(2)}`;
        }
        await getCartProducts();
        // return handleMessage('success', 'Success!', message);
    } else {
        return handleMessage("error", "Something went wrong", message);
    }
}

/* 
  Removing cart product quantity
*/
async function removeCartProduct(btn) {
    const cartBtn = btn.target;
    const cartId = +cartBtn.dataset.cartId;
    const productId = +cartBtn.dataset.productId;

    // console.log(cartId, cartBtn.parentElement.parentElement.remove());
    // return;
    const response = await axios.get(route("buyer.remove-from-cart", cartId));

    const { data: responseData } = response;
    const { status, message } = responseData;

    const productResponse = await axios.get(route('gtm.get-product', { productId }));
    const product = productResponse.data.data;

    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    const productPush = dataLayer.push({
        event: 'remove_from_cart',
        ecommerce: {
            currency: 'INR',
            value: product.price_unit,
            items: [
                {
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
                },
            ],
        },
    });


    if (status === "success") {
        cartBtn.parentElement.parentElement.remove();
        await getCartProducts();
        setTimeout(() => {
            location.reload();
        }, 500);
        return handleMessage("success", "Success!", message);
    } else {
        return handleMessage("error", "Something went wrong", message);
    }
}

document
    .querySelector(".product-search")
    .addEventListener("input", async (e) => {
        const search = e.target.value;

        if (search.trim().length === 0) {
            return (document.querySelector(".search-product-result").innerHTML =
                "");
        }

        const response = await axios.get(
            route("get-products-by-search", { search })
        );
        const products = response.data.data;

        document.querySelector(".search-product-result").innerHTML = products
            .map((product) => {
                return `
      <a target="_blank" href="${route("customer.product-detail", [
                    product.categorySlug,
                    product.slug,
                    product.sku,
                    product.uuid,
                ])}">
        <li class="list-group-item list-group-item-action border-0"
          tabindex="0" style="background-color: #f9cad7;">
          <div class="row">
            <div class="col-auto">
              <img src="${product.images[0]?.image}"
                style="width:50px;height:auto;" />
            </div>
            <div class="col-auto d-flex align-items-center">
              <p class="text-black-50 fw-bolder">${product.name}</p>
            </div>
          </div>
        </li>
      </a>
    `;
            })
            .join(" ");

        if (products.length === 0) {
            document.querySelector(".search-product-result").innerHTML = `
      <li class="list-group-item list-group-item-action border-0"
        tabindex="0" style="background-color: #f9cad7;">
        <div class="row">
          <div class="col-md-12 d-flex align-items-center justify-content-around">
            <p class="text-black-50 fw-bolder">No products found.</p>
          </div>
        </div>
      </li>
    `;
        }
    });

document
    .querySelector(".product-search-2")
    .addEventListener("input", async (e) => {
        const search = e.target.value;

        if (search.trim().length === 0) {
            return (document.querySelector(".search-product-result").innerHTML =
                "");
        }

        const response = await axios.get(
            route("get-products-by-search", { search })
        );
        const products = response.data.data;

        document.querySelector(".search-product-result-2").innerHTML = products
            .map((product) => {
                return `
      <a target="_blank" href="${route("customer.product-detail", [
                    product.categorySlug,
                    product.slug,
                    product.sku,
                    product.uuid,
                ])}" class="mt-1">
         <li class="list-group-item list-group-item-action border-0 rounded-pill" tabindex="0" style="background-color: #253B8E;">
          <div class="row">
            <div class="col-auto d-flex align-items-center">
              <p class="fw-bolder small text-white">${product.name.substring(
                    0,
                    50
                )} ...</p>
            </div>
          </div>
        </li>
      </a>
    `;
            })
            .join(" ");
    });

/* 
  Buy now button functionality
*/
if (
    document.querySelector(".buy-now") !== null &&
    document.querySelector(".buy-now") !== undefined
) {
    document.querySelector(".buy-now").addEventListener("click", (e) => {
        document.querySelectorAll(".add-to-cart-btn").forEach((button) => {
            button.dataset.clickFrom = "buy-now";
            button.click();
        });
    });
}



// save reviews

document.querySelectorAll('.rating-star').forEach((star, index, stars) => {
    star.addEventListener('click', async () => {
        // Get the data-star-rate attribute value
        const starRate = star.dataset.starRate;
        document.querySelector('.product_rating').value = starRate;

        // Loop through all stars
        for (let i = 0; i < stars.length; i++) {
            // Toggle the classes based on the clicked star and stars before it
            if (i <= index) {
                stars[i].classList.remove('far');
                stars[i].classList.add('fas');
            } else {
                stars[i].classList.remove('fas');
                stars[i].classList.add('far');
            }
        }

        console.log('Clicked star with rating:', starRate);
    });
});

document.querySelector('.review-form')?.addEventListener('submit', async (event) => {
    event.preventDefault();
    try {
        const formData = new FormData(event.target);

        const response = await axios.post(route('buyer.add-product-review'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        const { data: responseData } = response;
        const { status, message, data: messageData } = responseData;
        handleMessage('success', 'Success!', message);
        location.reload();
    } catch (error) {
        handleMessage('error', 'Error!', error.message);
        console.log(error, error.message);
    }
});























