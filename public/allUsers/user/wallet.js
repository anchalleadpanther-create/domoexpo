import { handleMessage } from "../customer/helpers.js";

document.querySelector(`input[name='credit_amount']`).addEventListener('input', input => {
  const creditInput = input.target;
  const value = +creditInput.value;
  const debitInput = document.querySelector(`input[name='debit_amount']`);
  if (value >= 1) {
    debitInput.setAttribute('readonly', true);
  } else {
    debitInput.removeAttribute('readonly');
  }
  debitInput.value = '';
  document.querySelector(`input[name='transaction_type']`).value = 'Credit';
});

document.querySelector(`input[name='debit_amount']`).addEventListener('input', input => {
  const debitInput = input.target;
  const value = +debitInput.value;
  const creditInput = document.querySelector(`input[name='credit_amount']`);
  if (value >= 1) {
    creditInput.setAttribute('readonly', true);
  } else {
    creditInput.removeAttribute('readonly');
  }
  creditInput.value = '';
  document.querySelector(`input[name='transaction_type']`).value = 'Debit';
});

document.querySelector(`input[name='order_id']`).addEventListener('input', async input => {
  const orderInputValue = input.target.value;
  console.log(orderInputValue);
  if (orderInputValue.length === 0) {
    document.querySelector('.save-btn').removeAttribute('disabled');
    return true;
  }
  if (orderInputValue.length <= 1) {
    return true;
  }

  try {
    await axios.get(route('validate-order-id', { orderId: orderInputValue }));
    document.querySelector('.save-btn').removeAttribute('disabled');
    return handleMessage('success', 'Correct!', 'Order ID is correct');
  } catch (error) {
    console.log(error);
    document.querySelector('.save-btn').setAttribute('disabled', true);
    if (error.hasOwnProperty('response')) {
      return handleMessage('warning', 'Warning!', error.response.data.message);
    } else {
      return handleMessage('warning', 'Warning!', error.message);
    }
  }
})