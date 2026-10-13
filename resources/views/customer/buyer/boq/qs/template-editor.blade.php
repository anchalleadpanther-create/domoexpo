@extends('customer.partials-fn.buyer.header')
@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="dot-container toggleLoader d-none">
            <div class="dots"></div>
        </div>

        <style>
            .dot-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                backdrop-filter: blur(6px);
                background: rgba(255, 255, 255, 0.3);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }

            .dots {
                width: 3.2px;
                height: 3.2px;
                border-radius: 50%;
                background-color: #131315;
                box-shadow: 15.2px 0 0 5.6px, 30.4px 0 0 2.4px, 45.6px 0 0 0;
                transform: translateX(-30.4px);
                animation: dots-ijr34dsm 0.5s infinite alternate linear;
            }

            .select2-container--default .select2-selection--single, body .select2 {
                width: 100% !important;
            }

            @keyframes dots-ijr34dsm {
                50% {
                    box-shadow: 15.2px 0 0 2.4px, 30.4px 0 0 5.6px, 45.6px 0 0 2.4px;
                }
                100% {
                    box-shadow: 15.2px 0 0 0, 30.4px 0 0 2.4px, 45.6px 0 0 5.6px;
                }
            }
        </style>

        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-4 d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h2 class="mb-1">{{ isset($template) ? 'Edit BOQ Template' : 'Create BOQ Template' }}</h2>
                        <p class="text-muted mb-0">Templates are private to your buyer account.</p>
                    </div>
                    <a href="{{ route('buyer.boq-templates') }}" class="btn btn-outline-secondary btn-sm">Back to Templates</a>
                </div>

                <div class="ps-my-account">
                    <div class="ps-form--account ps-tab-root ps-form--account-width" style="border-radius:10px !important">

                        <form id="templateEditorForm" class="create-rfq-form" method="post" action="" enctype="multipart/form-data" data-template-id="{{ $template->id ?? '' }}">

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Template Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" maxlength="255" required value="{{ $template->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Template Type</label>
                                        <input type="text" class="form-control" name="template_type" maxlength="255" placeholder="e.g. Residential, Commercial" value="{{ $template->template_type ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-step active">
                                <div id="category-groups-wrapper">

                                    @if(isset($template) && $template->categories->count() > 0)
                                        @foreach($template->categories as $mainKey => $templateCategory)
                                            <div class="category-group border rounded p-3 mb-4">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="form-select parent-category" name="items[{{ $mainKey }}][category_id]" onchange="getMoreCategories(this)">
                                                        <option value="">select</option>
                                                        @foreach(getCategories() as $caetgory)
                                                            <option value="{{ $caetgory->id }}" {{ $templateCategory->category_id == $caetgory->id ? 'selected' : '' }}>{{ $caetgory->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="boq-items-wrapper">
                                                    @forelse($templateCategory->items as $subKey => $subItem)
                                                        <div class="boq-item form-row" data-category-index="{{ $mainKey }}" data-wrapper-child="{{ $subKey }}">
                                                            <div class="form-group col-md-3">
                                                                <label>Sub category</label>
                                                                <select class="form-select sub-category" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                                                                    <option value="">select</option>
                                                                    @if(!empty($templateCategory->category_id))
                                                                        @foreach(getCategories($templateCategory->category_id) as $subcaetgory)
                                                                            <option value="{{ $subcaetgory->id }}" {{ $subItem->sub_category == $subcaetgory->id ? 'selected' : '' }}>{{ $subcaetgory->category_name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="sub-sub-category-div">
                                                                <div class="form-group col-md-12" style="width:250px">
                                                                    <label>Sub Sub Category</label>
                                                                    <select class="form-select sub-sub-category" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][sub_sub_category]">
                                                                        <option value="">Select</option>
                                                                        @if(!empty($subItem->sub_category))
                                                                            @foreach(getCategories($subItem->sub_category) as $subsubcaetgory)
                                                                                <option value="{{ $subsubcaetgory->id }}" {{ $subItem->sub_sub_category == $subsubcaetgory->id ? 'selected' : '' }}>{{ $subsubcaetgory->category_name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label>Description</label>
                                                                <input type="text" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][description]" value="{{ $subItem->description ?? '' }}" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Unit</label>
                                                                <select class="form-select" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][unit]">
                                                                    @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                        <option value="{{ $value->dropdown_value }}" {{ ($subItem->unit ?? '') == $value->dropdown_value ? 'selected' : '' }}>{{ $value->dropdown_value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Qty</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][quantity]" value="{{ $subItem->quantity ?? 0 }}" min="0" class="form-control item-quantity">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Rate</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][rate]" value="{{ $subItem->rate ?? 0 }}" min="0" class="form-control item-rate">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Amount</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][amount]" value="{{ $subItem->amount ?? 0 }}" min="0" class="form-control item-total-amount" readonly>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Upload Reference
                                                                    @if(!empty($subItem->reference_file))
                                                                        <a class="text-success ms-1" target="_blank" href="{{ asset('uploads/rfq/'.$subItem->reference_file) }}" title="Download">
                                                                            <i class="fa fa-download"></i>
                                                                        </a>
                                                                    @endif
                                                                </label>
                                                                <input type="file" name="items[{{ $mainKey }}][category_items][{{ $subKey }}][attachment]" class="form-control">
                                                            </div>

                                                            <div class="form-group col-md-12 text-right">
                                                                <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="boq-item form-row" data-category-index="{{ $mainKey }}" data-wrapper-child="0">
                                                            <div class="form-group col-md-3">
                                                                <label>Sub category</label>
                                                                <select class="form-select sub-category" name="items[{{ $mainKey }}][category_items][0][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                                                                    <option value="">select</option>
                                                                </select>
                                                            </div>
                                                            <div class="sub-sub-category-div"></div>
                                                            <div class="form-group col-md-5">
                                                                <label>Description</label>
                                                                <input type="text" name="items[{{ $mainKey }}][category_items][0][description]" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Unit</label>
                                                                <select class="form-select" name="items[{{ $mainKey }}][category_items][0][unit]">
                                                                    @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                        <option value="{{ $value->dropdown_value }}">{{ $value->dropdown_value }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Qty</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][0][quantity]" min="0" value="0" class="form-control item-quantity">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Rate</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][0][rate]" min="0" value="0" class="form-control item-rate">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Amount</label>
                                                                <input type="number" name="items[{{ $mainKey }}][category_items][0][amount]" min="0" value="0" class="form-control item-total-amount" readonly>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label>Upload Reference</label>
                                                                <input type="file" name="items[{{ $mainKey }}][category_items][0][attachment]" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-12 text-right">
                                                                <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </div>

                                                <div class="mt-2 d-flex justify-content-between flex-wrap gap-2">
                                                    <div>
                                                        <button type="button" class="btn btn-primary btn-sm add-boq-item">+ Add More</button>
                                                    </div>
                                                    <button type="button" class="btn btn-outline-danger btn-sm delete-category-group">Delete Category</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="category-group border rounded p-3 mb-4">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-select parent-category" name="items[0][category_id]" onchange="getMoreCategories(this)">
                                                    <option value="">select</option>
                                                    @foreach(getCategories() as $caetgory)
                                                        <option value="{{ $caetgory->id }}">{{ $caetgory->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="boq-items-wrapper">
                                                <div class="boq-item form-row" data-category-index="0" data-wrapper-child="0">
                                                    <div class="form-group col-md-3">
                                                        <label>Sub category</label>
                                                        <select class="form-select sub-category" name="items[0][category_items][0][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                                                            <option value="">select</option>
                                                        </select>
                                                    </div>

                                                    <div class="sub-sub-category-div"></div>

                                                    <div class="form-group col-md-5">
                                                        <label>Description</label>
                                                        <input type="text" name="items[0][category_items][0][description]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Unit</label>
                                                        <select class="form-select" name="items[0][category_items][0][unit]">
                                                            @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                                                                <option value="{{ $value->dropdown_value }}">{{ $value->dropdown_value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Qty</label>
                                                        <input type="number" name="items[0][category_items][0][quantity]" min="0" value="0" class="form-control item-quantity">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Rate</label>
                                                        <input type="number" name="items[0][category_items][0][rate]" min="0" value="0" class="form-control item-rate">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Amount</label>
                                                        <input type="number" name="items[0][category_items][0][amount]" min="0" value="0" class="form-control item-total-amount" readonly>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Upload Reference</label>
                                                        <input type="file" name="items[0][category_items][0][attachment]" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12 text-right">
                                                        <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-2 d-flex justify-content-between flex-wrap gap-2">
                                                <div>
                                                    <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger btn-sm delete-category-group" style="display: none;">Delete Category</button>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <button type="button" class="btn btn-outline-secondary btn-sm add-category-group">+ Add Category</button>
                            </div>

                            <div class="row form-navigation mt-4">
                                <div class="col-12 d-flex gap-2 flex-wrap">
                                    <button type="submit" class="ps-btn ps-btn--md lightblue-bg px-4" id="saveTemplateEditorBtn">
                                        {{ isset($template) ? 'Update Template' : 'Create Template' }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('allUsers/customer/boq-template.js') }}"></script>

<script>
    const mainCategoryOptions = `@foreach(getCategories() as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                 @endforeach`;
</script>

<script>
// --------Category Data Logic -------------------------------------------------------------

    function getMoreSubCategories(selectElement) {
        const selectedCategoryId = +selectElement.value;
        const type = selectElement.dataset.type;
        let categoryIndex = selectElement.parentElement?.parentElement?.dataset['categoryIndex'];
        let wrapperChildIndex = selectElement.parentElement?.parentElement?.dataset['wrapperChild'];

        if (!selectedCategoryId) return;

        const catData = getCategoryData(selectedCategoryId);

        if (catData?.data?.categories?.length > 0) {
            const optionsTemplate = catData.data.categories.map(category =>
                `<option value="${category.id}" data-category-name="${category.category_name}">${category.category_name}</option>`
            ).join('');

            if (type === 'sub-category') {
                const categoryTemplate = `
                    <div class="form-group col-md-12" style="width:250px">
                        <label>Sub Sub Category</label>
                        <select class="form-select sub-sub-category" name="items[${categoryIndex}][category_items][${wrapperChildIndex}][sub_sub_category]">
                            <option value="">Select</option>
                            ${optionsTemplate}
                        </select>
                    </div>`;

                const container = selectElement.closest('.form-group').nextElementSibling;

                if (container && container.classList.contains('sub-sub-category-div')) {
                    container.innerHTML = categoryTemplate;
                    $(container).find('.sub-sub-category').select2();
                }
            }
        }
    }

    function getMoreCategories(selectEl) {
        let selectedCategoryId = +selectEl.value;
        if (!selectedCategoryId) return;

        const categoryGroup = selectEl.closest('.category-group');
        const subCategorySelects = categoryGroup.querySelectorAll('.sub-category');

        subCategorySelects.forEach(select => {
            select.innerHTML = '<option disabled selected>Loading...</option>';
            select.disabled = true;
        });

        const catData = getCategoryData(selectedCategoryId);
        let optionsTemplate = '<option value="" disabled selected>select</option>';

        if (catData != null) {
            catData.data.categories.forEach(category => {
                optionsTemplate += `<option value="${category.id}" data-category-name="${category.category_name}">${category.category_name}</option>`;
            });
        }

        subCategorySelects.forEach(select => {
            select.innerHTML = optionsTemplate;
            select.disabled = false;
        });
    }

    function getCategoruDataWhenClickAddMore(category_id) {
        let catData = getCategoryData(category_id);
        let optionsTemplate = '';

        if (catData != null) {
            catData.data.categories.forEach(category => {
                optionsTemplate += `<option value="${category.id}" data-category-name="${category.category_name}">${category.category_name}</option>`;
            });
        }
        return optionsTemplate;
    }

    function getCategoryData(category_id) {
        let catData = null;
        let parent_category_id = category_id;
        $.ajax({
            async: false,
            method: "get",
            url: route('get-categories-filters-and-product-types'),
            data: { category_id, parent_category_id },
            dataType: 'json',
            success: function(data) { catData = data; }
        });
        return catData;
    }

// --------Add and Append category Data ---------------------------------------------------

    function initSelect2() {
        $('.custom-select, .form-select').select2({
            width: '100%',
            dropdownCssClass: "max-z-index",
            allowClear: true,
            placeholder: 'Select',
        });
    }

    var categoryIndex = 0;

    function syncCategoryIndex() {
        const wrapper = document.getElementById('category-groups-wrapper');
        if (!wrapper) return;

        let maxIndex = -1;
        wrapper.querySelectorAll('.parent-category').forEach((select) => {
            const match = select.name.match(/items\[(\d+)\]/);
            if (match) {
                maxIndex = Math.max(maxIndex, parseInt(match[1], 10));
            }
        });

        categoryIndex = maxIndex + 1;
    }

    function updateCategoryGroupDeleteButtons() {
        const wrapper = document.getElementById('category-groups-wrapper');
        if (!wrapper) return;

        const groups = wrapper.querySelectorAll('.category-group');
        groups.forEach((group) => {
            const btn = group.querySelector('.delete-category-group');
            if (btn) {
                btn.style.display = groups.length > 1 ? 'inline-block' : 'none';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        syncCategoryIndex();
        document.querySelectorAll('.boq-items-wrapper').forEach(updateDeleteItemButtons);
        updateCategoryGroupDeleteButtons();
        initSelect2();
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('add-category-group')) {
            addCategoryGroup();
        }
    });

    function addCategoryGroup() {
        const wrapper = document.getElementById('category-groups-wrapper');
        const group = document.createElement('div');
        group.className = 'category-group border rounded p-3 mb-4';
        group.setAttribute('data-category-index', categoryIndex);

        group.innerHTML = `
            <div class="form-group">
                <label>Category</label>
                <select class="form-select parent-category" name="items[${categoryIndex}][category_id]" onchange="getMoreCategories(this)">
                    <option value="" disabled selected>select</option>
                    ${mainCategoryOptions}
                </select>
            </div>

            <div class="boq-items-wrapper">
                ${getBoqItemHTML(categoryIndex)}
            </div>

            <div class="mt-2 d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-outline-primary btn-sm add-boq-item">+ Add More</button>
                </div>
                <button type="button" class="btn btn-outline-danger btn-sm delete-category-group">Delete Category</button>
            </div>
        `;

        wrapper.appendChild(group);
        categoryIndex++;
        initSelect2();
        updateCategoryGroupDeleteButtons();
    }

    function getBoqItemHTML(categoryGroupIndex, wrapperChild = 0, optionsTemplate = '') {
        return `
            <div class="boq-item form-row" data-category-index="${categoryGroupIndex}" data-wrapper-child="${wrapperChild}">
                <div class="form-group col-md-3">
                    <label>Sub category</label>
                    <select class="form-select sub-category" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][sub_category]" onchange="getMoreSubCategories(this)" data-type="sub-category">
                        <option value="" disabled selected>select</option>
                        ${optionsTemplate}
                    </select>
                </div>
                <div class="sub-sub-category-div"></div>
                <div class="form-group col-md-5">
                    <label>Description</label>
                    <input type="text" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][description]" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Unit</label>
                    <select class="form-select" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][unit]">
                        @foreach(getDropdowns('Units of Measurement')->dropdownValues as $value)
                            <option value="{{ $value->dropdown_value }}">{{ $value->dropdown_value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Qty</label>
                    <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][quantity]" min="0" class="form-control item-quantity">
                </div>
                <div class="form-group col-md-2">
                    <label>Rate</label>
                    <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][rate]" min="0" class="form-control item-rate">
                </div>
                <div class="form-group col-md-2">
                    <label>Amount</label>
                    <input type="number" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][amount]" min="0" class="form-control item-total-amount" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label>Upload Reference</label>
                    <input type="file" name="items[${categoryGroupIndex}][category_items][${wrapperChild}][attachment]" class="form-control">
                </div>
                <div class="form-group col-md-12 text-right">
                    <button type="button" class="btn btn-sm btn-danger delete-item" style="display: none;">Delete</button>
                </div>
            </div>
        `;
    }

    function updateAmount(row) {
        const quantity = parseFloat(row.querySelector('.item-quantity')?.value) || 0;
        const rate = parseFloat(row.querySelector('.item-rate')?.value) || 0;
        const amountInput = row.querySelector('.item-total-amount');
        if (amountInput) {
            amountInput.value = (quantity * rate).toFixed(2);
        }
    }

    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('item-quantity') || e.target.classList.contains('item-rate')) {
            const row = e.target.closest('.boq-items-wrapper .boq-item');
            if (row) updateAmount(row);
        }
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('add-boq-item')) {
            const group = e.target.closest('.category-group');
            const parentCategoryEle = group.querySelector('.parent-category');
            const parentCategoryId = parentCategoryEle?.value;
            const wrapper = group.querySelector('.boq-items-wrapper');
            let wrapperChild = wrapper.children.length;

            const categoryIndexMatch = parentCategoryEle?.name?.match(/items\[(\d+)\]/);
            var categoryIndexWhenClickAddItem = categoryIndexMatch
                ? parseInt(categoryIndexMatch[1], 10)
                : Array.from(document.querySelectorAll('.category-group')).indexOf(group);

            let subCatOptionsTemplate = '';
            if (parentCategoryId != null && parentCategoryId != '') {
                subCatOptionsTemplate = getCategoruDataWhenClickAddMore(parentCategoryId);
            }

            const newItem = document.createElement('div');
            newItem.innerHTML = getBoqItemHTML(categoryIndexWhenClickAddItem, wrapperChild, subCatOptionsTemplate);
            wrapper.appendChild(newItem.firstElementChild);
            updateDeleteItemButtons(wrapper);
            initSelect2();
        }

        if (e.target.classList.contains('delete-item')) {
            const wrapper = e.target.closest('.boq-items-wrapper');
            const item = e.target.closest('.boq-item');
            if (wrapper.querySelectorAll('.boq-item').length > 1) {
                item.remove();
            }
            updateDeleteItemButtons(wrapper);
        }

        if (e.target.classList.contains('delete-category-group')) {
            const wrapper = document.getElementById('category-groups-wrapper');
            const groups = wrapper?.querySelectorAll('.category-group') ?? [];

            if (groups.length <= 1) return;

            const group = e.target.closest('.category-group');
            if (group) {
                group.remove();
                syncCategoryIndex();
                updateCategoryGroupDeleteButtons();
            }
        }
    });

    function updateDeleteItemButtons(wrapper) {
        const items = wrapper.querySelectorAll('.boq-item');
        items.forEach((item) => {
            const btn = item.querySelector('.delete-item');
            if (btn) {
                btn.style.display = items.length > 1 ? 'inline-block' : 'none';
            }
        });
    }
</script>

<style>
    .form-step { display: none; }
    .form-step.active { display: block; }
</style>

@endsection
