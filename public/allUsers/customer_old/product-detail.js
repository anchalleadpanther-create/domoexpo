document.querySelectorAll(".color-element").forEach((element) => {
    element.addEventListener("click", (colorElement) => {
        const color = colorElement.target;
        const uuid = color.dataset.productUuid;
        const categorySlug = color.dataset.categorySlug;
        const productSlug = color.dataset.productSlug;
        const sku = color.dataset.productSku;
        location.href = route("customer.product-detail", [
            categorySlug,
            productSlug,
            sku,
            uuid,
        ]);
    });
});

// document.addEventListener('DOMContentLoaded', async () => {
//     try {
//         const productId = document.querySelector(`input[name="product_id"]`).value;
//         // alert(productId)
//         const response = await axios.get(route('gtm.get-product', { productId }));
//         // console.log(response)
//         const product = response.data.data;
//         dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
//         const productPush = dataLayer.push({
//             event: 'view_item',
//             ecommerce: {
//                 currency: document.querySelector('.selected-currency').value,
//                 value: product.price_unit,
//                 items: [
//                     {
//                         item_id: product.sku,
//                         item_name: product.name,
//                         affiliation: 'Google Merchandise Store',
//                         coupon: '',
//                         discount: product.discount,
//                         index: 0,
//                         item_brand: product.brand?.brand_name,
//                         item_category:
//                             product.mapped_categories[0] !== undefined
//                                 ? product.mapped_categories[0]?.category_name
//                                 : '',
//                         item_category2:
//                             product.mapped_categories[1] !== undefined
//                                 ? product.mapped_categories[1]?.category_name
//                                 : '',
//                         item_category3:
//                             product.mapped_categories[2] !== undefined
//                                 ? product.mapped_categories[2]?.category_name
//                                 : '',
//                         item_category4:
//                             product.mapped_categories[3] !== undefined
//                                 ? product.mapped_categories[3]?.category_name
//                                 : '',
//                         item_category5:
//                             product.mapped_categories[4] !== undefined
//                                 ? product.mapped_categories[4]?.category_name
//                                 : '',
//                         item_list_id: 'related_products',
//                         item_list_name: 'Related Products',
//                         item_variant: product.type_value_id_1.type_value,
//                         location_id: 'ChIJIQBpAG2ahYAR_6128GcTUEo',
//                         price: product.price_unit,
//                         quantity: 1,
//                     },
//                 ],
//             },
//         });

//         dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
//      productPush = dataLayer.push({
//         event: 'view_cart',
//         ecommerce: {
//             currency: 'INR',//document.querySelector('.selected-currency').value,
//             value: products.reduce((total, product) => {
//                 return total + product.price;
//             }, 0),
//             items: products,
//         },
//     });
//     } catch (error) {
//         console.log(error);
//     }
// });

document.addEventListener("DOMContentLoaded", async () => {
    try {
        const productId = document.querySelector(
            `input[name="product_id"]`
        ).value;
        const response = await axios.get(
            route("gtm.get-product", { productId })
        );
        const product = response.data.data;
        dataLayer.push({ ecommerce: null }); // Clear the previous ecommerce object.
        const productPush = dataLayer.push({
            event: "view_item",
            ecommerce: {
                currency: "INR",
                value: product.price_unit,
                items: [
                    {
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
                    },
                ],
            },
        });
    } catch (error) {
        console.log(error);
    }
});

document.addEventListener("DOMContentLoaded", () => {
    document
        .querySelector("body")
        .classList.add("template-product", "product-layout1");

    const sizes = [...document.querySelectorAll(".size-chip")];
    const colors = [...document.querySelectorAll(".color-chip")];

    if (sizes.length === 1 && sizes[0].dataset.productSize === "Free Size") {
        sizes[0].click();
        sizes[0].parentElement.parentElement.parentElement.classList.add(
            "d-none"
        );
    }

    if (colors.length === 1) {
        colors[0].parentElement.parentElement.classList.add("d-none");
    }

    $(function () {
        var $pswp = $(".pswp")[0],
            image = [],
            getItems = function () {
                var items = [];
                $(".lightboximages a").each(function () {
                    var $href = $(this).attr("href"),
                        $size = $(this).data("size").split("x"),
                        item = {
                            src: $href,
                            w: $size[0],
                            h: $size[1],
                        };
                    items.push(item);
                });
                return items;
            };
        var items = getItems();

        $.each(items, function (index, value) {
            image[index] = new Image();
            image[index].src = value["src"];
        });
        $(".prlightbox").on("click", function (event) {
            event.preventDefault();

            var $index = $(".active-thumb").parent().attr("data-slick-index");
            $index++;
            $index = $index - 1;

            var options = {
                index: $index,
                bgOpacity: 0.7,
                showHideOpacity: true,
            };
            var lightBox = new PhotoSwipe(
                $pswp,
                PhotoSwipeUI_Default,
                items,
                options
            );
            lightBox.init();
        });
    });
});

