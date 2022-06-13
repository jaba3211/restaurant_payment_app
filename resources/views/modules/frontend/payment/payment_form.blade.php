<form action="{{ route('payment.submit') }}" method="POST" class="w-100">
    @csrf
    @if(!empty(session('error')))
        <p style="color: red">{{ session('error') }}</p>
    @endif
    @error('card_number')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3 card_number_box">
        <label for="card_number" class="form-label text-warning fw-bold">Card Number</label>
        <p class="text-secondary">Enter the 16-digit card number on the card</p>
        <input type="text" class="form-control" id="card_number" name="card_number" value="{{ old('card_number') }}"
               placeholder="XXXX - XXXX - XXXX - XXXX">
    </div>
    @error('full_name')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3 card_name_box">
        <label for="card_name" class="form-label text-warning fw-bold">Card Name Holder</label>
        <p class="text-secondary">Enter name card holder on the card</p>
        <input type="text" class="form-control" value="{{ old('full_name') }}" id="card_name" name="full_name" autocomplete="off">
    </div>
    @error('month')
    <p style="color: red">{{ $message }}</p>
    @enderror
    @error('year')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3 card_expdate_box">
        <label for="card_expdate" class="form-label text-warning fw-bold">Expire Date</label>
        <p class="text-secondary">Enter the expiration date of the card</p>
        <div class="d-flex" id="card_expdate">
            <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_month"
                   placeholder="MM" name="month" value="{{ old('month') }}">
            <span class="fs-3 mx-3">/</span>
            <input type="number" style="width: 60px;" data-maxlength="2" class="form-control" id="card_year"
                   placeholder="YY" name="year" value="{{ old('year') }}">
        </div>
    </div>
    @error('cvv')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3 card_cvv_box">
        <label for="card_cvv" class="form-label text-warning fw-bold">CVV Number</label>
        <p class="text-secondary">Enter the 3 or 4 digits number on the card</p>
        <input type="number" data-maxlength="4" value="{{ old('cvv') }}" name="cvv" class="form-control" id="card_cvv">
    </div>
    <div class="text-center w-100">
        <button type="submit" class="btn btn-warning mt-2">Pay Now</button>
    </div>
</form>

