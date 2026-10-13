import { handleMessage } from "./helpers.js";


document.querySelectorAll('.cancel-order-btn').forEach(button => {
  button.addEventListener('click', async btn => {
    Swal.fire({
      title: 'Do you want to cancel this order?',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      confirmButtonColor: '#f9cad7',
      cancelButtonColor: '#d0d0d0',
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = btn.target.dataset.href;
      }
    })
  });
});