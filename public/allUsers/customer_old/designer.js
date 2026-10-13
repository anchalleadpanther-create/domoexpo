document.querySelectorAll('.change-designer-preference').forEach(button => {
  button.addEventListener('click', async (btn) => {
    const letter = btn.target.dataset.letter;
    scroll(0, 0);
    const response = await axios.get(route('customer.designers', letter), {
      header: {
        'accept': 'application/json'
      }
    });
    const firstBrands = response.data.data.brandsOne;
    const secondBrands = response.data.data.brandsTwo;
    const thirdBrands = response.data.data.brandsThree;
    const fourthBrands = response.data.data.brandsFour;
    const auth = response.data.data.auth;

    document.querySelector('.first-brands').innerHTML =
      firstBrands.map(brand =>
        `<ul class=" list fl-1 list-unstyled m-0">
          <li class="col-6 col-sm-4 col-lg-3 vendor-list-item">
            <div class="row">
              <div class="col-auto pe-0">
                <i ${auth === 'null' ? `data-bs-toggle="modal" data-bs-target="#loginModal"` : ``}
                  class="icon an align-middle ${brand.in_my_wishlist !== 'null' ? 'an-heart-l' : ''}
                  ${brand.in_my_wishlist !== 'null' && auth ? 'wishlist-live-designer-btn' : ''}"
                  data-designer-id="${brand.id}"></i>
              </div>
              <div class="col-auto">
                <a href="${route('customer.designer-products', brand.brand_slug)}"
                  title="${brand.brand_name}">
                  ${brand.brand_name}</a>
                <p style="font-size:9px;">${brand.tag != null ? brand.tag : ''}</p>
              </div>
            </div>
          </li>
        </ul>`
      ).join(' ');

    document.querySelector('.second-brands').innerHTML =
      secondBrands.map(brand =>
        `<ul class=" list fl-1 list-unstyled m-0">
          <li class="col-6 col-sm-4 col-lg-3 vendor-list-item">
            <div class="row">
              <div class="col-auto pe-0">
                <i ${auth === 'null' ? `data-bs-toggle="modal" data-bs-target="#loginModal"` : ``}
                  class="icon an align-middle ${brand.in_my_wishlist !== 'null' ? 'an-heart-l' : ''}
                  ${brand.in_my_wishlist !== 'null' && auth ? 'wishlist-live-designer-btn' : ''}"
                  data-designer-id="${brand.id}"></i>
              </div>
              <div class="col-auto">
                <a href="${route('customer.designer-products', brand.brand_slug)}"
                  title="${brand.brand_name}">
                  ${brand.brand_name}</a>
                <p style="font-size:9px;">${brand.tag != null ? brand.tag : ''}</p>
              </div>
            </div>
          </li>
        </ul>`
      ).join(' ');

    document.querySelector('.third-brands').innerHTML =
      thirdBrands.map(brand =>
        `<ul class=" list fl-1 list-unstyled m-0">
          <li class="col-6 col-sm-4 col-lg-3 vendor-list-item">
            <div class="row">
              <div class="col-auto pe-0">
                <i ${auth === 'null' ? `data-bs-toggle="modal" data-bs-target="#loginModal"` : ``}
                  class="icon an align-middle ${brand.in_my_wishlist !== 'null' ? 'an-heart-l' : ''}
                  ${brand.in_my_wishlist !== 'null' && auth ? 'wishlist-live-designer-btn' : ''}"
                  data-designer-id="${brand.id}"></i>
              </div>
              <div class="col-auto">
                <a href="${route('customer.designer-products', brand.brand_slug)}"
                  title="${brand.brand_name}">
                  ${brand.brand_name}</a>
                <p style="font-size:9px;">${brand.tag != null ? brand.tag : ''}</p>
              </div>
            </div>
          </li>
        </ul>`
      ).join(' ');

    document.querySelector('.fourth-brands').innerHTML =
      fourthBrands.map(brand =>
        `<ul class=" list fl-1 list-unstyled m-0">
          <li class="col-6 col-sm-4 col-lg-3 vendor-list-item">
            <div class="row">
              <div class="col-auto pe-0">
                <i ${auth === 'null' ? `data-bs-toggle="modal" data-bs-target="#loginModal"` : ``}
                  class="icon an align-middle ${brand.in_my_wishlist !== 'null' ? 'an-heart-l' : ''}
                  ${brand.in_my_wishlist !== 'null' && auth ? 'wishlist-live-designer-btn' : ''}"
                  data-designer-id="${brand.id}"></i>
              </div>
              <div class="col-auto">
                <a href="${route('customer.designer-products', brand.brand_slug)}"
                  title="${brand.brand_name}">
                  ${brand.brand_name}</a>
                <p style="font-size:9px;">${brand.tag != null ? brand.tag : ''}</p>
              </div>
            </div>
          </li>
        </ul>`
      ).join(' ');
  });
});