{{-- blade-formatter-disable --}}
<x-mail::message>
# Hello there

Purchase order has been {{ $data['status'] === 1 ? 'accepted' : 'rejected' }} by {{ $data['cancelledBy'] }} on {{ now()->format('d M, Y h:i A') }} for the following order id: {{ $data['orderIds'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
