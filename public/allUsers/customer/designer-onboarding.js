import { handleMessage } from "./helpers.js";

document.querySelector('.onboard-form').addEventListener('submit', async (form) => {
  form.preventDefault();
  document.querySelector('.submit-btn').setAttribute('disabled', true);
  document.querySelector('.submit-btn').innerHTML =
    `Onboarding... <div class="spinner-border spinner-grow-sm text-light" role="status">
    <span class="visually-hidden">Loading...</span>
    </div>`;

  const formData = new FormData(form.target);
  try {
    const response = await axios.post(route('customer.designer-onboarding'), formData);

    form.target.reset();

    document.querySelector('.submit-btn').removeAttribute('disabled');
    document.querySelector('.submit-btn').innerHTML = `Onboard`;
    return handleMessage('success', 'Success!', response.data.message);
  } catch (error) {
    document.querySelector('.submit-btn').removeAttribute('disabled');
    document.querySelector('.submit-btn').innerHTML = `Onboard`;

    if (error.hasOwnProperty('response')) {
      return handleMessage('error', 'Error!', error.response.data.message);
    } else {
      return handleMessage('error', 'Error!', error.message);
    }
  }
});