document.querySelectorAll(".size-chip").forEach((sizes) => {
    sizes.addEventListener("click", async (el) => {
        const size = el.target;
        const uuid = size.dataset.productUuid;
        const response = await axios.get(
            route("customer.get-variant-detail", uuid)
        );
        const { data: responseData } = response;
        const product = responseData.data.product;
        const productPricingTemplate = responseData.data.pricingTemplate;

        document.querySelector(".product-price").innerHTML =
            productPricingTemplate;

        document.querySelector(".stock-info").innerHTML = `
    ${
        product.stock === 0
            ? `
    <span class="d-flex-center stockLbl outstock">
      <i class="icon an an-times-cil"></i>
      <span>Sold out</span>
    </span>
    `
            : ``
    }
    ${
        product.stock > 0
            ? `
    <span class="d-flex-center stockLbl instock">
      <i class="icon an an-check-cil"></i>
      <span> In stock</span>
    </span>
    `
            : ``
    }
    `;

        if (product.stock === 0) {
            document.querySelector(".add-to-cart-btn").classList.add("d-none");
            document.querySelector(".buy-now").classList.add("d-none");
        } else {
            document
                .querySelector(".add-to-cart-btn")
                .classList.remove("d-none");
            document.querySelector(".buy-now").classList.remove("d-none");
        }

        document.querySelector(".add-to-cart-btn").dataset.productId =
            product.id;
        /* 
      when a new size is selected we 
      unhide the add to cart button & 
      hide the quantity box
    */
        if (
            document
                .querySelector(".action-btn-div")
                .classList.contains("d-none")
        ) {
            document
                .querySelector(".action-btn-div")
                .classList.remove("d-none");
            document.querySelector(".action-btn-div").classList.add("d-flex");
            document
                .querySelector(".cart-quantity-div")
                .classList.add("d-none");
            document
                .querySelector(".cart-quantity-div")
                .classList.remove("d-flex");
        }
    });
});

if (
    document.querySelector(".product-detail-wishlist-btn") !== null &&
    document.querySelector(".product-detail-wishlist-btn") !== undefined
) {
    document
        .querySelector(".product-detail-wishlist-btn")
        .addEventListener("click", async (btn) => {
            const product_id = +btn.target.dataset.productId;
            const response = await axios.post(route("buyer.add-to-wishlist"), {
                product_id,
            });
            const { data: responseData } = response;
            const { status, message, data: messageData } = responseData;
            if (status === "success") {
                if (btn.target.innerHTML.includes("an-heart-l")) {
                    btn.target.innerHTML = `<i class="icon an an-heart"></i>Wishlist`;
                } else {
                    btn.target.innerHTML = `<i class="icon an an-heart-l"></i>Wishlist`;
                }
                document
                    .querySelectorAll(".wishlist-count")
                    .forEach((element) => {
                        element.textContent = messageData[0];
                    });
            }

            const productResponse = await axios.get(
                route("gtm.get-product", { productId: product_id })
            );
            const product = productResponse.data.data;
            dataLayer.push({ ecommerce: null });
            const productPush = dataLayer.push({
                event: "add_to_wishlist",
                ecommerce: {
                    currency: "INR",
                    value: product.price_unit,
                    items: [
                        {
                            item_id: product.sku,
                            item_name: product.name,
                            affiliation: "Google Merchandise Store",
                            coupon: "",
                            discount: product.discount,
                            index: 0,
                            item_brand: product.brand.brand_name,
                            item_category:
                                product.mapped_categories[0] !== undefined
                                    ? product.mapped_categories[0]
                                          ?.category_name
                                    : "",
                            item_category2:
                                product.mapped_categories[1] !== undefined
                                    ? product.mapped_categories[1]
                                          ?.category_name
                                    : "",
                            item_category3:
                                product.mapped_categories[2] !== undefined
                                    ? product.mapped_categories[2]
                                          ?.category_name
                                    : "",
                            item_category4:
                                product.mapped_categories[3] !== undefined
                                    ? product.mapped_categories[3]
                                          ?.category_name
                                    : "",
                            item_category5:
                                product.mapped_categories[4] !== undefined
                                    ? product.mapped_categories[4]
                                          ?.category_name
                                    : "",
                            item_list_id: "related_products",
                            item_list_name: "Related Products",
                            item_variant: product.type_value_id_1.type_value,
                            location_id: "ChIJIQBpAG2ahYAR_6128GcTUEo",
                            price: product.price_unit,
                            quantity: 1,
                        },
                    ],
                },
            });
        });
}
