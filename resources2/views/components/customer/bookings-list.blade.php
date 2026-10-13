<div class="list-group-item list-group-item-action mb-10 border-1">
  <div class="d-md-flex w-100 justify-content-between mb-1">
    <h5 class="mb-1 text-decoration-underline">{{ $booking->name }}</h5>
    <small class="text-decoration-underline">
      <span class="fw-bold text-secondary">Booking date:</span>
      {{ $booking->date->format('d M Y') }}
      {{ $booking->time->format('H:i A') }}
    </small>
  </div>
  <div class="d-md-flex w-100 justify-content-between mb-3">
    <p class="mb-1 h6">{{ $booking->email }}</p>
    <small>{{ $booking->phone }}</small>
  </div>
  <p class="small">
    <span class="fw-bold text-secondary">Received On:</span>
    {{ $booking->created_at->format('d M Y') }}
  </p>
  <p class="small">
    <span class="fw-bold text-secondary">Mode of Counseling:</span>
    {{ $booking->mode }}
    <i @class([
        'an an-1x',
        'an-google' => $booking->mode === 'Google Meet',
        'an-video' => $booking->mode === 'Zoom Call',
        'an-phone-l' => $booking->mode === 'Phone Call',
    ])></i>
  </p>
  <p class="small">
    <span class="fw-bold text-secondary">Payment:</span>
    {{ number_format($booking->payment, 2) }} |
    <span @class([
        'text-decoration-underline',
        'text-danger' => $booking->payment_status === 'Pending',
        'text-success' => $booking->payment_status === 'Completed',
    ])>{{ $booking->payment_status }}
    </span>
  </p>
  <p class="small">
    <span class="fw-bold text-secondary">Booking Status:</span>
    <span @class([
        'text-decoration-underline',
        'text-danger' => $booking->status === 'Rejected',
        'text-success' => $booking->status === 'Accepted',
    ])>{{ $booking->status }}
    </span>
  </p>
  <p class="small">
    <span class="fw-bold text-secondary">Need Help With:</span>
    {{ $booking->help }}
  </p>
  <div class="btn-group mt-4" data-booking='{{ json_encode($booking) }}'>
    @if ($booking->status === 'Pending' && auth()->user()->is_expert === 1)
      <button type="button" class="btn-outline-info btn-small me-4 toogle-booking-btn" data-status="Accepted">
        <i class="an an-check-badge"></i>
        &nbsp;ACCEPT
      </button>
      <button type="button" class="btn btn-outline-secondary btn-small toogle-booking-btn" data-status="Rejected">
        <i class="an an-times-sql"></i>
        &nbsp;REJECT
      </button>
    @else
      <button type="button" class="btn btn-outline-primary btn-small">
        @if ($booking->status === 'Accepted')
          <i class="an an-check-badge"></i>
        @else
          <i class="an an-times-sql"></i>
        @endif
        &nbsp;Booking {{ $booking->status }}
      </button>
    @endif
  </div>
</div>
