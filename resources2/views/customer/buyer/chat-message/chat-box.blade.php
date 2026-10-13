@extends('customer.partials-fn.buyer.header')
@section('content')

<style>
.chat-container {
    height: 80vh;
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 15px;
    background: #f9f9f9;
}

.chat-message {
    margin-bottom: 10px;
    max-width: 70%;
    word-wrap: break-word;
    display: inline-block;
    padding: 8px 12px;
    border-radius: 15px;
}

.chat-message.sent {
    background: #4CAF50;
    color: white;
    align-self: flex-end;
    float: right;
    clear: both;
}

.chat-message.received {
    background: #e5e5ea;
    color: black;
    align-self: flex-start;
    float: left;
    clear: both;
}

.chat-input {
    border-top: 1px solid #ddd;
    padding: 10px;
    background: #fff;
}
</style>

<div class="container product_table--listing">
    <div class="row justify-content-center">
        <div class="col-lg-9 offset-lg-2">
            <div class="ps-section__right">

            <h3 class="mb-3">Chat Box 
            <!--<span id="chat-with-user">John Doe</span>-->
            </h3>

            <div class="chat-container">
                <!-- Messages -->
                <div id="chat-messages" class="chat-messages">
                    <!-- ✅ Dummy Messages -->
                    
                    @foreach($messages as $chat)
                   
                        @if($chat->sender_id != auth()->guard('buyer')->user()->id)
                            <div class="chat-message received">{{$chat->message}}</div>
                        @else
                            <div class="chat-message sent">{{$chat->message}}</div>
                        @endif
                       
                    @endforeach
                    
                    <!--<div class="chat-message received">I’m fine too. Did you check the new project?</div>-->
                    <!--<div class="chat-message sent">Yes, I reviewed it yesterday. Looks good.</div>-->
                    <!--<div class="chat-message received">Perfect! Let’s finalize it tomorrow.</div>-->
                    <!--<div class="chat-message sent">Sure, works for me 👍</div>-->
                </div>

                <!-- Input -->
                <form id="chat-form" class="chat-input d-flex">
                    @csrf
                    @isset($messages[0]->sender_id)
                        <input type="hidden" name="receiver_id"   id="receiver_id"  
                        value="{{$messages[0]->sender_id == auth()->guard('buyer')->user()->id && $messages[0]->sender_type == auth()->guard('buyer')->user()->account_type ? $messages[0]->receiver_id : $messages[0]->sender_id}}">
                        <input type="hidden" name="receiver_type" id="receiver_type"
                         value="{{$messages[0]->sender_id == auth()->guard('buyer')->user()->id && $messages[0]->sender_type == auth()->guard('buyer')->user()->account_type ? $messages[0]->receiver_type : $messages[0]->sender_type}}">
                    @endisset
                    <textarea name="message" id="chat_message" class="form-control me-2"
                              placeholder="Type a message..." rows="1"></textarea>
                    <button type="submit" class="btn btn-success">Send</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>




<script>
    // Load messages
    function loadMessages(receiverId, receiverType) {
        $.ajax({
            url: "{{ route('buyer.get-chat-messages') }}", // Laravel route
            type: "GET",
            data: { receiver_id: receiverId, receiver_type: receiverType },
            success: function (html) {
                $("#chat-messages").html(html);
                $("#chat-messages").scrollTop($("#chat-messages")[0].scrollHeight);
            },
            error: function (xhr) {
                console.error("Error loading messages:", xhr.responseText);
            }
        });
    }
    
    // Auto refresh every 5s
    // Auto refresh every 1s
    setInterval(function () {
        let receiverId = $("#receiver_id").val();
        let receiverType = $("#receiver_type").val();
    
        if (receiverId && receiverType) {
            loadMessages(receiverId, receiverType);
        }
    }, 10000);

    // Send message
    $("#chat-form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('buyer.save-chat-message') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            headers: {
                Accept: "application/json"
            },
            success: function () {
                $("#chat_message").val("");
                let receiverId = $("#receiver_id").val();
                let receiverType = $("#receiver_type").val();
            
                if (receiverId && receiverType) {
                    loadMessages(receiverId, receiverType);
                }
            }
        });
    });

    // Example: open chat with a user (replace with DataTable click)
    // function openChat(userId, userType, userName) {
    //     $("#chat_receiver_id").val(userId);
    //     $("#chat_receiver_type").val(userType);
    //     $("#chat-with-user").text(userName);
    //     loadMessages(userId, userType);
    // }

    
</script>




<script>
    // Dummy send button action (just appends message locally for demo)
    document.getElementById("chat-form").addEventListener("submit", function(e) {
        e.preventDefault();
        let msg = document.getElementById("chat_message").value.trim();
        if (msg !== "") {
            let newMsg = `<div class="chat-message sent">${msg}</div>`;
            document.getElementById("chat-messages").insertAdjacentHTML("beforeend", newMsg);
            document.getElementById("chat_message").value = "";
            document.getElementById("chat-messages").scrollTop = document.getElementById("chat-messages").scrollHeight;
        }
    });
</script>

@endsection
