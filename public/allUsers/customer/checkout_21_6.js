import { processRazorPay, processPayPal } from "./paymentMethods.js";
import { handleMessage } from "./helpers.js";
let getCurrentCurrency = "";
let walletCharges = 0;
let productIds = [];

document.addEventListener("DOMContentLoaded", async () => {
    productIds = await getCartPageProducts();
    const products = [];
    const products2 = [];
    for (let index = 0; index < productIds.length; index++) {
        const productResponse = await axios.get(
            route("gtm.get-product", { productId: productIds[index] })
        );
        const product = productResponse.data.data;
        products.push({
            item_id: product.sku,
            item_name: product.name,
            affiliation: "Google Merchandise Store",
            coupon: "",
            discount: product.discount,
            index: 0,
            item_brand: product.brand?.brand_name,
            item_category:
                product.mapped_categories[0] !== undefined
                    ? product.mapped_categories[0]?.category_name
                    : "",
            item_category2:
                product.mapped_categories[1] !== undefined
                    ? product.mapped_categories[1]?.category_name
                    : "",
            item_category3:
                product.mapped_categories[2] !== undefined
                    ? product.mapped_categories[2]?.category_name
                    : "",
            item_category4:
                product.mapped_categories[3] !== undefined
                    ? product.mapped_categories[3]?.category_name
                    : "",
            item_category5:
                product.mapped_categories[4] !== undefined
                    ? product.mapped_categories[4]?.category_name
                    : "",
            item_list_id: "related_products",
            item_list_name: "Related Products",
            item_variant: product.type_value_id_1.type_value,
            location_id: "ChIJIQBpAG2ahYAR_6128GcTUEo",
            price: product.price_unit,
            quantity: 1,
        });
        products2.push({
            item_id: product.sku,
            item_name: product.name,
            affiliation: "Google Merchandise Store",
            coupon: "",
            discount: product.discount,
            index: 0,
            item_brand: product.brand?.brand_name,
            item_category:
                product.mapped_categories[0] !== undefined
                    ? product.mapped_categories[0]?.category_name
                    : "",
            item_category2:
                product.mapped_categories[1] !== undefined
                    ? product.mapped_categories[1]?.category_name
                    : "",
            item_category3:
                product.mapped_categories[2] !== undefined
                    ? product.mapped_categories[2]?.category_name
                    : "",
            item_category4:
                product.mapped_categories[3] !== undefined
                    ? product.mapped_categories[3]?.category_name
                    : "",
            item_category5:
                product.mapped_categories[4] !== undefined
                    ? product.mapped_categories[4]?.category_name
                    : "",
            item_list_id: "related_products",
            item_list_name: "Related Products",
            item_variant: product.type_value_id_1.type_value,
            location_id: "ChIJIQBpAG2ahYAR_6128GcTUEo",
            price: product.price_unit,
            quantity: 1,
        });
    }

    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "begin_checkout",
        ecommerce: {
            currency: "INR",
            value: products.reduce((total, product) => {
                return total + product.price;
            }, 0),
            items: products,
        },
    });

    dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
    dataLayer.push({
        event: "add_shipping_info",
        ecommerce: {
            currency: "INR",
            value: products.reduce((total, product) => {
                return total + product.price;
            }, 0),
            items: products2,
        },
    });

    document.querySelectorAll(".btn-minicart").forEach((btn) => {
        btn.dataset.bsToggle = "";
        btn.dataset.bsTarget = "";
    });

    document
        .querySelector(".checkout-form")
        .addEventListener("submit", async (e) => {
            e.preventDefault();
            await checkPaymentType();
        });
});

document.addEventListener("DOMContentLoaded", async () => {
    // await getCartPageProducts();
    document.querySelectorAll(".btn-minicart").forEach((btn) => {
        btn.dataset.bsToggle = "";
        btn.dataset.bsTarget = "";
    });

    document
        .querySelector(".checkout-form")
        .addEventListener("submit", async (e) => {
            e.preventDefault();
            await checkPaymentType();
        });
});




