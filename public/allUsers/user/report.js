async function getProductCategories(event) {
    const className = event.dataset.class;
    const categoryId = +event.value;
    try {
        const response = await axios.get(route("api.get-category", categoryId));
        console.log(response);
    } catch (error) {
        if (error.hasOwnProperty("response")) {
            console.log(error.response.data.message);
        } else {
            console.log(error.message);
        }
    }
}

window.addEventListener("DOMContentLoaded", () => {
    let start = moment().subtract(30, "days");
    let end = moment();
    if (document.querySelector(`input[name='date_from']`).value.length > 0) {
        start = moment(document.querySelector(`input[name='date_from']`).value);
        end = moment(document.querySelector(`input[name='date_till']`).value);
    } else {
        document.querySelector(`input[name='date_from']`).value =
            start.format("YYYY-MM-DD");
        document.querySelector(`input[name='date_till']`).value =
            end.format("YYYY-MM-DD");
    }

    function cb(start, end) {
        $("#reportrange span").html(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
    }

    $("#reportrange").daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
        },
        cb
    );

    $("#reportrange").on("apply.daterangepicker", function (ev, picker) {
        document.querySelector(`input[name='date_from']`).value =
            picker.startDate.format("YYYY-MM-DD");
        document.querySelector(`input[name='date_till']`).value =
            picker.endDate.format("YYYY-MM-DD");
    });

    $("#reportrange").on("apply.daterangepicker", function (ev, picker) {
        document.querySelector(`input[name='date_from']`).value =
            picker.startDate.format("YYYY-MM-DD");
        document.querySelector(`input[name='date_till']`).value =
            picker.endDate.format("YYYY-MM-DD");
        document
            .querySelector(`input[name='date_from']`)
            .parentElement.submit();
    });

    cb(start, end);
});

function setOrderIdsAndCalculateSellerPayout() {
    let ids = [];
    let totalPayout = 0;
    document.querySelectorAll(".order-checkboxes").forEach((checkboxes) => {
        if (checkboxes.checked) {
            ids.push(checkboxes.value);
            totalPayout += parseFloat(
                checkboxes.parentElement.parentElement.querySelector(
                    ".seller-payout"
                ).textContent
            );
        }
    });

    if (ids.length === 0)
        document.querySelector(".bulk-payment-btn-div").classList.add("d-none");
    else
        document
            .querySelector(".bulk-payment-btn-div")
            .classList.remove("d-none");

    document.querySelector(".supplier-order-ids").value = ids.toString();
    document.querySelector(".total-payout").textContent =
        totalPayout.toFixed(2);
}

if (
    document.querySelector(".order-checkboxes") !== null ||
    document.querySelector(".order-checkboxes") !== undefined
) {
    document.querySelectorAll(".order-checkboxes").forEach((elements) => {
        elements.addEventListener("change", (checkbox) => {
            setOrderIdsAndCalculateSellerPayout();
        });
    });
}

if (
    document.querySelector(".check-all") !== null ||
    document.querySelector(".check-all") !== undefined
) {
    document
        .querySelector(".check-all")
        .addEventListener("change", (checkbox) => {
            setOrderIdsAndCalculateSellerPayout();
        });
}

if (
    document.querySelector(".bulk-payment-btn-div") !== null ||
    document.querySelector(".bulk-payment-btn-div") !== undefined
) {
}
