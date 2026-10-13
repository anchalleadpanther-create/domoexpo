import { handleMessage } from "./helpers.js";

const lastUrlSegment = location.pathname.split("/").pop();

document.querySelector('.new-address-form').addEventListener('submit', async (event) => {
  event.preventDefault();
  try {
    const first_name = document.querySelector(`input[name="first_name"]`).value;
    const last_name = document.querySelector(`input[name="last_name"]`).value;
    const email = document.querySelector(`input[name="address_email"]`).value;
    const mobile = document.querySelector(`input[name="address_mobile"]`).value;
    const address_one = document.querySelector(`input[name="address_one"]`).value;
    const post_code = document.querySelector(`input[name="post_code"]`).value;
    const country = document.querySelector(`.countries`).value;
    const state = document.querySelector(`.states`).value;
    const city = document.querySelector(`.cities`).value;
    const address_type = document.querySelector(`input[name="address_type"]:checked`).value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const edit = document.body.contains(event.target.querySelector('input[name="_method"]'))
    let addressUrl = route('buyer.address.store');
    let _method = '';
    if (edit) {
      addressUrl = event.target.getAttribute('action');
      _method = `PATCH`;
    }
    const response = await axios.post(addressUrl, {
      first_name, last_name, email, mobile, address_one, post_code, country, state, city, address_type, _method
    }, {
      "X-CSRF-TOKEN": csrfToken,
    });
    const { status, message, data } = response.data;

    // handleMessage('success', 'Success!', message);

    setTimeout(() => {
      location.reload();
    }, 1500);
  } catch (error) {

    console.log(error);
    handleMessage('error', 'Error!', error.response.data.message);
  }
});
// if (lastUrlSegment === 'dashboard') {
  document.querySelectorAll('.edit-address').forEach(button => {
    button.addEventListener('click', async (event) => {
      const id = button.dataset.id;
      const response = await axios.get(route('buyer.address.edit', id));
      const { data: responseData } = response;
      const { status, message, data } = responseData;
      if (status === 'success') {
        const { first_name, last_name, email, mobile, address_one, post_code, country, state, city, address_type } = data;
        document.querySelector(`input[name="first_name"]`).value = first_name;
        document.querySelector(`input[name="last_name"]`).value = last_name;
        document.querySelector(`input[name="address_email"]`).value = email;
        document.querySelector(`input[name="address_mobile"]`).value = mobile;
        document.querySelector(`input[name="address_one"]`).value = address_one;
        document.querySelector(`input[name="post_code"]`).value = post_code;
        document.querySelector(`.countries`).value = country;

        // getStates from fetch api
        const states = await fetch(route('getStates', country));
        const statesData = await states.json();
        const statesOptions = statesData.data.map((state) => {
          return `<option value="${state.id}">${state.name}</option>`;
        }
        ).join("");
        document.querySelector(`.states`).innerHTML = statesOptions;
        document.querySelector(`.states`).value = state;
        // getCities from fetch api
        const cities = await fetch(route('getCities', state));
        const citiesData = await cities.json();
        const citiesOptions = citiesData.data.map((city) => {
          return `<option value="${city.id}">${city.name}</option>`;
        }
        ).join("");
        document.querySelector(`.cities`).innerHTML = citiesOptions;
        document.querySelector(`.cities`).value = city;

        document.querySelector(`input[name="address_type"][value="${address_type}"]`).checked = true;
        document.querySelector(".new-address-form").insertAdjacentHTML("afterbegin", `<input type="hidden" name="_method" value="PATCH">`);
        document.querySelector(".new-address-form").setAttribute("action", route('buyer.address.update', id));
      } else {
        handleMessage('error', 'Error!', message);
      }
    });
  });
// }