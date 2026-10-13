import { handleMessage } from "./helpers.js";

const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

function getSelectedTemplateId() {
    const pageSelect = document.getElementById('projectTemplateSelect');
    if (pageSelect?.value) {
        return pageSelect.value;
    }
    const selected = document.querySelector('input[name="selected_template_id"]:checked');
    return selected ? selected.value : null;
}

async function importTemplateToBoq(boqId, templateId, options = {}) {
    const { confirmReplace = false, hasItems = false, appliedId = '' } = options;

    if (!templateId) {
        handleMessage('error', 'Error!', 'Please select a template.');
        return;
    }

    if (hasItems && confirmReplace) {
        const isSame = appliedId && String(appliedId) === String(templateId);
        const msg = isSame
            ? 'Re-apply this template? Existing line items will be replaced.'
            : 'Change template? Existing BOQ line items for this project will be replaced with the selected template.';
        if (!confirm(msg)) {
            return;
        }
    }

    const btn = document.querySelector('.apply-project-template') || document.getElementById('confirmImportBoqTemplate');
    const originalText = btn?.innerHTML;
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = 'Applying...';
    }

    try {
        const response = await axios.post(
            route('buyer.import-boq-template', boqId),
            { template_id: templateId },
            { headers: { 'X-CSRF-TOKEN': csrfToken } }
        );

        handleMessage('success', 'Success!', response.data.message || 'Template applied.');
        const redirect = response.data.data?.redirect;
        if (redirect) {
            window.location.href = redirect;
        } else {
            window.location.reload();
        }
    } catch (error) {
        handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to apply template.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    }
}

function updateTemplateInfoDisplay() {
    const select = document.getElementById('projectTemplateSelect');
    const info = document.getElementById('selectedTemplateInfo');
    const applyBtn = document.querySelector('.apply-project-template');
    const previewLink = document.getElementById('previewSelectedTemplate');
    const removeBtn = document.querySelector('.remove-project-template');
    if (!select || !info) return;

    const option = select.options[select.selectedIndex];
    if (!select.value) {
        info.classList.add('d-none');
        info.innerHTML = '';
        if (applyBtn) applyBtn.textContent = 'Apply Template';
        if (previewLink) previewLink.classList.add('d-none');
        if (removeBtn) removeBtn.classList.add('d-none');
        return;
    }

    const name = option.textContent.trim();
    const type = option.dataset.type || '—';
    const items = option.dataset.items || '0';
    const created = option.dataset.created || '';

    info.classList.remove('d-none');
    info.innerHTML = `<strong>${name}</strong><br>Type: ${type} | Items: ${items} | Created: ${created}`;

    if (previewLink) {
        previewLink.href = `${previewLink.dataset.baseUrl}/${select.value}`;
        previewLink.classList.remove('d-none');
    }

    if (applyBtn) {
        const appliedId = applyBtn.dataset.appliedId || '';
        applyBtn.textContent = appliedId && String(appliedId) === String(select.value)
            ? 'Re-apply Template'
            : (appliedId ? 'Change Template' : 'Apply Template');
        if (removeBtn) {
            removeBtn.classList.toggle('d-none', !appliedId);
        }
    }
}

const templateSelect = document.getElementById('projectTemplateSelect');
if (templateSelect) {
    templateSelect.addEventListener('change', updateTemplateInfoDisplay);
    updateTemplateInfoDisplay();
}

function getProjectBoqId(fallbackId = '') {
    return document.querySelector('input[name="boq_id"]')?.value || fallbackId;
}

document.querySelectorAll('.apply-project-template').forEach((btn) => {
    btn.addEventListener('click', () => {
        const boqId = getProjectBoqId(btn.dataset.boqId);
        if (!boqId) {
            handleMessage('error', 'Error!', 'Please save project info first to get a BOQ ID, then apply a template.');
            return;
        }
        importTemplateToBoq(boqId, getSelectedTemplateId(), {
            confirmReplace: true,
            hasItems: btn.dataset.hasItems === '1',
            appliedId: btn.dataset.appliedId || '',
        });
    });
});

document.querySelectorAll('.remove-project-template').forEach((btn) => {
    btn.addEventListener('click', async () => {
        const boqId = getProjectBoqId(btn.dataset.boqId);
        if (!boqId) {
            handleMessage('error', 'Error!', 'Invalid BOQ selected.');
            return;
        }

        if (!confirm('Remove applied template from this BOQ? Existing BOQ line items from template will be cleared.')) {
            return;
        }

        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = 'Removing...';

        try {
            const response = await axios.delete(
                route('buyer.remove-boq-template-from-project', boqId),
                { headers: { 'X-CSRF-TOKEN': csrfToken } }
            );
            handleMessage('success', 'Success!', response.data?.message || 'Applied template removed.');
            window.location.reload();
        } catch (error) {
            handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to remove applied template.');
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    });
});

function buildSaveTemplateFormData() {
    const saveForm = document.getElementById('saveBoqTemplateForm');
    const boqForm = document.getElementById('boqForm');
    const formData = new FormData();

    if (saveForm) {
        for (const [key, value] of new FormData(saveForm).entries()) {
            formData.append(key, value);
        }
    }

    if (boqForm) {
        const boqFields = new FormData(boqForm);
        for (const [key, value] of boqFields.entries()) {
            if (key.startsWith('items[')) {
                formData.append(key, value);
            }
        }
    }

    return formData;
}

function closeSaveTemplateModal() {
    const modalEl = document.getElementById('saveBoqTemplateModal');
    if (!modalEl) return;
    try {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const instance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            instance.hide();
        } else if (typeof $ !== 'undefined' && $.fn.modal) {
            $(modalEl).modal('hide');
        }
    } catch (e) {
        modalEl.classList.remove('show');
        modalEl.style.display = 'none';
        document.body.classList.remove('modal-open');
        document.querySelector('.modal-backdrop')?.remove();
    }
}

