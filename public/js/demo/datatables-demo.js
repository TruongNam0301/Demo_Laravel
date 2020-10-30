// Call the dataTables jQuery plugin
$(document).ready(function() {
  
  $('#dataTable').DataTable( {
  "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
  "pageLength": 5
    } );
  $('#dataTable').DataTable();
   $("#dataTable_length").append("<a href='http://127.0.0.1:8000/productsAdmin/create' class='btn btn-success'>ADD New</a>" );
});
