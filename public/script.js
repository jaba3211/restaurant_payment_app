
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
   const checkBoxes = document.querySelectorAll('.trigger')
   const cards = document.querySelectorAll('.trigger_card')
   const addButton = document.querySelector('.add_check_btn')
   let selectedCheckBoxes = 0
   let selectedCards = []
   
   checkBoxes.forEach(checkBox => {
       checkBox.onclick = (e) => {
           if (e.target.checked) {
               selectedCheckBoxes++;
               selectedCards.push(e.target.parentNode);
           } else {
               let cardIndex = selectedCards.indexOf(e.target.parentNode);
               selectedCards.splice(cardIndex, 1);
               selectedCheckBoxes--;
           }
           selectedCheckBoxes > 0 ? addButton.classList.add('show-button') : addButton.classList.remove('show-button');
       }
   })
