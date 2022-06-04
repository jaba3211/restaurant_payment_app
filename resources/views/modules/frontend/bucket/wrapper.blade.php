@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                @if(count($list) > 0)
                    <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        თქვენი შეკვეთა
                    </h2>
                        @if(!empty(session('error')))
                            <h2 style="color:red">
                                {{ session('error') }}
                            </h2>
                        @endif
                        @include('modules.frontend.bucket.list')
                        <a href="{{ route('bucket.cancel') }}" class="btn btn-danger mt-3">შეკვეთის გაუქმება</a>
                        <a href="{{ route('orders.create') }}" class="btn btn-success mt-3">შეკვეთის დადასტურება</a>
                </div>
                @else
                    @if(!empty(session('success')))
                        <h2 style="color:green">
                            {{ session('success') }}
                        </h2>
                    @endif
                    <div class="d-flex align-items-center flex-column main-comps-container">
                        <h2 class="menu_title my-5">კალათა ცარიელია</h2>
                    </div>
                @endif
            </div>

        </div>
    </main>

    <script>

        /*  plus and minus busket page*/
        var all_single_product_orders=document.querySelectorAll('.single_order_product');


        all_single_product_orders.forEach(element => {

            var minus_btn=element.querySelector('.minus_btn');
            var plus_btn=element.querySelector('.plus_btn');
            var dish_quantity=element.querySelector('.dish_quantity');
            var price_sum=element.querySelector('.price_sum');
            var numberedPriceSum=Number(price_sum.textContent);
            var numberedQuantity=Number(dish_quantity.value);

            plus_btn.addEventListener("click", plusFunc);
            function plusFunc(){
                numberedQuantity++;
                dish_quantity.value=numberedQuantity;
                price_sum.innerHTML=numberedPriceSum*numberedQuantity;
            }
            minus_btn.addEventListener("click", minusFunc);
            function minusFunc(){
                numberedQuantity--;
                if (numberedQuantity<=0) {
                    numberedQuantity=0;
                }
                dish_quantity.value=numberedQuantity;
                price_sum.innerHTML=numberedPriceSum*numberedQuantity;
                // console.log(numberedQuantity);
            }
        });

    </script>
@endsection
