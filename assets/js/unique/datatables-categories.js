// DataTables
$(document).ready(function () {

    const baseUrl = $('#metadata').data('base-url');

    $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: baseUrl + 'ajax/fetch_category_datatable',
          type: "POST"
      },
      "columnDefs": [  
          {  
            "targets": [2, 3],  
            "orderable": false 
          }  
      ],
      "order": [ [0,"ASC"] ]    
    });

    $('#dataTable').on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const btnHref = $(this).data('href');

        console.log(btnHref);

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            document.location.href = btnHref;
          }
        })
    })

});