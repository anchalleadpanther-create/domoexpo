/*-----------------------------------
     11. Price Range Slider
     -------------------------------------*/
let minimumPrice = null;
let maximumPrice = null;
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const lastUrlSegment = location.pathname.split("/").pop();
let paginationUrl = location.href;
let filterPagination = false;
let fire = true;

if (paginationUrl.includes("filter")) {
  filterPagination = true;
  paginationUrl = document.querySelector('.pagination-options').dataset.nextPageUrl;
  paginationUrl = paginationUrl.replace("filter", "filter/ajax");
  localStorage.setItem('filter-url', paginationUrl);
}

document.addEventListener("DOMContentLoaded", function () {
  const minPrice = +document.querySelector(".price-range").dataset.min;
  const maxPrice = +document.querySelector(".price-range").dataset.max;
  minimumPrice = minPrice;
  maximumPrice = maxPrice;
  $("#slider-range").slider({
    range: true,
    min: minPrice,
    max: maxPrice,
    values: [minPrice, maxPrice],
    slide: function (event, ui) {
      $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);

    }
  });
  $("#amount").val("₹" + $("#slider-range").slider("values", 0) +
    " - ₹" + $("#slider-range").slider("values", 1));

  $("#slider-range").on("slidechange", function (event, ui) {
    minimumPrice = ui.values[0];
    maximumPrice = ui.values[1];
    filterMe();
  });


  document.querySelectorAll('.filter-selector').forEach((element) => {
    element.addEventListener('click', () => {
      filterMe();
    });
  });
  document.querySelector('.filter-onchange-selector').addEventListener('change', () => {
    filterMe();
  });

  if (document.querySelector('.pagination-options').dataset.nextPageUrl.length === 0) {
    document.querySelector('.load-more').style.display = 'none';
  }

});
function get_filter(class_name) {
  let filter = [];
  document.querySelectorAll(`.${class_name}:checked`).forEach((element) => {
    filter.push(element.value);
  });
  return filter;
}

async function filterMe() {
  const colors = get_filter('colors');
  const sizes = get_filter('sizes');
  const brands = get_filter('brands');
  const occasion = get_filter('occasion');
  const availability = get_filter('availabilities');
  const gender = get_filter('genders');
  const sortType = document.querySelector('.sort-type').value;
  const categorySlug = document.querySelector('.categorySlug').value;
  const categories = get_filter('categories');
  const customFilters = get_filter('attributes');
  const paginationOptions = document.querySelector('.pagination-options');

  filterPagination = true;
  let url = route('customer.products-filtered-ajax');
  const response = await axios.get(url, {
    params: {
      minimumPrice, maximumPrice, colors, sizes, brands, occasion, availability, gender, categorySlug, sortType, categories, customFilters
    }
  }, { "X-CSRF-TOKEN": csrfToken });

  const { data: responseData } = response;
  const { data } = responseData;
  const allProducts = data.productsTemplate;
  const productsCount = data.productsCount;
  console.log(productsCount);
  document.querySelector('.products-count').innerHTML = productsCount;

  let productsTemplate = allProducts.map((product) => {
    return `
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 item product-item">
        ${product}
      </div>
      `;
  }).join('');

  if (allProducts.length > 0) {
    document.querySelector('.all-products').innerHTML = productsTemplate;
    localStorage.setItem('filter-url', data.nextPageUrl);
  } else {
    document.querySelector('.all-products').innerHTML = '';
    localStorage.setItem('filter-url', '');
  }

  if (localStorage.getItem('filter-url').length === 0 || localStorage.getItem('filter-url') === 'null') {
    document.querySelector('.load-more').style.display = 'none';
  } else {
    document.querySelector('.load-more').style.display = 'initial';
  }

  history.pushState({}, null, response.request.responseURL.replace('/ajax', ''));
}

async function scrollFilter() {
  if (!fire) return false;


  let url = localStorage.getItem('filter-url');

  console.log(url);

  const response = await axios.get(url);
  const { data: responseData } = response;
  const { status, message, data } = responseData;
  const allProducts = data.productsTemplate;
  localStorage.setItem('filter-url', data.nextPageUrl);

  if (localStorage.getItem('filter-url').length === 0 || !data.hasPages) {
    document.querySelector('.load-more').style.display = 'none';
  }

  let productsTemplate = allProducts.map((product) => {
    return `
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 item product-item">
        ${product}
      </div>
      `;
  }).join('');

  if (allProducts.length > 0) {
    document.querySelector('.all-products').insertAdjacentHTML('beforeend', productsTemplate);

  }
  history.pushState({}, null, response.request.responseURL.replace('/ajax', ''));
}


document.querySelector('.load-more').addEventListener('click', async function (btn) {
  btn.target.setAttribute('disabled', 'disabled');
  btn.target.innerHTML = `
  <div class="spinner-border text-light spinner-border-sm" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
  `;
  if (filterPagination) {
    const response = await scrollFilter();
    btn.target.removeAttribute('disabled');
    btn.target.innerHTML = 'Load More';
    return true;;
  }
  const response = await normalPagination();
  btn.target.removeAttribute('disabled');
  btn.target.innerHTML = 'Load More';
  return true;
});

async function normalPagination() {
  let paginationOptions = document.querySelector('.pagination-options');
  let hasPages = Boolean(paginationOptions.dataset.hasPages);
  let nextPageUrl = paginationOptions.dataset.nextPageUrl;
  if (nextPageUrl.length === 0) {
    return false;
  }


  const response = await axios.get(nextPageUrl, { "Accept": 'application/json' });
  paginationOptions.dataset.nextPageUrl = '';
  const { data: responseData } = response;
  const { status, message, data } = responseData;

  paginationOptions.dataset.hasPages = data.hasPages;
  hasPages = data.hasPages;
  paginationOptions.dataset.nextPageUrl = data.nextPageUrl;
  nextPageUrl = data.nextPageUrl;

  if (nextPageUrl.length === 0) {
    document.querySelector('.load-more').style.display = 'none';
  }

  const allProducts = data.productsTemplate;

  let productsTemplate = allProducts.map((product) => {
    return `
      <div class="col-6 col-sm-6 col-md-3 col-lg-3 item product-item">
      ${product}
      </div>
      `;
  }).join('');

  if (allProducts.length > 0) {
    document.querySelector('.all-products').insertAdjacentHTML('beforeend', productsTemplate);

  }
  productsTemplate = '';
}

window.addEventListener("scroll", () => {
  let scrollTop = window.scrollY;
  let docHeight = document.body.offsetHeight;
  let winHeight = window.innerHeight;
  let scrollPercent = scrollTop / (docHeight - winHeight);
  let scrollPercentRounded = Math.round(scrollPercent * 100);

  if (scrollPercentRounded > 80 && document.querySelector('.load-more').getAttribute('disabled') === null) {
    document.querySelector('.load-more').click();
  }
});