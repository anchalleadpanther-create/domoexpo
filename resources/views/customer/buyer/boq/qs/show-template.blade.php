@extends('customer.partials-fn.buyer.header')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-3">
            <div class="ps-section__right">
                <div class="ps-form__header mb-4 d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <h2 class="mb-1">{{ $template->name }}</h2>
                        <p class="text-muted mb-0">
                            @if($template->template_type)
                                <span class="me-3"><strong>Type:</strong> {{ $template->template_type }}</span>
                            @endif
                            <span class="me-3"><strong>Items:</strong> {{ $template->items_count }}</span>
                            <span><strong>Created:</strong> {{ $template->created_at->format('d M Y, h:i A') }}</span>
                        </p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap mt-2 mt-md-0">
                        <a href="{{ route('buyer.boq-templates') }}" class="btn btn-outline-secondary btn-sm">Back to Templates</a>
                        <a href="{{ route('buyer.boq-template-edit', $template->id) }}" class="btn btn-outline-dark btn-sm">Edit</a>
                        <button type="button"
                            class="btn btn-outline-primary btn-sm duplicate-boq-template"
                            data-template-id="{{ $template->id }}">
                            Duplicate
                        </button>
                        <button type="button"
                            class="btn btn-outline-danger btn-sm delete-boq-template"
                            data-template-id="{{ $template->id }}"
                            data-redirect="{{ route('buyer.boq-templates') }}">
                            Delete
                        </button>
                    </div>
                </div>

                <section class="ps-store-box col-sm-12">
                    @forelse($template->categories as $category)
                        <div class="border rounded p-3 mb-4">
                            <h5 class="mb-3">
                                {{ $category->category->category_name ?? 'Category #' . $category->category_id }}
                            </h5>

                            @if($category->items->isEmpty())
                                <p class="text-muted mb-0">No items in this category.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Sub Category</th>
                                                <th>Sub Sub Category</th>
                                                <th>Description</th>
                                                <th>Unit</th>
                                                <th class="text-end">Qty</th>
                                                <th class="text-end">Rate</th>
                                                <th class="text-end">Amount</th>
                                                <th>Reference</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($category->items as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->subCategoryRelation->category_name ?? '—' }}</td>
                                                    <td>{{ $item->subSubCategoryRelation->category_name ?? '—' }}</td>
                                                    <td>{{ $item->description ?? '—' }}</td>
                                                    <td>{{ $item->unit ?? '—' }}</td>
                                                    <td class="text-end">{{ $item->quantity ?? 0 }}</td>
                                                    <td class="text-end">{{ number_format($item->rate ?? 0, 2) }}</td>
                                                    <td class="text-end">{{ number_format($item->amount ?? 0, 2) }}</td>
                                                    <td>
                                                        @if(!empty($item->reference_file))
                                                            <a class="text-success" target="_blank" href="{{ asset('uploads/rfq/'.$item->reference_file) }}">
                                                                <i class="fa fa-download"></i> Download
                                                            </a>
                                                        @else
                                                            —
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="alert alert-info mb-0">
                            This template has no categories or items.
                        </div>
                    @endforelse
                </section>

                <p class="text-muted small mt-3 mb-0">
                    Templates include full line-item details: quantities, rates, amounts, and reference files where provided.
                </p>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('allUsers/customer/boq-template.js') }}"></script>

@endsection
