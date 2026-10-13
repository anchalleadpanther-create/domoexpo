export const processRazorPay = async () => {
  let grandTotal = +document.querySelector('.checkout-grand-total').dataset.total;

  if (document.querySelector('.checkout-grand-total').dataset.currency !== 'INR') {
    grandTotal = (+document.querySelector('.checkout-grand-total').dataset.total / 100) * +document.querySelector('.checkout-grand-total').dataset.conRatio;
    grandTotal = +grandTotal.toFixed(2) * 100;
  }

  if (grandTotal <= 0) {
    return document.querySelector('.checkout-form').submit();
  }

  let options = {
    "key": await getRazorPayKey(),
    "amount": grandTotal,
    "currency": document.querySelector('.checkout-grand-total').dataset.currency,
    "name": "EMTY",
    "description": "EMTY",
    "image": document.querySelector('.app-logo').getAttribute('src'),
    "handler": async function (response) {
      console.log(response);
      document.querySelector(`input[name="razorpay_payment_id"]`).value = response.razorpay_payment_id;
      document.querySelector('.checkout-form').submit();
    },
    "prefill": {
      "name": document.querySelector('.account-info').dataset.name,
      "email": document.querySelector('.account-info').dataset.email,
      "contact": document.querySelector('.account-info').dataset.phone
    },
  };

  let razorPayOne = new Razorpay(options);
  razorPayOne.open();
  return razorPayOne;
}

async function getRazorPayKey() {

  const response = await axios.get(route('getRazorPayKey'));
  const { data: responseData } = response;
  const { status, message, data: messageData } = responseData;
  return messageData;

}

export const processPayPal = async () => {
  document.querySelector('.checkout-form').submit();
};
