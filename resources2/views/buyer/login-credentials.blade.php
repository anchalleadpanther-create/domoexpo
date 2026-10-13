@component('mail::message')
  # Hi, {{ $data['userDetails']->fullName }}

  This is your login credentials to log in at "{{ config('app.name') }}".
  {{-- Link: <a href="{{ route('buyer.login') }}">Click here to login</a><br /> --}}

  Username: <u>{{ $data['userDetails']->ar_email }}</u><br />
  Password: <u>{{ $data['password'] }}</u>

  This email contains sensitive information.
  Please do not share this information with anybody.

  Thanks,<br>
  {{ config('app.name') }}
@endcomponent
