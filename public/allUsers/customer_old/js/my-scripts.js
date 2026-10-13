$(document).ready(function () {
  $('.custom-select, .form-select').select2({
    width: '100%',
    dropdownCssClass: "max-z-index",
    allowClear: true,
    placeholder: 'Select',
  });

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  // function newsletter_popup() {
  //   var cookieSignup = "cookieSignup",
  //     date = new Date();
  //   if ($.cookie(cookieSignup) != 'true' && window.location.href.indexOf("challenge#newsletter-modal") <= -1) {
  //     setTimeout(function () {
  //       if (localStorage.getItem('newsletterPopup') === null) {
  //         $.magnificPopup.open({
  //           items: {
  //             src: '#newsletter-modal'
  //           },
  //           type: 'inline',
  //           removalDelay: 300,
  //           mainClass: 'mfp-zoom-in'
  //         });
  //       }
  //     }, 10000);
  //   }
  // }
  // if ($.magnificPopup !== undefined) {
  //   $.magnificPopup.instance.close = function () {
  //     localStorage.setItem('newsletterPopup', 'hide');
  //     $.magnificPopup.proto.close.call(this);
  //   }
  //   newsletter_popup();
  // }
});
// sweet alert 2
window.addEventListener('DOMContentLoaded', (event) => {
  const Toast = Swal.mixin({
    toast: true,
    background: '#252323',
    color: 'white',
    iconColor: 'white',
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  if (document.querySelector('.sweet-msg') != undefined || document.querySelector('.sweet-msg') != null) {
    if (document.querySelector('.sweet-msg').value.length > 0) {
      Toast.fire({
        icon: 'success',
        title: document.querySelector('.sweet-msg').value,
      });
    }
  }
  if (document.querySelector('.sweet-msg-error') != undefined || document.querySelector('.sweet-msg-error') != null) {
    if (document.querySelector('.sweet-msg-error').value.length > 0) {
      Toast.fire({
        icon: 'error',
        title: document.querySelector('.sweet-msg-error').value,
      });
    }
  }
});
// sweet alert 2

async function getStates(e) {
  let countryId = e.value;
  // console.log(countryId)
  const className = e.dataset.class;
  let response = await fetch(`${route('getStates', countryId)}`);
  response = await response.json();
  let optionTemplate = `<option value=''>Select</option>`;
  response.data.forEach(element => {
    optionTemplate += `<option value='${element.id}'>${element.name}</option>`;
  });
  document.querySelector(`${className}`).innerHTML = optionTemplate;
  const cityClassName = document.querySelector(`${className}`).dataset.class;
  if (cityClassName && document.querySelector(`${cityClassName}`) !== undefined && document.querySelector(`${cityClassName}`) !== null) {
    document.querySelector(`${cityClassName}`).innerHTML = `<option value=''>Select</option>`;
  }
}

async function getCities(e) {
  let stateId = e.value;
  // console.log(stateId)
  const className = e.dataset.class;
  let response = await fetch(`${route('getCities', stateId)}`);
  response = await response.json();
  let optionTemplate = `<option value=''>Select</option>`;
  response.data.forEach(element => {
    optionTemplate += `<option value='${element.id}'>${element.name}</option>`;
  });
  document.querySelector(`${className}`).innerHTML = optionTemplate;
}

async function getCitiesByCountry(e) {
  let countryId = e.value;
  // console.log(stateId)
  const className = e.dataset.class;
  let response = await fetch(`${route('getCitiesByCountry', countryId)}`);
  response = await response.json();
  let optionTemplate = `<option value=''>Select</option>`;
  response.data.forEach(element => {
    optionTemplate += `<option value='${element.id}'>${element.name}</option>`;
  });
  document.querySelector(`${className}`).innerHTML = optionTemplate;
}

async function getSubCategories(event) {
  const className = event.dataset.className;
  const parentId = +event.value;
  if (className === undefined) return;
  try {
    let response = await axios.get(route('api.get-category', parentId));
    const categories = response.data.data;
    let template = categories.map((category, index) => {
      return `${index === 0 ? `<option value="">Select</option>` : ''} <option value="${category.id}">${category.category_name}</option>`;
    });
    document.querySelector(className).parentElement.classList.remove('d-none');
    document.querySelector(className).innerHTML = template;
  } catch (error) {
    console.log(error);
  }
}