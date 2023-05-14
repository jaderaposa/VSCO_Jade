

$(document).ready( function () {
    $('#example').DataTable({
        'ajax' : './data/data.json',
        'columns' : [
            {'contacts' : 'id'},
            {'contacts' : 'first_name'},
            {'contacts' : 'last_name'},
            {'contacts' : 'email'},
            {'contacts' : 'location'},
            {'contacts' : 'job_title'}
        ]
    });
} );