document.addEventListener("DOMContentLoaded", function() {
    // Select all radio buttons with the specified class
    var radios = document.querySelectorAll('.checkout-selected-shipping-address');

    // Check if any radio is already checked on page load and call the function with its value
    radios.forEach(radio => {
        if (radio.checked) {
            getTotalShippingCharge(radio.value);
        }
    });

    // Attach a change event listener to each radio
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Check if this radio button is now checked
            if (this.checked) {
                // console.log('Radio with value ' + this.value + ' has been selected');
                // Call your function here with the new value
                getTotalShippingCharge(this.value);
            }
        });
    });
});

async function getTotalShippingCharge(shippingAddressId) {
    document.querySelector(".checkout-total-shipping-charge").textContent = `Loading...`;
    // Log to indicate function is called and display the passed address
    // console.log('getTotalShippingCharge called with value:', shippingAddressId);
    
    const response = await axios.get(route("buyer.get-total-shipping-charge-using-fship", { shippingAddressId: shippingAddressId }));
    const { data: responseData } = response;
    const { status, message, data: messageData } = responseData;
    
    console.log(messageData);
    
    document.querySelector(".checkout-total-shipping-charge").textContent =
    `${getCurrentCurrency.currency} ${(messageData.shippingCharge * getCurrentCurrency.con_ratio).toFixed(2)}`;
    
    const grandTotal = document.querySelector(".checkout-grand-total").dataset.dummyTotal/100;
    const newGrandTotal =  grandTotal + messageData.shippingCharge;
                            
     document.querySelector(".checkout-grand-total").textContent =  `${getCurrentCurrency.currency} ${newGrandTotal.toFixed(2)} `;
     document.querySelector(".checkout-grand-total").dataset.total =  newGrandTotal * 100;
    
}



async function checkPaymentType() {
    const paymentMethod = document.querySelector(
        `input[name="payment_method"]:checked`
    ).value;
    if (paymentMethod === "RazorPay") {
        const payment = await processRazorPay();
    } else if (paymentMethod === "PayPal") {
        const payment = await processPayPal();
    } else if (paymentMethod === "PhonePay") {
        // const payment = await processPhonePay();
        document.querySelector(".checkout-form").submit();
    } else if (paymentMethod === "Cash on Delivery") {
        document.querySelector(".checkout-form").submit();
    } else if (paymentMethod === "PhonePay") {
        // const payment = await processPhonePay();
        document.querySelector(".checkout-form").submit();
    } 

    paymentMethod.addEventListener("change", async (method) => {
        const paymentMethod = method.target.value;
        const products = [];
        
        for (let index = 0; index < productIds.length; index++) {
            const productResponse = await axios.get(
                route("gtm.get-product", { productId: productIds[index] })
            );
            const product = productResponse.data.data;
            products.push({
                item_id: product.sku,
                item_name: product.name,
                affiliation: "Google Merchandise Store",
                coupon: "",
                discount: product.discount,
                index: 0,
                item_brand: product.brand.brand_name,
                item_category:
                    product.mapped_categories[0] !== undefined
                        ? product.mapped_categories[0]?.category_name
                        : "",
                item_category2:
                    product.mapped_categories[1] !== undefined
                        ? product.mapped_categories[1]?.category_name
                        : "",
                item_category3:
                    product.mapped_categories[2] !== undefined
                        ? product.mapped_categories[2]?.category_name
                        : "",
                item_category4:
                    product.mapped_categories[3] !== undefined
                        ? product.mapped_categories[3]?.category_name
                        : "",
                item_category5:
                    product.mapped_categories[4] !== undefined
                        ? product.mapped_categories[4]?.category_name
                        : "",
                item_list_id: "related_products",
                item_list_name: "Related Products",
                item_variant: product.type_value_id_1.type_value,
                location_id: "ChIJIQBpAG2ahYAR_6128GcTUEo",
                price: product.price_unit,
                quantity: 1,
            });
        }

        dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
        const productPush = dataLayer.push({
            event: "add_payment_info",
            ecommerce: {
                currency: "INR",
                value: products.reduce((total, product) => {
                    return total + product.price;
                }, 0),
                coupon: "",
                payment_type: paymentMethod,
                items: products,
            },
        });
    });
}