if (document.getElementById('confirmSaveBoqTemplate')) {
    document.getElementById('confirmSaveBoqTemplate').addEventListener('click', async () => {
        const saveForm = document.getElementById('saveBoqTemplateForm');
        const name = saveForm?.querySelector('[name="name"]')?.value?.trim();

        if (!name) {
            handleMessage('error', 'Error!', 'Template name is required.');
            return;
        }

        const btn = document.getElementById('confirmSaveBoqTemplate');
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = 'Saving...';

        try {
            const formData = buildSaveTemplateFormData();
            const response = await axios.post(route('buyer.save-boq-as-template'), formData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'multipart/form-data',
                },
            });

            const isSuccess = response.data?.status === 'success' || response.status === 200;
            if (isSuccess) {
                handleMessage('success', 'Success!', response.data?.message || 'BOQ saved as template successfully.');
                closeSaveTemplateModal();
                saveForm?.reset();
            } else {
                handleMessage('error', 'Error!', response.data?.message || 'Failed to save template.');
            }
        } catch (error) {
            const msg = error.response?.data?.message || error.message || 'Failed to save template.';
            handleMessage('error', 'Error!', msg);
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
        }
    });
}

if (document.getElementById('confirmImportBoqTemplate')) {
    document.getElementById('confirmImportBoqTemplate').addEventListener('click', async () => {
        const boqId = document.getElementById('confirmImportBoqTemplate').dataset.boqId;
        const btn = document.getElementById('confirmImportBoqTemplate');
        btn.disabled = true;
        btn.innerHTML = 'Importing...';

        await importTemplateToBoq(boqId, getSelectedTemplateId(), {
            confirmReplace: false,
            hasItems: false,
        });

        btn.disabled = false;
        btn.innerHTML = 'Import Template';
    });
}

document.querySelectorAll('.duplicate-boq-template').forEach((btn) => {
    btn.addEventListener('click', async () => {
        const templateId = btn.dataset.templateId;
        if (!confirm('Duplicate this template?')) return;

        btn.disabled = true;
        try {
            const response = await axios.post(
                route('buyer.duplicate-boq-template', templateId),
                {},
                { headers: { 'X-CSRF-TOKEN': csrfToken } }
            );
            handleMessage('success', 'Success!', response.data.message || 'Template duplicated.');
            window.location.href = response.data.data?.redirect || window.location.href;
        } catch (error) {
            handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to duplicate template.');
            btn.disabled = false;
        }
    });
});

document.querySelectorAll('.delete-boq-template').forEach((btn) => {
    btn.addEventListener('click', async () => {
        const templateId = btn.dataset.templateId;
        if (!confirm('Delete this template? This cannot be undone.')) return;

        btn.disabled = true;
        try {
            const response = await axios.delete(
                route('buyer.delete-boq-template', templateId),
                { headers: { 'X-CSRF-TOKEN': csrfToken } }
            );
            handleMessage('success', 'Success!', response.data.message || 'Template deleted.');
            const redirect = btn.dataset.redirect;
            if (redirect) {
                window.location.href = redirect;
            } else {
                btn.closest('tr')?.remove();
            }
        } catch (error) {
            handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to delete template.');
            btn.disabled = false;
        }
    });
});

const templateEditorForm = document.getElementById('templateEditorForm');
if (templateEditorForm) {
    const saveBtn = document.getElementById('saveTemplateEditorBtn');

    templateEditorForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const templateId = templateEditorForm.dataset.templateId;
        const isUpdate = !!templateId;
        const endpoint = isUpdate
            ? route('buyer.update-boq-template', templateId)
            : route('buyer.store-boq-template');

        const originalText = saveBtn?.innerHTML || 'Save';
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerHTML = isUpdate ? 'Updating...' : 'Saving...';
        }

        try {
            const formData = new FormData(templateEditorForm);
            if (isUpdate) {
                formData.append('_method', 'PUT');
            }

            const response = await axios.post(endpoint, formData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'multipart/form-data',
                },
            });

            handleMessage('success', 'Success!', response.data?.message || 'Template saved.');
            const redirect = response.data?.data?.redirect;
            if (redirect) {
                window.location.href = redirect;
            } else {
                window.location.href = route('buyer.boq-templates');
            }
        } catch (error) {
            handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to save template.');
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.innerHTML = originalText;
            }
        }
    });
}
