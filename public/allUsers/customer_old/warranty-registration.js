import { handleMessage } from './helpers.js';

document.querySelector('.warranty-registration-form').addEventListener('submit', async (event) => {
    event.preventDefault();
    try {
        event.target.querySelector('.submit-form').setAttribute('disabled', true);
        event.target.querySelector('.submit-form').textContent = 'Submitting... Please wait.';
        let formData = new FormData(event.target);
        formData.set(
            'state',
            document.querySelector('.states').options[
                document.querySelector('.states').selectedIndex
            ].text
        );
        formData.set(
            'city',
            document.querySelector('.cities').options[
                document.querySelector('.cities').selectedIndex
            ].text
        );
        formData = Object.fromEntries(formData.entries());

        const response = await axios.post(route('customer.warranty'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        const { message } = response.data;

        handleMessage('success', 'Success!', message);

        event.target.reset();
        event.target.querySelector('.submit-form').removeAttribute('disabled');
        event.target.querySelector('.submit-form').textContent = 'Submit';
    } catch (error) {
        event.target.querySelector('.submit-form').removeAttribute('disabled');
        event.target.querySelector('.submit-form').textContent = 'Submit';
        handleMessage('error', 'Error!', error.response.data.message);
    }
});