export async function getCartPageProducts() {
    const response = await axios.get(route("buyer.get-cart-products"));
    const { data: responseData } = response;
    const { status, message, data: messageData } = responseData;
    const products = messageData.cartProducts;
    let grandTotal = messageData.grandTotal;
    const codAvailable = messageData.codAvailable;
    const codAvailabilityAmount = messageData.codAvailabilityAmount;
    let couponApplied = false;
    let couponAmount = 0;  
    let couponCode = "";
    let couponPercent = 0;
    grandTotal += messageData.shippingCharge;

    // if (messageData.shippingCharge === 0) {
    //     document.querySelector(".shipping-charges").classList.add("d-none");
    // }

    getCurrentCurrency = messageData.getCurrentCurrency;

    let templateTwo = ``;
    templateTwo = products
        .map((product) => {
            return `
      <tr>
        <td class="thumbImg">
          <a href="javascript:;" class="thumb d-inline-block">
            <img class="cart__image"
              src="${product.productImage}"
              alt="${product.name}" width="80" />
          </a>
        </td>
        <td class="text-start">
          <a href="javascript:;">${product.name}</a>
          <div class="cart__meta-text">
            Color: ${product.color}<br>Size: ${product.size}<br/>
            ${
                product.customName.length > 0
                    ? `Custom Name: ${product.customName}`
                    : ``
            }
          </div>
        </td>
        <td>${getCurrentCurrency.currency} ${(
                product.sellingPrice * getCurrentCurrency.con_ratio
            ).toFixed(2)}</td>
        <td>${product.cartQuantity}</td>
        <td class="fw-500">${getCurrentCurrency.currency} ${(
                product.sellingPrice *
                product.cartQuantity *
                getCurrentCurrency.con_ratio
            ).toFixed(2)}</td>
      </tr >
      `;
        })
        .join("");

    document.querySelector(".checkout-products").innerHTML = templateTwo;
    document.querySelector(".checkout-total-shipping-charge").textContent = `${
        getCurrentCurrency.currency
    } ${(messageData.shippingCharge * getCurrentCurrency.con_ratio).toFixed(2)}`;
    
    document.querySelector(".checkout-grand-total").textContent = `${
        getCurrentCurrency.currency
    } ${(grandTotal * getCurrentCurrency.con_ratio).toFixed(2)}`;
    
    document.querySelector(".checkout-grand-total").dataset.total =
        grandTotal * 100;
    document.querySelector(".checkout-grand-total").dataset.dummyTotal =
        (grandTotal * getCurrentCurrency.con_ratio).toFixed(2) * 100;

    products.forEach((product) => {
        if (product.couponUsed) {
            couponApplied = true;
            couponAmount += product.couponAmount * product.cartQuantity;
            couponCode = product.couponCode;
            couponPercent = product.couponPercent;
        }
    });

    if (couponApplied) {
        document.querySelector(".coupon-div").classList.add("d-none");
        document.querySelector(".offers-div").classList.add("d-none");
        document.querySelector(".shipping-charges").insertAdjacentHTML(
            "afterend",
            `
      <tr class="">
        <td colspan="3" class="text-end fw-bolder">
        <a title="Remove Coupon" class="float-start text-danger" href="${route(
            "buyer.remove-coupon"
        )}"><i class="icon an an-times-cil"></i></a>
        Coupon Discount (${couponCode} ${couponPercent} % OFF)</td>
        <td colspan="2" class="fw-bolder">- ${getCurrentCurrency.currency} ${(
                couponAmount * getCurrentCurrency.con_ratio
            ).toFixed(2)}</td>
      </tr>
      `
        );

        const dummyGrandTotal =
            document.querySelector(".checkout-grand-total").dataset.dummyTotal /
            100;
        const grandTotalAfterCoupon =
            (dummyGrandTotal - couponAmount) * getCurrentCurrency.con_ratio;
        document.querySelector(".checkout-grand-total").textContent = `${
            getCurrentCurrency.currency
        } ${grandTotalAfterCoupon.toFixed(2)} `;
        document.querySelector(".checkout-grand-total").dataset.total =
            grandTotalAfterCoupon * 100;
        document.querySelector(".checkout-grand-total").dataset.dummyTotal =
            grandTotalAfterCoupon.toFixed(2) * 100;
        document.querySelector(".gift-card-div").classList.add("d-none");
        document.querySelector(".wallet-div").classList.add("d-none");

        if (grandTotalAfterCoupon <= 0) {
            document.querySelector(".payment-methods").classList.add("d-none");
        }
    }

    if (!codAvailable && getCurrentCurrency.currency === "INR") {
        document.querySelector(".cod-div").remove();
        document.querySelector(".online").checked = true;
        document.querySelector(
            ".warning-messages"
        ).innerHTML = `<span>Place order above ${
            getCurrentCurrency.currency
        } ${codAvailabilityAmount.toFixed(2)} to enable COD.</span>`;
    }
    return products.map((product) => product.productId);
}

