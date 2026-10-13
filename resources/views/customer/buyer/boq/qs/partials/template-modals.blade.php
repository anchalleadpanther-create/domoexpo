{{-- Save as Template Modal --}}
<div class="modal fade" id="saveBoqTemplateModal" tabindex="-1" aria-labelledby="saveBoqTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="saveBoqTemplateModalLabel">Save BOQ as Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="saveBoqTemplateForm">
                    <input type="hidden" name="boq_id" value="{{ $boq->id ?? ($boqId ?? '') }}">
                    @if(!empty($qsId))
                        <input type="hidden" name="qs_id" value="{{ $qsId }}">
                    @endif
                    <div class="form-group mb-3">
                        <label for="template_name">Template Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="template_name" name="name" required maxlength="255" placeholder="e.g. Residential Standard BOQ">
                    </div>
                    <div class="form-group mb-3">
                        <label for="template_type">Template Type (Optional)</label>
                        <input type="text" class="form-control" id="template_type" name="template_type" maxlength="255" placeholder="e.g. Residential, Commercial">
                    </div>
                    <p class="text-muted small mb-0">All categories, items, quantities, rates, amounts, and reference files will be saved.</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSaveBoqTemplate">Save Template</button>
            </div>
        </div>
    </div>
</div>

{{-- Create From Template Modal --}}
<div class="modal fade" id="importBoqTemplateModal" tabindex="-1" aria-labelledby="importBoqTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importBoqTemplateModalLabel">Create From Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(isset($boqTemplates) && count($boqTemplates) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40"></th>
                                    <th>Template Name</th>
                                    <th>Type</th>
                                    <th>Items</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($boqTemplates as $template)
                                    <tr>
                                        <td>
                                            <input type="radio" name="selected_template_id" value="{{ $template->id }}" class="template-radio" {{ $loop->first ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <strong>{{ $template->name }}</strong>
                                            <a href="{{ route('buyer.boq-template-show', $template->id) }}" class="btn btn-link btn-sm p-0 ms-1" target="_blank">View</a>
                                        </td>
                                        <td>{{ $template->template_type ?? '—' }}</td>
                                        <td>{{ $template->items_count }}</td>
                                        <td>{{ $template->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted small mb-0">Importing creates an independent copy. You can edit quantities, rates, and rows after import. The template will not be modified.</p>
                @else
                    <div class="alert alert-info mb-0">
                        No templates found. Save a BOQ as a template first, or visit
                        <a href="{{ route('buyer.boq-templates') }}">My Templates</a>.
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                @if(isset($boqTemplates) && count($boqTemplates) > 0)
                    <button type="button" class="btn btn-primary" id="confirmImportBoqTemplate" data-boq-id="{{ $boq->id ?? '' }}">Import Template</button>
                @endif
            </div>
        </div>
    </div>
</div>
