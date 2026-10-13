<!-- Modal -->
<div class="modal center-modal" id="table-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title list-heading">Create folder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="list-group list-data">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->

<script>
  function setTableData(e) {
    let type = e.dataset.type;
    let tableData = JSON.parse(e.dataset.tableData);
    let template = '';
    tableData.forEach(element => {
      if(type === 'filter') {
        template += `<a href="javascript:;" class="list-group-item list-group-item-action">${element.filter_name}</a>`;
      } 
      if(type === 'brand') {
        template += `<a href="javascript:;" class="list-group-item list-group-item-action">${element.brand_name}</a>`;
      }
      if(type === 'categories') {
        template += `<a href="${route('admin.category.index', element.id)}" class="list-group-item list-group-item-action">${element.category_name}</a>`;
      }
      if(type === 'blog') {
        template += `<a href="javascript:;" class="list-group-item list-group-item-action">${element.name}</a>`;
      }
      if(type === 'service-categories') {
        template += `<a href="${route('admin.service-category.index', element.id)}" class="list-group-item list-group-item-action">${element.category_name}</a>`;
      }
      
      if(type === 'filter-values') {
        template += `<a href="javascript:;" class="list-group-item list-group-item-action">${element.filter_value}</a>`;
      }
      if(type === 'product-type-values') {
        template += `<a href="javascript:;" class="list-group-item list-group-item-action">${element.type_value}</a>`;
      }
    });
    document.querySelector('.list-heading').textContent = type.toUpperCase();
    document.querySelector('.list-data').innerHTML = template;

  } 
</script>