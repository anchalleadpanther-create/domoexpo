import { handleMessage } from './helpers.js';

document.querySelector('.warranty-claim-form').addEventListener('submit', async (event) => {
    event.preventDefault();
    try {
        event.target.querySelector('.submit-form').setAttribute('disabled', true);
        event.target.querySelector('.submit-form').textContent = 'Submitting... Please wait.';
        let formData = new FormData(event.target);
        formData.set(
            'delivery_state',
            document.querySelector('.delivery-states').options[
                document.querySelector('.delivery-states').selectedIndex
            ].text
        );
        formData.set(
            'delivery_city',
            document.querySelector('.delivery-cities').options[
                document.querySelector('.delivery-cities').selectedIndex
            ].text
        );
        formData.set(
            'pickup_state',
            document.querySelector('.pickup-states').options[
                document.querySelector('.pickup-states').selectedIndex
            ].text
        );
        formData.set(
            'pickup_city',
            document.querySelector('.pickup-cities').options[
                document.querySelector('.pickup-cities').selectedIndex
            ].text
        );
        formData = Object.fromEntries(formData.entries());

        const response = await axios.post(route('customer.warranty-claim'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        const { message } = response.data;

        Swal.fire({
            title: 'Thank You',
            text: message,
            imageUrl: document.querySelector('.app-logo').getAttribute('src'),
            imageHeight: 100,
            allowOutsideClick: false,
        });

        event.target.reset();
        event.target.querySelector('.submit-form').removeAttribute('disabled');
        event.target.querySelector('.submit-form').textContent = 'Submit';

    } catch (error) {
        event.target.querySelector('.submit-form').removeAttribute('disabled');
        event.target.querySelector('.submit-form').textContent = 'Submit';
        handleMessage('error', 'Error!', error.response.data.message);
    }
});
