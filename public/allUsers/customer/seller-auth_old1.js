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

      const biz_email = document.querySelector(`input[name="biz_email"]`).value;
      const password = document.querySelector(`input[name="password"]`).value;
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
      const response = await axios.post(route('seller.seller-login'), {
        biz_email,
        password
      }, {
        "X-CSRF-TOKEN": csrfToken,
      });
      const { status, message, data } = response.data;
      handleMessage('success', 'Success!', message);

      loginBtn.innerHTML = `Login`;

      setTimeout(() => {
        location.reload();
      }, 1000);
    } catch (error) {
      loginBtn.innerHTML = `Login`;

      console.error(error);
      handleMessage('error', 'Error!', error.response.data.message);
    }
  });
}

if (document.querySelector('.sellerSignupFrom') !== null && document.querySelector('.sellerSignupFrom') !== undefined) {
  document.querySelector('.sellerSignupFrom').addEventListener('submit', async (event) => {
    event.preventDefault();
    const registerBtn = document.getElementById('next');
    registerBtn.innerHTML = `
    Saveing...&nbsp;
    <div class="spinner-border text-white spinner-border-sm" role="status">
      <span class="visually-hidden"></span>
    </div>
    `;
    try {
      const business_name = document.querySelector(`input[name="business_name"]`).value;
      const biz_name = document.querySelector(`input[name="biz_name"]`).value;

      const biz_email = document.querySelector(`input[name="biz_email"]`).value;
      const biz_phone = document.querySelector(`input[name="biz_phone"]`).value;
      const password = document.querySelector(`input[name="password"]`).value;
      const password_confirmation = document.querySelector(`input[name="password_confirmation"]`).value;
      const position = document.querySelector('select[name="position"]').value;
      const terms_and_conditions = document.querySelector(`input[name="terms_and_conditions"]`).value;
      const is_signup_complete = document.querySelector(`input[name="is_signup_complete"]`).value;

      const supplier_id = document.querySelector(`input[name="supplier_id"]`).value;
      // const describe_seller_checkbox = document.querySelector(`input[name="describe_seller[]"]:checked`);
      // const describe_seller = [];
      // describe_seller_checkbox.forEach((value, index, array) => {
      //   describe_seller.value.push(value);
      // })

      const describe_seller_checkboxes = document.querySelectorAll('input[name="describe_seller[]"]:checked');
      // Initialize an empty array to store the values
      const describe_seller = [];

      // Iterate over each checked checkbox and push its value to the array
      describe_seller_checkboxes.forEach((checkbox) => {
        describe_seller.push(checkbox.value);
      });

      const like_to_sell_checkbox = document.querySelectorAll(`input[name="like_to_sell[]"]:checked`);
      const like_to_sell = [];
      like_to_sell_checkbox.forEach((checkbox) => {
        like_to_sell.push(checkbox.value);
      })

      const selling_scope = document.querySelector(`input[name="selling_scope"]`).value;
      const country_inputs = document.querySelectorAll(`input[name="country[]"]`);
      const country = [];
      country_inputs.forEach((checkbox) => {
        country.push(checkbox.value);
      })
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
      const response = await axios.post(route('seller.save-seller-signup'),
        { business_name, biz_name, biz_email, biz_phone, password, password_confirmation, position, terms_and_conditions, supplier_id, describe_seller, like_to_sell, selling_scope, country, is_signup_complete }, {
        "X-CSRF-TOKEN": csrfToken,
      });
      const { status, message, data } = response.data;
      handleMessage('success', 'Success!', message);
      next()
      // console.log(data);
      document.querySelector('input[name="supplier_id"]').value = data.id;

      registerBtn.innerHTML = `Save & Next`;

      // setTimeout(() => {
      //   location.reload();
      // }, 1000);
    } catch (error) {
      // console.log(error.response)
      registerBtn.innerHTML = `Save & Next`;
      // fieldSet.removeAttribute('disabled');
      // registerBtn.innerHTML = `Submit`;
      handleMessage('error', 'Error!', error.response.data.data);
    }
  });
}











// if (document.getElementById('sellerSignupFrom') !== null && document.getElementById('sellerSignupFrom') !== undefined) {
//   document.getElementById('sellerSignupFrom').addEventListener('submit', function (event) {
//     // document.getElementById('next').addEventListener('click', function (event) {
//     event.preventDefault();
//     const form = event.target;
//     const errors = {};

//     const rules = {
//       biz_name: { required: true, max: 100 },
//       biz_email: { email: true, max: 100, unique: true },
//       biz_phone: { max: 20 },
//       biz_website: { max: 1000 },
//       biz_area_of_biz: { max: 100 },
//       biz_no_of_staff: { max: 100 },
//       biz_supplier_about: { max: 600 },
//       biz_company: { max: 100 },
//       biz_company_address: { max: 250 },
//       biz_company_city: { max: 100 },
//       biz_company_zip: { max: 10 },
//       biz_office: { max: 100 },
//       biz_office_address: { max: 250 },
//       biz_office_city: { max: 100 },
//       biz_office_zip: { max: 10 },
//       biz_reg_no: { max: 40 },
//       biz_reg_gst: { max: 15 },
//       biz_reg_pan_no: { max: 10 },
//       biz_bank_acc_name: { max: 100 },
//       biz_bank_acc_no: { max: 25 },
//       biz_bank_name: { max: 100 },
//       biz_bank_ifsc_code: { max: 30 },
//       biz_bank_swift_code: { max: 25 },
//       biz_bank_route_code: { max: 25 },
//       biz_bank_acc_type: { max: 25 },
//       ar_name: { max: 100 },
//       ar_email: { max: 150 },
//       ar_phone: { max: 20 },
//       accounts_name: { max: 100 },
//       accounts_email: { max: 150 },
//       accounts_phone: { max: 20 },
//       ar_department: { max: 50 },
//       ar_designation: { max: 50 }
//     };

//     // Custom validation logic
//     for (const field in rules) {
//       const input = form[field];
//       if (!input) continue;

//       const value = input.value.trim();
//       const rule = rules[field];

//       if (rule.required && !value) {
//         errors[field] = 'This ' + field.replace("biz_", "") + ' is required';
//       }

//       if (rule.max && value.length > rule.max) {
//         errors[field] = `Maximum length is ${rule.max}`;
//       }

//       if (rule.email && value && !/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value)) {
//         errors[field] = 'Invalid email format';
//       }

//       // Example of unique email validation (synchronous for demonstration, should be async in real cases)
//       if (rule.unique && value === 'existing@example.com') { // Replace with actual check
//         errors[field] = 'Email must be unique';
//       }
//     }

//     // Display errors
//     for (const field in rules) {
//       // const errorElement = document.getElementById(`${field}_error`);




//       if (errors[field]) {
//         // console.log(errors[field])
//         handleMessage('error', 'Error!', errors[field]);
//         // errorElement.textContent = errors[field];
//       } else {
//         // errorElement.textContent = '';
//       }
//     }



//     // If no errors, submit the form
//     if (Object.keys(errors).length === 0) {
//       // form.submit();
//     }
//   });

// }