if (
    document.querySelector(".wallet-btn") !== null &&
    document.querySelector(".wallet-btn") !== undefined
) {
    document.querySelector(".wallet-btn").addEventListener("change", (e) => {
        const walletCharges = +e.target.value;
        const grandTotal = +document.querySelector(".checkout-grand-total")
            .dataset.dummyTotal;
        if (e.target.checked) {
            document.querySelector(".shipping-charges").insertAdjacentHTML(
                "afterend",
                `
      <tr class="wallet-charges">
        <td colspan="3" class="text-end fw-bolder">Wallet </td>
        <td colspan="2" class="fw-bolder">- ${getCurrentCurrency.currency} ${walletCharges}</td>
      </tr >
    `
            );
            const newGrandTotal = grandTotal / 100 - walletCharges;
            document.querySelector(".checkout-grand-total").textContent = `${getCurrentCurrency.currency} ${newGrandTotal.toFixed(2)} `;
            
            document.querySelector(".checkout-grand-total").dataset.total = newGrandTotal * 100;
            if (newGrandTotal <= 0) {
                document
                    .querySelector(".payment-methods")
                    .classList.add("d-none");
            }
            document.querySelector(".gift-card-div").classList.add("d-none");
            document.querySelector(".coupon-div").classList.add("d-none");
        } else {
            document.querySelector(".wallet-charges").remove();
            document.querySelector(".checkout-grand-total").textContent = `${
                getCurrentCurrency.currency
            } ${(grandTotal.toFixed(2) / 100).toFixed(2)} `;
            document.querySelector(".checkout-grand-total").dataset.total =
                grandTotal;
            if (grandTotal <= 0) {
                document
                    .querySelector(".payment-methods")
                    .classList.add("d-none");
            }
            document
                .querySelector(".payment-methods")
                .classList.remove("d-none");
            document.querySelector(".gift-card-div").classList.remove("d-none");
            document.querySelector(".coupon-div").classList.remove("d-none");
        }
    });
}

if (
    document.querySelector(".coupon-btn") !== null &&
    document.querySelector(".coupon-btn") !== undefined
) {
    document
        .querySelector(".coupon-btn")
        .addEventListener("click", async (e) => {
            e.preventDefault();
            const code = document.querySelector(`input[name="code"]`).value;
            try {
                const response = await axios.get(
                    route("buyer.apply-coupon", { code })
                );
                const { data } = response;
                const couponAmount = +data.data.couponAmount;
                const couponCode = data.data.couponCode;
                const couponPercent = +data.data.couponPercent;

                document.querySelector(".shipping-charges").insertAdjacentHTML(
                    "afterend",
                    `
      <tr class="" >
       <td colspan="3" class="text-end fw-bolder">
        <a title="Remove Coupon" class="float-start text-danger" href="${route(
            "buyer.remove-coupon"
        )}"><i class="icon an an-times-cil"></i></a>
        Coupon Discount (${couponCode} ${couponPercent} % OFF)</td>
        <td colspan="2" class="fw-bolder">- ${
            getCurrentCurrency.currency
        } ${couponAmount.toFixed(2)}</td>
      </tr >
    `
                );

                const grandTotal = +document.querySelector(
                    ".checkout-grand-total"
                ).dataset.dummyTotal;
                const newGrandTotal = grandTotal / 100 - couponAmount;
                document.querySelector(
                    ".checkout-grand-total"
                ).textContent = `${
                    getCurrentCurrency.currency
                } ${newGrandTotal.toFixed(2)} `;
                document.querySelector(".checkout-grand-total").dataset.total =
                    (newGrandTotal * 100).toFixed(2);
                document.querySelector(
                    ".checkout-grand-total"
                ).dataset.dummyTotal = (newGrandTotal * 100).toFixed(2);
                document.querySelector(".coupon-div").classList.add("d-none");
                document
                    .querySelector(".gift-card-div")
                    .classList.add("d-none");
                document.querySelector(".wallet-div").classList.add("d-none");
                if (newGrandTotal <= 0) {
                    document
                        .querySelector(".payment-methods")
                        .classList.add("d-none");
                }
            } catch (error) {
                handleMessage("error", "Uh Oh!", error.response.data.message);
            }
        });
}

