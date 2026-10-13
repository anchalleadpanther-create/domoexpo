window.addEventListener('DOMContentLoaded', (event) => {
  $(".multi, .single").select2({
    allowClear: true,
    width: '100%'
  });
});

function setDateLimit(event) {
  const className = event.dataset.class;

  document.querySelector(`${className}`).setAttribute('min', event.value);
  document.querySelector(`${className}`).removeAttribute('disabled');

}

function wordCounter(event) {
  const className = event.dataset.class;
  document.querySelector(`${className}`).textContent = `${event.value.length}/`;
}

// function getStates(e) {
//   let countryId = e.value;
//   const className = e.dataset.class;
//   $.ajax({
//     url: `${route('getStates', countryId)}`,
//     method: "GET",
//     dataType: 'json',
//     success: function (data) {
//       let optionTemplate = `<option value=''>Select</option>`;
//       data.data.forEach(element => {
//         optionTemplate += `<option value='${element.id}'>${element.name}</option>`;
//       });
//       document.querySelector(`${className}`).innerHTML = optionTemplate;
//     }
//   });
// }

// function getCities(e) {
//   let stateId = e.value;
//   const className = e.dataset.class;
//   $.ajax({
//     url: `${route('getCities', stateId)}`,
//     method: "GET",
//     dataType: 'json',
//     success: function (data) {
//       let optionTemplate = `<option value=''>Select</option>`;
//       data.data.forEach(element => {
//         optionTemplate += `<option value='${element.id}'>${element.name}</option>`;
//       });
//       document.querySelector(`${className}`).innerHTML = optionTemplate;
//     }
//   });
// }

function checkAll(event) {
  const className = event.dataset.class;
  document.querySelectorAll(`${className}`).forEach(item => {
    if (event.checked) {
      item.checked = true;
    } else {
      item.checked = false;
    }
  });
}

function changeAuthType(event) {
  if (event.value === 'login') {
    document.querySelector('.login-panel').style.display = 'block';
    document.querySelector('.register-panel').style.display = 'none';
  } else {
    document.querySelector('.login-panel').style.display = 'none';
    document.querySelector('.register-panel').style.display = 'block';
  }
}

function changeOrderItemStatus(e) {
  const cartId = document.querySelector('.order-action').dataset.cartId;
  const status = document.querySelector('.order-action').value;
  if (status.length < 1) {
    return false;
  }
  location.href = route('seller.product-order-change-status', [cartId, status]);
}

function changePosition(event) {
  location.href = route('admin.sliders.index', event.value);
}

function toggleColorPicker(e) {
  const type = e.value;
  console.log(type);
  if (type === '1') return document.querySelector('.color-picker').classList.remove('d-none');

  return document.querySelector('.color-picker').classList.add('d-none');

}

async function changeProductImageSort(event) {
  const imageName = event.dataset.imageName;
  const sort = +event.value;
  await axios.post(route('product-images.sort'), {
    imageName, sort
  });
}