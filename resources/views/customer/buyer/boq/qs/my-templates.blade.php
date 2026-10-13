@extends('customer.partials-fn.buyer.header')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-4 d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h2 class="mb-1">My BOQ Templates</h2>
                        <p class="text-muted mb-0">Reusable BOQ structures saved from your projects (Architect &amp; QS)</p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap mt-2 mt-md-0">
                        <a href="{{ route('buyer.boq-template-create') }}" class="btn btn-primary btn-sm">Create Template</a>
                        <a href="{{ route('buyer.projects') }}" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
                    </div>
                </div>

                <section class="ps-store-box col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Template Name</th>
                                    <th>Type</th>
                                    <th>Items</th>
                                    <th>Created Date</th>
                                    <th width="220">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($templates as $template)
                                    <tr>
                                        <td>
                                            <a href="{{ route('buyer.boq-template-show', $template->id) }}">
                                                <strong>{{ $template->name }}</strong>
                                            </a>
                                        </td>
                                        <td>{{ $template->template_type ?? '—' }}</td>
                                        <td>{{ $template->items_count }}</td>
                                        <td>{{ $template->created_at->format('d M Y, h:i A') }}</td>
                                        <td>
                                            <a href="{{ route('buyer.boq-template-show', $template->id) }}"
                                                class="btn btn-sm btn-success mb-1">
                                                View
                                            </a>
                                            <a href="{{ route('buyer.boq-template-edit', $template->id) }}"
                                                class="btn btn-sm btn-outline-dark mb-1">
                                                Edit
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary duplicate-boq-template mb-1"
                                                data-template-id="{{ $template->id }}">
                                                Duplicate
                                            </button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger delete-boq-template"
                                                data-template-id="{{ $template->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            No templates yet. Open a project BOQ and use <strong>Save as Template</strong>.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('allUsers/customer/boq-template.js') }}"></script>

@endsection
