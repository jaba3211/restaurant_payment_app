@extends('parent')
@section('content')
    <div id="reader"></div>
    <div class="linking text-center mt-5">
        <a href="#" id="link_to_menu" class="btn btn-success">გადადით ლინკზე</a>
    </div>
    <script src="JS/html5-qrcode.min.js"></script>
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
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
@endsection
