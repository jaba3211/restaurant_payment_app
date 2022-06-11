<form action="{{ route('payment.confirm') }}" method="POST">
    @csrf
    <select class="form-select" name="pay" aria-label="Default select example">
        <option value="in_cash">In cash</option>
        <option value="by_card">By credit card</option>
    </select>
    <button type="submit" class="btn btn-success mt-4">Pay</button>
</form>
