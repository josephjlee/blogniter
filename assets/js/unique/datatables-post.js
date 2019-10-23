// DataTables
$(document).ready(function () {

    const baseUrl = $('#metadata').data('base-url');

    $('#dataTable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
          url: baseUrl + 'ajax/fetch_post_datatable',
          type: "POST"
      },
      "columnDefs": [  
          {  
            "targets": [4],  
            "orderable": false 
          }
      ],
      "order": [ [3,"desc"] ]  
    });

    $('#dataTable').on('click', '.btn-delete', function(e) {
        e.preventDefault();
        const btnHref = $(this).data('href');

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