import { handleMessage } from "./helpers.js";

if (document.querySelector('.login-form') !== null && document.querySelector('.login-form') !== undefined) {
  document.querySelector('.login-form').addEventListener('submit', async (event) => {
    event.preventDefault();
    const loginBtn = document.getElementById('login-submit-btn');
    loginBtn.innerHTML = `
      Please Wait...&nbsp;
      <div class="spinner-border text-white spinner-border-sm" role="status">
        <span class="visually-hidden"></span>
      </div>
      `;
    try {

      const email = document.querySelector(`input[name="email"]`).value;
      const password = document.querySelector(`input[name="password"]`).value;
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
      const response = await axios.post(route('buyer.login'), {
        email,
        password
      }, {
        "X-CSRF-TOKEN": csrfToken,
      });
      const { status, message, data } = response.data;
      // handleMessage('success', 'Success!', message);

      setTimeout(() => {
        // location.reload();
        window.location.href = '/';
      }, 300);

      loginBtn.innerHTML = `Login`;


    } catch (error) {
      loginBtn.innerHTML = `Login`;

      console.error(error);
      handleMessage('error', 'Error!', error.response.data.message);
    }
  });
}

if (document.querySelector('.register-form') !== null && document.querySelector('.register-form') !== undefined) {
  document.querySelector('.register-form').addEventListener('submit', async (event) => {
    event.preventDefault();
    // const fieldSet = document.querySelector('.register-fieldset');
    const registerBtn = document.querySelector('.register-btn');
    // fieldSet.setAttribute('disabled', 'disabled');
    registerBtn.innerHTML = `
    Saving...&nbsp;
    <div class="spinner-border text-white spinner-border-sm" role="status">
      <span class="visually-hidden"></span>
    </div>
    `;
    try {
      const account_type = document.querySelector(`select[name="account_type"]`).value;
      console.log(account_type);
      if(account_type == 'Contractor'){
          if(!confirm("Are you sure you want to become a Contractor?")){
              registerBtn.innerHTML = `Create DomoExpo account`;
              return false;
          }
      }else if(account_type == 'Architect' && !confirm("Are you sure you want to become a Architect?")){
          registerBtn.innerHTML = `Create DomoExpo account`;
          return false;
      }else if(account_type == 'Developer' && !confirm("Are you sure you want to become a Developer?")){
          registerBtn.innerHTML = `Create DomoExpo account`;
          return false;
      }
      const company_name = document.querySelector(`input[name="company_name"]`).value;
      const registration_no = document.querySelector(`input[name="registration_no"]`).value;
      const vat_no = document.querySelector(`input[name="vat_no"]`).value;
      
      const telephone_code = document.querySelector(`select[name="telephone_code"]`).value;
      const telephone_no = document.querySelector(`input[name="telephone_no"]`).value;
      const address = document.querySelector(`input[name="address"]`).value;
      
      const first_name = document.querySelector(`input[name="first_name"]`).value;
      const last_name = document.querySelector(`input[name="last_name"]`).value;
      const email = document.querySelector(`input[name="email"]`).value;
      const phonecode = document.querySelector(`select[name="phonecode"]`).value;
      const phone = document.querySelector(`input[name="phone"]`).value;
      const password = document.querySelector(`input[name="password"]`).value;
      const password_confirmation = document.querySelector(`input[name="password_confirmation"]`).value;
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // console.log(first_name, last_name, email, phone, password, password_confirmation );
      // return '';
      const response = await axios.post(route('buyer.register'), { account_type,company_name,registration_no,vat_no,telephone_code,telephone_no,address,first_name, last_name, email, phonecode, phone, password, password_confirmation }, {
        "X-CSRF-TOKEN": csrfToken,
      });
      const { status, message, data } = response.data;
      // handleMessage('success', 'Success!', message);
      next();

    } catch (error) {
      console.log(error);
      registerBtn.innerHTML = `Create DomoExpo account`;
      if (error.response && error.response.data && error.response.data.data) {
        handleMessage('error', 'Error!', error.response.data.data);
      } else if (error.response && error.response.data.message) {
        handleMessage('error', 'Error!', error.response.data.message);
      } else {
        handleMessage('error', 'Error!', 'An unexpected error occurred.');
      }

    }
  });
}