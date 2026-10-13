import { handleMessage } from "../customer/helpers.js";

$('.order-status').on('select2:select', function (e) {
  const type = e.params.data.text;
  if (type === 'Ready to Ship Order') {
    document.querySelectorAll('.shipping-measurement').forEach(element => {
      element.classList.remove('d-none');
    });
  }
});

document.querySelector('.change-status-btn').addEventListener('click', btn => {
  const cartId = document.querySelector('.order-action').dataset.cartId;
  const status = document.querySelector('.order-action').value;
  if (status.length < 1) {
    return false;
  }
  if (status === '3') {
    const length = document.querySelector(`input[name="length"]`);
    const height = document.querySelector(`input[name="height"]`);
    const width = document.querySelector(`input[name="width"]`);
    const weight = document.querySelector(`input[name="weight"]`);
    if ((length.value.trim().length === 0 || height.value.trim().length === 0 || width.value.trim().length === 0 || weight.value.trim().length === 0)) {
      return handleMessage('warning', 'Warning!', 'All dimensions fields are required.');
    }
  }
  document.querySelector('#status-change-form').setAttribute('action', route('vendor.product-order-change-status', [cartId, status]));
  document.querySelector('#status-change-form').submit();
});
document.querySelector('.remark-btn').addEventListener('click', btn => {
  document.querySelector(`input[name="length"]`).removeAttribute('required');
  document.querySelector(`input[name="height"]`).removeAttribute('required');
  document.querySelector(`input[name="width"]`).removeAttribute('required');
  document.querySelector(`input[name="weight"]`).removeAttribute('required');
});