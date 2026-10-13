{{-- blade-formatter-disable --}}
<x-mail::message>
# Hello there

We have a new product enquiry by "{{ $data['enquiry']->name }}" on {{ now()->format('d M, Y h:i A') }}

  <x-mail::panel>
    Product: <a href="{{ route('customer.product-detail', [$data['enquiry']->product->mappedCategories->last()->category_slug, $data['enquiry']->product->slug, $data['enquiry']->product->sku, $data['enquiry']->product->uuid]) }}">{{ $data['enquiry']->product->name }} | {{ $data['enquiry']->product->sku }}</a>

    Email: {{ $data['enquiry']->email }}
    Subject: {{ $data['enquiry']->subject }}
    Message: {{ $data['enquiry']->message }}
  </x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>


