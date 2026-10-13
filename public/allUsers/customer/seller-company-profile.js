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

    // Find the form with the class 'ActiveForm'
    const form = document.querySelector('form.ActiveForm');

    // Check if the form with 'ActiveForm' class exists
    if (form) {
      console.log('Form with ActiveForm class:', form);

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

        // If there's a supplier ID input, get the value
        const supplierIdInput = document.querySelector('input[name="supplier_id"]');
        if (supplierIdInput && supplierIdInput.value) {
          const supplierId = supplierIdInput.value;
          const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

          // Construct the URL with the supplier ID
          let url = form ? form.action : null;
          console.log(url);

          if (url == null || url == undefined) {
            url = route('seller.profile-update', { supplier_id: supplierId });
          }

          const response = await fetch(url, {
            method: 'POST',
            body: formData,
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

          // Update supplier_id with the new ID returned from the server
          if (responseData && responseData.id) {
            document.querySelector('input[name="supplier_id"]').value = responseData.id;
          }
          
          
          // Get the current URL path
          var pathname = window.location.pathname;
          // Split the path into an array of segments
          var segments = pathname.split('/');
          if(segments[3] == "seller-categories"){
             getSellerCategoryTable() 
          }
          if(segments[3] == "client-references"){
             getClientTestimonialsTable() 
          }
          
            
          if (responseData.is_last_div == 1) {
            registerBtn.innerHTML = `Save`;
            setTimeout(() => {
                 window.location.href = route('seller.dashboard');
                // location.window.href = "route('seller.dashboard')";
             }, 300);
            return;
          }
          registerBtn.innerHTML = `Save & Next`;
          next(); // Assuming next() is a function to go to the next form step
          
          

        } else {
          console.log('No supplier ID found.');
        }

      } catch (error) {
        // Show error message
        // console.log(error);

        registerBtn.innerHTML = `Save & Next`;

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
