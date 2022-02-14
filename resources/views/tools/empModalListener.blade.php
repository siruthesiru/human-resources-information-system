<script>
    var myModal = document.getElementById('empAddModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })

    jQuery(window).load(function(){
        jQuery('#empAddModal').modal('show').on('hide.bs.modal', function(e){
        e.preventDefault();
        });
    });
    
    
    var empAddModal = document.getElementById('empAddModal')

    

    // empViewModal.addEventListener('show.bs.modal', function (event) {
    //     // Button that triggered the modal
    //     var button = event.relatedTarget
    //     // Extract info from data-bs-* attributes
    //     // var employee = button.getAttribute('data-bs-whatever')
    //     // // If necessary, you could initiate an AJAX request here
    //     // // and then do the updating in a callback.
    //     // //
    //     // // Update the modal's content.

    //     // var modalTitle = empEditModal.querySelector('.emp_id')
    //     // var modalBodyInput = empModal.querySelector('.modal-body input')

    //     // modalTitle.textContent = 'New message to ' + recipient
    //     // modalBodyInput.value = recipient
    //     floatingFirst.focus()
    // })

    empAddModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        // var employee = button.getAttribute('data-bs-whatever')
        // // If necessary, you could initiate an AJAX request here
        // // and then do the updating in a callback.
        // //
        // // Update the modal's content.

        // var modalTitle = empEditModal.querySelector('.emp_id')
        // var modalBodyInput = empModal.querySelector('.modal-body input')

        // modalTitle.textContent = 'New message to ' + recipient
        // modalBodyInput.value = recipient
        empAddModal.focus()
    })

    // empEditModal.addEventListener('show.bs.modal', function (event) {
    //     // Button that triggered the modal
    //     var button = event.relatedTarget
    //     // Extract info from data-bs-* attributes
    //     // var employee = button.getAttribute('data-bs-whatever')
    //     // // If necessary, you could initiate an AJAX request here
    //     // // and then do the updating in a callback.
    //     // //
    //     // // Update the modal's content.

    //     // var modalTitle = empEditModal.querySelector('.emp_id')
    //     // var modalBodyInput = empModal.querySelector('.modal-body input')

    //     // modalTitle.textContent = 'New message to ' + recipient
    //     // modalBodyInput.value = recipient
    //     floatingFirst.focus()
    // })
</script>

