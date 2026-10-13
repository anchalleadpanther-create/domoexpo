import { processRazorPay, processPayPal } from "./paymentMethods.js";
import { handleMessage } from "./helpers.js";
let getCurrentCurrency = "";
let walletCharges = 0;
let productIds = [];


if (
    document.querySelector(".coupon-btn") !== null &&
    document.querySelector(".coupon-btn") !== undefined
) {
    document.querySelector(".coupon-btn").addEventListener("click", async (e) => {
            e.preventDefault();
            const code = document.querySelector(`input[name="code"]`).value;
            try {
                const response = await axios.get(
                    route("buyer.apply-coupon", { code })
                );
                const { data } = response;
                const message = data.data.message;
                // const couponAmount = +data.data.couponAmount;
                // const couponCode = data.data.couponCode;
                // const couponPercent = +data.data.couponPercent;
                
                
                let input = document.querySelector('input[name="code"]');
                // Remove old message if exists
                let oldMsg = document.querySelector('.coupon-message');
                if (oldMsg) oldMsg.remove();
                
                // Add new message
                input.insertAdjacentHTML("afterend", `<p class="coupon-message text-success">${message}</p>`);
                    
                // console.log(code,response)
                
                // Make input readonly
                document.querySelector('input[name="code"]').setAttribute("readonly", true);
                
                // Hide apply button
                document.querySelector(".coupon-btn").style.display = "none";
                
                // Add Remove Button (only if not exists)
                if (!document.querySelector(".remove-coupon-btn")) {
                    document.querySelector('input[name="code"]').insertAdjacentHTML(
                        "afterend",
                        `<button type="button" class="btn btn-danger mt-2 remove-coupon-btn">Remove Coupon</button>`
                    );
                }
                
              
            } catch (error) {
                handleMessage("error", "Uh Oh!", error.response.data.message);
            }
        });
}


document.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-coupon-btn")) {

        // Remove message
        let oldMsg = document.querySelector('.coupon-message');
        if (oldMsg) oldMsg.remove();

        // Remove button
        e.target.remove();

        // Enable input again
        let input = document.querySelector('input[name="code"]');
        input.removeAttribute("readonly");
        input.value = "";

        // Show apply button again
        document.querySelector(".coupon-btn").style.display = "inline-block";

        // Optional: call API to remove coupon
        // axios.get(route("buyer.remove-coupon"));
    }
});
