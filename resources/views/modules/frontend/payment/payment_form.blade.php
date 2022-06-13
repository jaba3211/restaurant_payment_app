<form action="{{ route('payment.submit') }}" method="POST" class="w-100">
    @csrf
    <div class="form-group mb-3 card_number_box">
        <label for="card_number" class="form-label text-danger fw-bold">Card Number</label>
        <p class="text-secondary">Enter the 16-digit card number on the card</p>
        <input type="text" class="form-control" id="card_number" name="card_number"
               placeholder="XXXX - XXXX - XXXX - XXXX">
    </div>
    <div class="form-group mb-3 card_name_box">
        <label for="card_name" class="form-label text-danger fw-bold">Card Name Holder</label>
        <p class="text-secondary">Enter name card holder on the card</p>
        <input type="text" class="form-control" id="card_name" name="full_name" autocomplete="off" required>
    </div>
    <div class="form-group mb-3 card_expdate_box">
        <label for="card_expdate" class="form-label text-danger fw-bold">Expire Date</label>
        <p class="text-secondary">Enter the expiration date of the card</p>
        <div class="d-flex" id="card_expdate">
            <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_month"
                   placeholder="MM" name="month">
            <span class="fs-3 mx-3">/</span>
            <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_year"
                   placeholder="YY" name="year">
        </div>
    </div>
    <div class="form-group mb-3 card_cvv_box">
        <label for="card_cvv" class="form-label text-danger fw-bold">CVV Number</label>
        <p class="text-secondary">Enter the 3 or 4 digits number on the card</p>
        <input type="number" data-maxlength="4" name="cvv" class="form-control" id="card_cvv" required>
    </div>
    <div class="text-center w-100">
        <button type="submit" class="btn btn-danger mt-2">Pay Now</button>
    </div>
</form>
