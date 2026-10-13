"use strict";
import { handleMessage } from "../customer/helpers.js";

let actionStatus = [
    "approved",
    "packed",
    "shipped",
    "delivered",
    "cancelled",
    "return",
];

if (
    document.querySelector(".change-order-status") !== null &&
    document.querySelector(".change-order-status") !== undefined
) {
    document
        .querySelector(".change-order-status")
        .addEventListener("click", async () => {
            let anyOrderSelected = false;
            const orderStatus = document.querySelector(".order-status").value;
            let ids = [];

            document.querySelectorAll(".order-checkboxes").forEach((order) => {
                if (order.checked) {
                    anyOrderSelected = true;
                }
            });
            if (!anyOrderSelected) {
                return handleMessage(
                    "warning",
                    "Warning!",
                    "Please select at least one order."
                );
            }
            if (orderStatus.length === 0) {
                return handleMessage(
                    "warning",
                    "Warning!",
                    "Please select an order status"
                );
            }

            const orderType = document.querySelector(".order-type").value;
            if (orderType === "packed" && orderStatus === "3") {
                const length = document.querySelector(`input[name="length"]`);
                const height = document.querySelector(`input[name="height"]`);
                const width = document.querySelector(`input[name="width"]`);
                const weight = document.querySelector(`input[name="weight"]`);
                if (
                    length.value.trim().length === 0 ||
                    height.value.trim().length === 0 ||
                    width.value.trim().length === 0 ||
                    weight.value.trim().length === 0
                ) {
                    return handleMessage(
                        "warning",
                        "Warning!",
                        "All dimensions fields are required."
                        //  "All dimensions fields are required. length"+length.value.trim()+"height "+ height.value.trim() + "width " + width.value.trim() + "weight " +weight.value.trim() 
                    );
                }
                else if(
                    length.value.trim() > 15 ||
                    height.value.trim() > 15 ||
                    width.value.trim() > 15  ||
                    weight.value.trim() > 15 
                ){
                    return handleMessage(
                        "warning",
                        "Warning!",
                        "Length,Height,Width not more then 15 CMS and weight not more then 15 KG."
                    );
                }
            }

            if (actionStatus.includes(orderType)) {
                document
                    .querySelectorAll(".order-checkboxes:checked")
                    .forEach((order) => ids.push(+order.dataset.cartId));
                const checkIfAllOrdersAreOfSameIds = ids.every(
                    (val, i, arr) => val === arr[0]
                );

                if (!checkIfAllOrdersAreOfSameIds) {
                    return handleMessage(
                        "warning",
                        "Warning!",
                        "Please select orders of the same order id type."
                    );
                }

                document.querySelector(".hidden-order-status").value =
                    orderStatus;
                document.querySelector(".change-order-status-form").submit();
                return true;
            }

            document.querySelector(".hidden-order-status").value = orderStatus;
            document.querySelector(".change-order-status-form").submit();
            return true;
        });
}

if (
    document.querySelector(".order-status") !== null &&
    document.querySelector(".order-status") !== undefined
) {
    $(".order-status").on("select2:select", function (e) {
        const type = e.params.data.text;
        if (type === "Ready to Ship Order") {
            document
                .querySelectorAll(".shipping-measurement")
                .forEach((element) => {
                    element.classList.remove("d-none");
                });
        }
    });
}

if (
    document.querySelector(".admin-order-comment") !== null &&
    document.querySelector(".admin-order-comment") !== undefined
) {
    document.querySelectorAll(".admin-order-comment").forEach((btn) => {
        btn.addEventListener("click", (commentBtn) => {
            const id = +commentBtn.target.dataset.id;
            const comment = commentBtn.target.dataset.comment;
            document.querySelector(`textarea[name='admin_comment']`).value =
                comment;
            document
                .querySelector(".admin-comment-form")
                .setAttribute(
                    "action",
                    route("admin.add-order-comment", { id })
                );
        });
    });
}
