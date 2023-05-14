<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <style>

    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
    color: white;
    text-shadow: 0 0 7px #f00, 0 0 10px #fb0303, 0 0 21px #ff0303, 0 0 42px #f00, 0 0 82px #f00, 0 0 92px #f00, 0 0 102px #f00, 0 0 151px #f00;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: default;
    color: white !important;
    border: 1px solid transparent;
    background: transparent;
    box-shadow: none;
}

    </style>

    <body>

    <h1 style="position:absolute;top:0;font-size:5rem;color:white;text-shadow: 0 0 7px #f00, 0 0 10px #fb0303, 0 0 21px #ff0303, 0 0 42px #f00, 0 0 82px #f00;">JADED'S AJAX/JSON DATATABLE</h1>

    <div class="container">
        
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Extn.</th>  
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Office</th>
                <th>Start date</th>
                <th>Extn.</th>  
            </tr>
        </tfoot>
        </table>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    
    </body>
</html>
