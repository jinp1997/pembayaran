$(document).ready(function() {
    table = $('#mytable').DataTable({      
        "bAutoWidth" : false,
        "pageLength" : 14,
        "bProcessing": true,
        "order": [],
        "ajax": {
            "url": url_list,
            "type": "GET"
        },        
        "columnDefs": [
            { 
                "targets": [ 0 ],
                "orderable": false,
            },
            { 
                "targets": [ -1 ],
                "orderable": false,
            },
        ]
    });
});

function reload_table() {
    table.ajax.reload(null,false);
}