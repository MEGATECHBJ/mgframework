$(function(){
    $('.datatable').DataTable({
        responsive: true,
        "paging": true,
        "deferRender": true,
        /*"serverSide": true,
        "ajax": $datas,*/
        dom: 'Bfrtip',
        buttons: [
            'excel',
            'print',
            'pdf',
        ]
    });
});
