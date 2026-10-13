<?php

namespace App\Http\Controllers\Customer\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\RequestForQuotation;
use App\Models\ChatMessage;
use App\Models\Supplier\Supplier;
use App\Models\Buyer\Buyer;
use Yajra\DataTables\DataTables;

class ChatMessageController extends Controller
{
    public function index(Request $request)
{
    $user  = auth()->guard('buyer')->user();
    $architects  = Buyer::where('account_type','Architect')->get();
    $developers  = Buyer::where('account_type','Developer')->get();
    $contractors = Buyer::where('account_type','Contractor')->get();
    $suppliers   = Supplier::get();

    if ($request->ajax()) {
        // $query = ChatMessage::orderByDesc('id')
        //     ->where(function($q) use ($user) {
        //         $q->where('receiver_id', $user->id)->where('receiver_type', $user->account_type);
        //     })
        //     ->orWhere(function($q) use ($user) {
        //         $q->where('sender_id', $user->id)->where('sender_type', $user->account_type);
        //     });
        
        
        // Subquery: get latest message id for each conversation pair
        $latest = ChatMessage::selectRaw('
                        LEAST(sender_id, receiver_id) as user1,
                        GREATEST(sender_id, receiver_id) as user2,
                        MAX(id) as latest_id
                    ')
                    ->where(function($q) use ($user) {
                        $q->where('sender_id', $user->id)
                          ->where('sender_type', $user->account_type)
                          ->orWhere(function($q2) use ($user) {
                              $q2->where('receiver_id', $user->id)
                                 ->where('receiver_type', $user->account_type);
                          });
                    })
                    ->groupBy('user1', 'user2');

        // Now fetch only the latest messages
        $query = ChatMessage::whereIn('id', $latest->pluck('latest_id'))
                    ->orderByDesc('id');

        return DataTables::of($query)
            ->addColumn('id', function ($row) {
                return 'EN00-' . $row->id;
            })
            
            ->addColumn('user_detail', function ($row) use ($user) {
                // Check if current user is sender or receiver
                if ($row->sender_id == $user->id && $row->sender_type == $user->account_type) {
                    $name = $row->receiver_type . ' #' . $row->receiver_id;
                } else {
                    $name = $row->sender_type . ' #' . $row->sender_id;
                }

                $createdAt = $row->created_at->format('d M Y');
                return "<strong>Name:</strong> $name<br><strong>Created At:</strong> $createdAt";
            })
            
            ->addColumn('action', function ($row) use ($user) {
                // Find the chat partner (other user)
                if ($row->sender_id == $user->id && $row->sender_type == $user->account_type) {
                    $chatWithId = $row->receiver_id;
                    $chatWithType = $row->receiver_type;
                } else {
                    $chatWithId = $row->sender_id;
                    $chatWithType = $row->sender_type;
                }

                $url = route('buyer.chat-box', ['chatWithUserId' => $chatWithId, 'chatWithUserType' => $chatWithType]);
                return "<a href='{$url}' class='btn btn-sm btn-primary'>Chat</a>";
            })
            ->rawColumns(['user_detail', 'action'])
            ->make(true);
    }

    return view('customer.buyer.chat-message.message', compact('architects','developers','contractors','suppliers'));
}

    
    
    public function chatBox(Request $request, $chatWithUserId, $chatWithUserType)
    {
        $user  = auth()->guard('buyer')->user();
    
        $messages = ChatMessage::where(function ($q) use ($user, $chatWithUserId, $chatWithUserType) {
                // Case 1: logged-in user is sender
                $q->where('sender_id', $user->id)
                  ->where('sender_type', $user->account_type)
                  ->where('receiver_id', $chatWithUserId)
                  ->where('receiver_type', $chatWithUserType);
            })
            ->orWhere(function ($q) use ($user, $chatWithUserId, $chatWithUserType) {
                // Case 2: logged-in user is receiver
                $q->where('receiver_id', $user->id)
                  ->where('receiver_type', $user->account_type)
                  ->where('sender_id', $chatWithUserId)
                  ->where('sender_type', $chatWithUserType);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    
        
        // Otherwise load blade view
        return view('customer.buyer.chat-message.chat-box', compact('messages', 'chatWithUserId', 'chatWithUserType'));
    }



    public function saveChatMessage(Request $request)
    {
        $user = auth()->guard('buyer')->user();
    
        // Merge sender info into the request
        $request->merge([
            'sender_type' => $user->account_type,
            'sender_id'   => $user->id,
        ]);
    
        // // Validate incoming data
        // $validated = $request->validate([
        //     'receiver_id'   => 'required|integer',
        //     'receiver_type' => 'required|string',
        //     'message'       => 'required|string',
        // ]);
    
        // Create chat message
        ChatMessage::create([
            'sender_id'     => $user->id,
            'sender_type'   => $user->account_type,
            'receiver_id'   => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'message'       => $request->message,
        ]);
        
        // If AJAX request, return JSON response
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'messages' => $request->message
            ]);
        }
    
    
        return back()->with('success', 'Your message has been sent.');
    }
    
    
    public function getChatMessages(Request $request)
{
    $user = auth()->guard('buyer')->user();

    $receiverId = $request->receiver_id;
    $receiverType = $request->receiver_type;

    $messages = ChatMessage::where(function ($q) use ($user, $receiverId, $receiverType) {
            $q->where('sender_id', $user->id)
              ->where('sender_type', $user->account_type)
              ->where('receiver_id', $receiverId)
              ->where('receiver_type', $receiverType);
        })
        ->orWhere(function ($q) use ($user, $receiverId, $receiverType) {
            $q->where('receiver_id', $user->id)
              ->where('receiver_type', $user->account_type)
              ->where('sender_id', $receiverId)
              ->where('sender_type', $receiverType);
        })
        ->orderBy('created_at', 'asc')
        ->get();

    return view('customer.buyer.chat-message.partials.messages', compact('messages'));
}


}