let otpId = null;
if (
    document.querySelector(".place-order-btn") !== null &&
    document.querySelector(".place-order-btn") !== undefined
) {
    document
        .querySelector(".place-order-btn")
        .addEventListener("click", async (event) => {
            event.preventDefault();
            if (
                document.querySelector('input[name="payment_method"]:checked')
                    .value === "Cash on Delivery"
            ) {
                document.querySelector(".checkout-form").submit();
                // try {
                //   event.target.textContent = 'Verify OTP!';
                //   event.target.setAttribute('disabled', true);
                //   document.querySelector('.cod-otp-div').classList.remove('d-none');
                //   const response = await axios.get(route('buyer.send-otp-for-order'));
                //   const { message, data } = response;
                //   otpId = data.data.otpId;

                //   setTimeout(() => { location.reload() }, 300000);

                //   return handleMessage('success', 'Sent!', data.message);
                // } catch (error) {
                //   if (error.hasOwnProperty('response')) {
                //     return handleMessage('error', 'Uh Oh!', error.response.data.message);
                //   }
                //   if (typeof error === 'string') {
                //     return handleMessage('error', 'Uh Oh!', error);
                //   }
                // }
            } else {
                await checkPaymentType();
            }
        });
}

if (
    document.querySelector(".cod-verify-btn") !== null &&
    document.querySelector(".cod-verify-btn") !== undefined
) {
    document
        .querySelector(".cod-verify-btn")
        .addEventListener("click", async (event) => {
            try {
                const otp = +document.querySelector('input[name="otp"]').value;
                const response = await axios.get(
                    route(`buyer.check-otp-for-order`, { id: otpId, otp })
                );
                const { data } = response;
                event.target.textContent = "Verified!";
                document.querySelector(".place-order-btn").textContent =
                    "Placing order!";
                handleMessage("success", "Sent!", data.message);
                return await checkPaymentType();
            } catch (error) {
                if (error.hasOwnProperty("response")) {
                    return handleMessage(
                        "error",
                        "Uh Oh!",
                        error.response.data.message
                    );
                }
                if (typeof error === "string") {
                    return handleMessage("error", "Uh Oh!", error);
                }
            }
        });
}

if (
    document.querySelector(".guest-place-order-btn") !== null &&
    document.querySelector(".guest-place-order-btn") !== undefined
) {
    document
        .querySelector(".guest-place-order-btn")
        .addEventListener("click", async (event) => {
            event.target.textContent = "Please wait...";
            event.target.setAttribute("disabled", true);
            try {
                const formData = new FormData(
                    document.querySelector(".checkout-form")
                );
                await axios.post(
                    route("buyer.save-address-as-guest"),
                    formData
                );
                return location.reload();
            } catch (error) {
                event.target.textContent = "Continue...";
                event.target.removeAttribute("disabled");
                if (error.hasOwnProperty("response")) {
                    return handleMessage(
                        "error",
                        "Uh Oh!",
                        error.response.data.message
                    );
                }
                if (typeof error === "string") {
                    return handleMessage("error", "Uh Oh!", error);
                }
            }
        });
}

