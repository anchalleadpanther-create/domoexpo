@foreach($messages as $msg)
    @php
        $cls = $msg->sender_id == auth()->guard('buyer')->id() ? 'sent' : 'received';
    @endphp
    <div class="chat-message {{ $cls }}">
        {{ $msg->message }}
    </div>
@endforeach
