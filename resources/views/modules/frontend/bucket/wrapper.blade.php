@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        თქვენი შეკვეთა
                    </h2>
                    <form action="#" method="POST">
                        <div class="dishes d-flex align-items-center w-100 card mb-3 shadow-sm flex-row single_order_product">
                            <span>
                                <img src="images/mwadi.jpg" alt="" class="img-fluid" width="200">
                            </span>
                            <span class="menu_cat_name ms-3 fw-bold">
                                <div>
                                    მწვადი
                                    <div class="dish_price">
                                        <span class="price_sum">200</span>
                                        <span>₾</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button type="button"
                                            class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center minus_btn"
                                            style="width: 37px; height: 37px; font-size: 18px;">-</button>
                                    <input type="text" value="1" class="form-control w-25 d-inline dish_quantity"
                                           disabled>
                                    <button type="button"
                                            class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center plus_btn"
                                            style="width: 37px; height: 37px; font-size: 18px;">+</button>
                                    <button type="button" class="btn btn-danger">წაშლა</button>
                                </div>
                            </span>
                        </div>
                    </form>

                    <button class="btn btn-danger mt-3">შეკვეთის გაუქმება</button>
                    <button type="submit" class="btn btn-success mt-3">შეკვეთის დადასტურება</button>
                    </form>

                </div>
                <div class="order_price mt-3 fs-3">
                    შეკვეთის ჯამი: <span class="text-danger fw-bold">400₾</span>
                </div>
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
