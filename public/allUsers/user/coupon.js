window.addEventListener('DOMContentLoaded', (event) => {
  $('.brands').on("change", async function (e) {
    let brandIds = [];

    for (let option of e.target.options) {
      if (option.selected) {
        brandIds.push(option.value);
      }
    }

    const response = await axios.get(route('get-products-by-brands', { brandIds }));
    const products = response.data.data;

    document.querySelector('.products').innerHTML =
      `<label for="intType3" class="form-label">Products *</label>
        <select class="form-select prod" aria-label="size 3 select example" name="products[]" required multiple="multiple" style="width: 100%">
          ${products.map(product => `<option value="${product.id}">${product.name} (${product.sku})</option>`).join('')}
        </select>`
      ;

    $('.prod').select2({
      placeholder: 'Select products',
      allowClear: true,
    });

  });
});

document.querySelector('.all-products').addEventListener('change', (event) => {
  if (event.target.checked) {
    document.querySelector('.brands-div').classList.add('d-none');
    document.querySelector('.brands').removeAttribute('required');
    document.querySelector('.products-div').classList.add('d-none');
    if (document.querySelector('.prod') !== null && document.querySelector('.prod') !== undefined) {
      document.querySelector('.prod').removeAttribute('required');
    }
    event.target.value = 1;
    return;
  } else {
    document.querySelector('.brands-div').classList.remove('d-none');
    document.querySelector('.brands').setAttribute('required', true);
    document.querySelector('.products-div').classList.remove('d-none');
    if (document.querySelector('.prod') !== null && document.querySelector('.prod') !== undefined) {
      document.querySelector('.prod').setAttribute('required', true);
    }
    event.target.value = 0;
    return;
  }
});