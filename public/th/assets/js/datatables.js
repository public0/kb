$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ ',
		}
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );

    $('#example1').DataTable({
        sort: true,
        columnDefs: [
            {
                targets: 'no-sort',
                orderable: false
            }, {
                targets: 'datetime-sort',
                type: 'datetime'
            }
        ],
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});

	$('#example3').DataTable({
		pageLength: 50,
		responsive: true,
		sort: false,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});

	$('#triggers_table').DataTable({
		pageLength: 50,
		responsive: true,
		sort: false,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});

	$('#example2').DataTable({
		responsive: true,
        sort: false,
        language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
    $('#example-delete tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	//Details display datatable
	$('#example-1').DataTable( {
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		},
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table border mb-0'
				} )
			}
		}
	} );
	$('#example4').DataTable();
	
	$('#utils-history').DataTable(
		{
        "paging":   false,
        "ordering": false,
        "info":     false
    	} 
	);
	
	$( "#start_date" ).datepicker({ dateFormat: 'dd-mm-yy', firstDay: 1 });
	$( "#end_date" ).datepicker({ dateFormat: 'dd-mm-yy', firstDay: 1 });
});
