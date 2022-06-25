
    var mycards = document.querySelectorAll('.mycard');
    var mybody = document.body;
    // var delete_modal;
    mycards.forEach(e => {

        var deleteLink = e.querySelector('.delete');
        var delete_modal = e.querySelector('.delete_modal');
        var close_btn = e.querySelector('.close_btn');
        var cancel_btn = e.querySelector('.cancel_btn');

        function appear_modal() {
            mybody.classList.add('body_wrapper');
            delete_modal.classList.add('my_show');
        }
        deleteLink.onclick = appear_modal;

        function disappear_modal() {
            mybody.classList.remove('body_wrapper');

            delete_modal.classList.remove('my_show');
        }
        close_btn.onclick = disappear_modal;
        cancel_btn.onclick = disappear_modal;

    });
   /*code for chheckbox is checked*/
    var dish_check_inputs=document.querySelectorAll('.dish_check_input');
    var add_check_btn=document.querySelector('.add_check_btn');
    dish_check_inputs.forEach(e => {
      // e.oninput=function(){
      //   add_check_btn.style.display="block";
      // }
      e.onclick=function(){
       if (e.checked==true) {
                add_check_btn.classList.add('my_show_class');

       }else{
        add_check_btn.classList.remove('my_show_class');

       }
      }
    });
