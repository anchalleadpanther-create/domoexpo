import { handleMessage } from "../customer/helpers.js";
// import { handleMessage } from "../customer/helpers.js";

// ---------Save BOQ data in database Logics -----------------------------------------------

if(document.querySelector('.create-rfq-form')){
    document.querySelector('.create-rfq-form').addEventListener('submit',async (event) => {
        event.preventDefault();
        
        handleMessage('success', 'Success!', "gffhfg");
        
        // const form = event.target;
        // const submitBtn = document.querySelector('.rfq-submit-button');
    })
}
 

if(document.querySelector('.save-revised-boq') || document.querySelector('.save-and-next') || document.querySelector('.final-submission') || document.querySelector('.save-without-submission')){
    // document.querySelector('.save-and-next','.final-submission').addEventListener('click',async (event) => {
        
  document.querySelectorAll('.save-revised-boq,.save-and-next, .final-submission,.save-without-submission').forEach(button => {
    button.addEventListener('click', async (event) => {
            const clickedButton = event.currentTarget;
            let isFinalSubmission = clickedButton.classList.contains('final-submission') ? true : false;
            let isSaveWithoutSubmission = clickedButton.classList.contains('save-without-submission') ? true : false;
            let isRevising = clickedButton.classList.contains('save-revised-boq') ? true : false;
            const button = event.currentTarget; // the actual button that was clicked
    
            button.innerHTML = `
              Saving... &nbsp;
              <div class="spinner-border text-white spinner-border-sm" role="status">
                <span class="visually-hidden"></span>
              </div>
            `;
            try{
                
                const form = document.querySelector('.create-rfq-form');
                const formData = new FormData(form);
                
        
                for (const [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
                console.log(formData);
                // return true;
                if (isFinalSubmission) {
                    let boq_created_by = document.querySelector('input[name="created_by"]')?.value || '';
                    if (!confirm(`Are you sure you want to submit? You won’t be able to edit after this. ${boq_created_by}`)) {
                        button.innerHTML = `Submit`;
                        return false;
                    }
                    if(boq_created_by == 'Developer'){
                        formData.append('is_form_filled_developer', 1);
                    }else{
                        formData.append('is_form_filled', 1);
                    }
                    
                }
                
                
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                const response = await axios.post(route('buyer.save-create-boq'), formData, 
                                    {
                                        headers : {
                                            'X-CSRF-TOKEN' : csrfToken,
                                            'Content-Type': 'multipart/form-data'
                                        }
                                     });
                const { status, message,data} = response.data;
                console.log(status);
                console.log(message);
                
                if(isRevising) {
                    // document.querySelector('input[name="want_to_revised"]')?.value = 0;
                   const input = document.querySelector('input[name="want_to_revised"]');
                    if (input) input.value = 0;

                }
                
                if(data.id != undefined && data.id != null){
                    // Change the URL without reloading
                    window.history.pushState({}, '', '/buyer/edit-boq/'+data.id);
                    document.querySelector('input[name="boq_id"]').value = data.id;
                }
                
                handleMessage('success', 'Success!', "Project Successfully Saved.");
                if(!isFinalSubmission){
                    if(isSaveWithoutSubmission){
                        button.innerHTML = `Save without Submission`;
                        window.location.href = '/buyer/projects';
                    }else{
                        nextStep()
                        button.innerHTML = `Save & Next`;
                    }
                    
                }else{
                    button.innerHTML = `Submit`;
                    window.location.href = '/buyer/projects';
                }
                
            }catch (error) {
              button.innerHTML = isFinalSubmission ? `Submit` : `Save & Next`;
              const errorMessage = error.response?.data?.message || 'Something went wrong.';
              handleMessage('error', 'Error!', errorMessage);
              console.error(error);
            }
        })
    })
}


// Save individual Item ----------------------------------------------------------------------
document.addEventListener('click', async function (e) {
    if (e.target.classList.contains('save-boq-item')) {
        // Step 1: Get closest .category-group
        let categoryGroup = e.target.closest('.category-group');

        if (!categoryGroup) return;

        // Step 2: Get all inputs, selects, textareas inside it
        let inputs = categoryGroup.querySelectorAll('input, select, textarea');

        // Step 3: Create a FormData object (for files and normal inputs)
        let formData = new FormData();

        inputs.forEach(function (input) {
            if (!input.name || (input.type === 'file' && input.files.length === 0)) return;

            if (input.type === 'file') {
                formData.append(input.name, input.files[0]);
            } else {
                formData.append(input.name, input.value);
            }
        });
        
        let boq_id = document.querySelector('input[name="boq_id"]').value;
        // append boq_id manually if needed
        formData.append('boq_id', boq_id); // or dynamically


        // CSRF Token
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        try {
            // Axios POST with FormData
            const response = await axios.post(route('buyer.save-individual-category-group'),formData,
                {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                        // 'Content-Type' is NOT set manually for FormData
                    }
                }
            );

            let { status, message, data } = response.data;
            console.log("Status:", status);
            console.log("Message:", message);
            handleMessage('success', 'Success!', message);
            console.log("Data:", data);
        } catch (error) {
            const errorMessage = error.response?.data?.message || 'Something went wrong.';
              handleMessage('error', 'Error!', errorMessage);
              console.error(error);
            console.error("Save failed:", error.response?.data || error.message);
        }
    }
});
// end of individual item ---------------------------------------------------------------------

// ----------------End of data saving logic ------------------------------------------------------------------


// ----------------- Revised BOQ ------------------------------------------------------------------------------


// ----------------- End of Revised BOQ -----------------------------------------------------------------------








// ------##########################################################


if(document.querySelector('.save-qs-boq-quantity')){
    // document.querySelector('.save-and-next','.final-submission').addEventListener('click',async (event) => {
        
  document.querySelectorAll('.save-qs-boq-quantity').forEach(button => {
    button.addEventListener('click', async (event) => {
            const clickedButton = event.currentTarget;
            let isFinalSubmission = clickedButton.classList.contains('final-submission') ? true : false;
            let isSaveWithoutSubmission = clickedButton.classList.contains('save-without-submission') ? true : false;
            let isRevising = clickedButton.classList.contains('save-revised-boq') ? true : false;
            const button = event.currentTarget; // the actual button that was clicked
    
            button.innerHTML = `
              Saving... &nbsp;
              <div class="spinner-border text-white spinner-border-sm" role="status">
                <span class="visually-hidden"></span>
              </div>
            `;
            try{
                
                const form = document.querySelector('.create-rfq-form');
                const formData = new FormData(form);
                
        
                for (const [name, value] of formData.entries()) {
                    console.log(`${name}: ${value}`);
                }
                console.log(formData);
                
                
                // handleMessage('success', 'Success!', "Quantity has been saved successfully.");
                //   button.innerHTML = `Submit`;
                //     window.location.href = '/buyer/projects';
                    
                //     return true;
                // if (isFinalSubmission) {
                //     let boq_created_by = document.querySelector('input[name="created_by"]')?.value || '';
                //     if (!confirm(`Are you sure you want to submit? You won’t be able to edit after this. ${boq_created_by}`)) {
                //         button.innerHTML = `Submit`;
                //         return false;
                //     }
                //     if(boq_created_by == 'Developer'){
                //         formData.append('is_form_filled_developer', 1);
                //     }else{
                //         formData.append('is_form_filled', 1);
                //     }
                    
                // }
                
                
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                const response = await axios.post(route('buyer.save-project-quantity-by-qs'), formData, 
                                    {
                                        headers : {
                                            'X-CSRF-TOKEN' : csrfToken,
                                            'Content-Type': 'multipart/form-data'
                                        }
                                     });
                const { status, message,data} = response.data;
                console.log(status);
                console.log(message);
                
                
                
                if(isRevising) {
                    // document.querySelector('input[name="want_to_revised"]')?.value = 0;
                   const input = document.querySelector('input[name="want_to_revised"]');
                    if (input) input.value = 0;

                }
                
                // if(data.id != undefined && data.id != null){
                //     // Change the URL without reloading
                //     window.history.pushState({}, '', '/buyer/edit-boq/'+data.id);
                //     document.querySelector('input[name="boq_id"]').value = data.id;
                // }
                
                handleMessage('success', 'Success!', "Project Quantity Successfully Saved.");
                if(!isFinalSubmission){
                    if(isSaveWithoutSubmission){
                        button.innerHTML = `Save without Submission`;
                        window.location.href = '/buyer/projects';
                    }else{
                        nextStep()
                        button.innerHTML = `Save & Next`;
                    }
                    
                }else{
                    button.innerHTML = `Submit`;
                    window.location.href = '/buyer/projects';
                }
                
            }catch (error) {
              button.innerHTML = isFinalSubmission ? `Submit` : `Save & Next`;
              const errorMessage = error.response?.data?.message || 'Something went wrong.';
              handleMessage('error', 'Error!', errorMessage);
              console.error(error);
            }
        })
    })
}














