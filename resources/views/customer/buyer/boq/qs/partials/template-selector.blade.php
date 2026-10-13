{{-- Inline template selector for project BOQ --}}
<div class="card border mb-4" id="projectTemplatePanel">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
            <div>
                <h5 class="card-title mb-1">Project Template</h5>
                <p class="text-muted small mb-0">Select a template for this project. You can change it anytime before submitting.</p>
            </div>
            @if(isset($appliedTemplate) && $appliedTemplate)
                <span class="badge bg-success align-self-start">
                    Active: {{ $appliedTemplate->name }}
                </span>
            @else
                <span class="badge bg-secondary align-self-start">No template applied</span>
            @endif
        </div>

        @if(isset($boqTemplates) && count($boqTemplates) > 0)
            <div class="row align-items-end g-3">
                <div class="col-md-6">
                    <label for="projectTemplateSelect" class="form-label">Choose Template</label>
                    <select id="projectTemplateSelect" class="form-select">
                        <option value="">— Select a template —</option>
                        @foreach($boqTemplates as $template)
                            <option value="{{ $template->id }}"
                                data-items="{{ $template->items_count }}"
                                data-type="{{ $template->template_type ?? '' }}"
                                data-created="{{ $template->created_at->format('d M Y') }}"
                                {{ (isset($appliedTemplate) && $appliedTemplate && $appliedTemplate->id == $template->id) ? 'selected' : '' }}>
                                {{ $template->name }}
                                ({{ $template->items_count }} items)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <div id="selectedTemplateInfo" class="small text-muted {{ (isset($appliedTemplate) && $appliedTemplate) ? '' : 'd-none' }}">
                        @if(isset($appliedTemplate) && $appliedTemplate)
                            <strong>{{ $appliedTemplate->name }}</strong><br>
                            Type: {{ $appliedTemplate->template_type ?? '—' }} |
                            Items: {{ $appliedTemplate->items_count }} |
                            Created: {{ $appliedTemplate->created_at->format('d M Y') }}
                        @endif
                    </div>
                </div>
                <div class="col-12 d-flex flex-wrap gap-2">
                    <button type="button"
                        class="btn btn-primary btn-sm apply-project-template"
                        data-boq-id="{{ $boq->id ?? '' }}"
                        data-has-items="{{ !empty($hasBoqItems) ? '1' : '0' }}"
                        data-applied-id="{{ $appliedTemplate->id ?? '' }}">
                        {{ (isset($appliedTemplate) && $appliedTemplate) ? 'Change Template' : 'Apply Template' }}
                    </button>
                    <button type="button"
                        class="btn btn-outline-danger btn-sm remove-project-template {{ (isset($appliedTemplate) && $appliedTemplate) ? '' : 'd-none' }}"
                        data-boq-id="{{ $boq->id ?? '' }}">
                        Remove Applied Template
                    </button>
                    <a href="#"
                        id="previewSelectedTemplate"
                        class="btn btn-outline-secondary btn-sm {{ (isset($appliedTemplate) && $appliedTemplate) ? '' : 'd-none' }}"
                        target="_blank"
                        data-base-url="{{ url('buyer/boq-template') }}">
                        View Template
                    </a>
                    <a href="{{ route('buyer.boq-templates') }}" class="btn btn-outline-secondary btn-sm">Manage Templates</a>
                </div>
            </div>
        @else
            <div class="alert alert-info mb-0">
                No templates yet.
                <a href="{{ route('buyer.boq-templates') }}">Create one</a> or save an existing BOQ as a template.
            </div>
        @endif
    </div>
</div>
