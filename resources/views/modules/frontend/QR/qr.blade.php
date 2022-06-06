@extends('parent')
@section('content')
<main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid pb-5">
        <div class="container">
            <div id="reader"></div>
            <div class="linking text-center mt-5">
                <a href="http://localhost:8000/categories/2/1" id="link_to_menu" class="btn btn-success">გადადით ლინკზე</a>
            </div>
        </div>
    </div>
</main>
<script src="/html5-qrcode.min.js"></script>
<script>
    var linking = document.querySelector('.linking');
    var linkToMenu = document.getElementById('link_to_menu');

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        linking.style.display = "block";
        linkToMenu.href = decodedText;
        html5QrcodeScanner.clear();
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess);
    //onscanError function should have defined
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>
@endsection