if (
    document.querySelector(".gift-card-btn") !== null &&
    document.querySelector(".gift-card-btn") !== undefined
) {
    document
        .querySelector(".gift-card-btn")
        .addEventListener("click", async (e) => {
            e.preventDefault();
            const code = document
                .querySelector(`input[name="gift_card"]`)
                .value.trim();
            try {
                const response = await axios.get(
                    route("buyer.apply-gift-card", { code })
                );
                const { data } = response;
                const giftCardAmount = +data.data.giftCardAmount;
                const giftCardCode = data.data.giftCardCode;
                let usedGiftCardAmount = giftCardAmount;

                const grandTotal = +document.querySelector(
                    ".checkout-grand-total"
                ).dataset.dummyTotal;
                let newGrandTotal = grandTotal / 100 - giftCardAmount;
                newGrandTotal = newGrandTotal <= 0 ? 0 : newGrandTotal;
                console.log(newGrandTotal, newGrandTotal < 0);

                if (newGrandTotal <= 0) {
                    const remaniningAmount = giftCardAmount - grandTotal / 100;
                    usedGiftCardAmount = giftCardAmount - remaniningAmount;
                    document
                        .querySelector(".payment-methods")
                        .classList.add("d-none");
                }

                document.querySelector(
                    'input[name="used_gift_card_amount"]'
                ).value = usedGiftCardAmount;

                document.querySelector(".shipping-charges").insertAdjacentHTML(
                    "afterend",
                    `
      <tr class="">
       <td colspan="3" class="text-end fw-bolder">
       <a title="Remove Gift Card" class="float-start text-danger" href="javascript:;" onclick="location.reload()">
        <i class="icon an an-times-cil"></i>
       </a>
        Gift Card Discount (${giftCardCode})</td>
        <td colspan="2" class="fw-bolder">- ${getCurrentCurrency.currency} ${
                        newGrandTotal === 0
                            ? (grandTotal / 100).toFixed(2)
                            : giftCardAmount.toFixed(2)
                    }</td>
      </tr >
    `
                );

                document.querySelector(
                    ".checkout-grand-total"
                ).textContent = `${
                    getCurrentCurrency.currency
                } ${newGrandTotal.toFixed(2)} `;
                document.querySelector(".checkout-grand-total").dataset.total =
                    (newGrandTotal * 100).toFixed(2);
                document.querySelector(
                    ".checkout-grand-total"
                ).dataset.dummyTotal = (newGrandTotal * 100).toFixed(2);
                document
                    .querySelector(".gift-card-div")
                    .classList.add("d-none");
                document.querySelector(".coupon-div").classList.add("d-none");
                document.querySelector(".wallet-div").classList.add("d-none");
            } catch (error) {
                handleMessage("error", "Uh Oh!", error.response.data.message);
            }
        });
}

document.querySelectorAll(`input[name="payment_method"]`).forEach((methods) => {
    methods.addEventListener("change", async (method) => {
        const paymentMethod = method.target.value;
        const products = [];
        for (let index = 0; index < productIds.length; index++) {
            const productResponse = await axios.get(
                route("gtm.get-product", { productId: productIds[index] })
            );
            const product = productResponse.data.data;
            products.push({
                item_id: product.sku,
                item_name: product.name,
                affiliation: "Google Merchandise Store",
                coupon: "",
                discount: product.discount,
                index: 0,
                item_brand: product.brand.brand_name,
                item_category:
                    product.mapped_categories[0] !== undefined
                        ? product.mapped_categories[0]?.category_name
                        : "",
                item_category2:
                    product.mapped_categories[1] !== undefined
                        ? product.mapped_categories[1]?.category_name
                        : "",
                item_category3:
                    product.mapped_categories[2] !== undefined
                        ? product.mapped_categories[2]?.category_name
                        : "",
                item_category4:
                    product.mapped_categories[3] !== undefined
                        ? product.mapped_categories[3]?.category_name
                        : "",
                item_category5:
                    product.mapped_categories[4] !== undefined
                        ? product.mapped_categories[4]?.category_name
                        : "",
                item_list_id: "related_products",
                item_list_name: "Related Products",
                item_variant: product.type_value_id_1.type_value,
                location_id: "ChIJIQBpAG2ahYAR_6128GcTUEo",
                price: product.price_unit,
                quantity: 1,
            });
        }

        dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
        const productPush = dataLayer.push({
            event: "add_payment_info",
            ecommerce: {
                currency: "INR",
                value: products.reduce((total, product) => {
                    return total + product.price;
                }, 0),
                coupon: "",
                payment_type: paymentMethod,

                items: products,
            },
        });
    });
});

document.querySelectorAll(".apply-selected-coupon-btn").forEach((btns) => {
    btns.addEventListener("click", (btn) => {
        const code = btn.target.dataset.code;
        document.querySelector(`input[name="code"]`).value = code;
        document.querySelector(".coupon-btn").click();
        document.querySelector(".offers-div").classList.add("d-none");
    });
});
