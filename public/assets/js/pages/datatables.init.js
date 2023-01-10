$(document).ready(function() {
    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        searching: false,
        paginate:false,
        buttons: ['excel'],
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    $(".dataTables_length select").addClass('form-select form-select-sm');
    //hide msg "Showing * of * records"
    document.getElementById('datatable-buttons_info').closest('div.row').remove();
});