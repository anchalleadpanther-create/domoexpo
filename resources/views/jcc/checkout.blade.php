<form action="{{ route('jcc.order') }}" method="POST">
    @csrf
    <label>Amount</label>
    <input type="text" name="amount" value="10.00" required>

    <label>Currency (978 = EUR)</label>
    <input type="text" name="currency" value="978">

    <button type="submit">Pay Now</button>
</form>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif
