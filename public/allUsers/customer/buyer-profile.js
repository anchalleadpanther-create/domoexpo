import { handleMessage } from "./helpers.js";
// import { route } from './ziggy.js';

document.body.addEventListener('click', async function (event) {
  // Check if the clicked button has the class 'saveFormBtn'
  if (event.target.classList.contains('prevBtn')) {
    event.preventDefault();
    prev()
  }
});
document.body.addEventListener('click', async function (event) {
  // Check if the clicked button has the class 'saveFormBtn'
  if (event.target.classList.contains('saveFormBtn')) {
    event.preventDefault();
    
// return console.log('sadfsdf');
    // Find the form with the class 'ActiveForm'
    const form = document.querySelector('form.ActiveForm');

    // Check if the form with 'ActiveForm' class exists
    if (form) {
    //   console.log('Form with ActiveForm class:', form);

      const registerBtn = event.target;
      registerBtn.innerHTML = `
                Saving...&nbsp;
                <div class="spinner-border text-white spinner-border-sm" role="status">
                    <span class="visually-hidden"></span>
                </div>
            `;

      try {
        // Create FormData from the form element
        const formData = new FormData(form);
        
        // Create a new FormData object to store the updated keys
        const updatedFormData = new FormData();
        
        // Map of old keys to new keys
        const keyMapping = {
            'buyer_first_name': 'first_name',
            'buyer_last_name': 'last_name',
            'buyer_email': 'email',
            'buyer_phone': 'phone'
        };
        
        // Iterate over the original FormData
        formData.forEach((value, key) => {
            // Check if the key needs to be changed
            const newKey = keyMapping[key] || key; // Use the mapped key or the original key if no mapping exists
            updatedFormData.append(newKey, value);
        });

        // If there's a supplier ID input, get the value
        const supplierIdInput = document.querySelector('input[name="buyer_id"]');
        if (supplierIdInput && supplierIdInput.value) {
          const supplierId = supplierIdInput.value;
          const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

          // Construct the URL with the supplier ID
          let url = form ? form.action : null;
          console.log(url);

          if (url == null || url == undefined) {
            url = route('buyer.profile-update', { supplier_id: supplierId });
          }

          const response = await fetch(url, {
            method: 'POST',
            body: updatedFormData,
            headers: {
              'X-CSRF-TOKEN': csrfToken,
              'Accept': 'application/json'
            }
          });

          // Check if the response is OK (status code 200-299)
          if (!response.ok) {
            // If response is not OK, try to parse error response
            const errorData = await response.json();
            throw new Error(errorData.message || `HTTP error! status: ${response.status}`);
          }

          // Parse JSON response
          const data = await response.json();

          const { status, message, data: responseData } = data;

          // Show success message and proceed to the next form step
          // handleMessage('success', 'Success!', message);

          // Update buyer_id with the new ID returned from the server
            if (responseData && responseData.id) {
                const buyerIdInput = document.querySelector('input[name="buyer_id"]');
                if (buyerIdInput) {
                    buyerIdInput.value = responseData.id;
                }
              
            }
            
            const profileImg = document.querySelector('.profile-img');
                if (profileImg && responseData?.buyer?.photo) {
                    const imgLink = "/uploads/buyer/" + responseData?.buyer?.photo;
                    profileImg.setAttribute('src', imgLink);
                    console.log(imgLink);
                }

          if (responseData.is_last_div == 1) {
            registerBtn.innerHTML = `Save`;
            return;
          }
          registerBtn.innerHTML = `Save`;
          
          
          
        //   next(); // Assuming next() is a function to go to the next form step

        } else {
          console.log('No supplier ID found.');
        }

      } catch (error) {
        // Show error message
        // console.log(error);

        registerBtn.innerHTML = `Save`;

        // Check if error has response property for more details
        if (error.message) {
          handleMessage('error', 'Error!', error.message);
        } else {
          handleMessage('error', 'Error!', 'An unexpected error occurred.');
        }
      }
    } else {
      console.log('No form found with the class "ActiveForm".');
    }
  }
});
