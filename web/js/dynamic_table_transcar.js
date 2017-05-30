
	function fnFormatDetails ( oTable, nTr )
		{
			var aData = oTable.fnGetData( nTr );
			var sOut = '<div class="row">';
			sOut += '<div class="col-sm-6">';
			sOut += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
			sOut += '<tr><td>Make:</td><td>'+aData[5]+'</td></tr>';
			sOut += '<tr><td>Model:</td><td>'+aData[6]+'</td></tr>';
			sOut += '<tr><td>MOT Date:</td><td>'+aData[7]+'</td></tr>';
			sOut += '<tr><td>Tax Date:</td><td>'+aData[8]+'</td></tr>';
			sOut += '<tr><td>Breakdown Number:</td><td>'+aData[9]+'</td></tr>';
			sOut += '<tr><td>Membership Number:</td><td>'+aData[10]+'</td></tr>';
			sOut += '</table>';
			sOut += '</div>';
			sOut += '<div class="col-sm-6">';
			sOut += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
			sOut += '<tr><td>Any Issues:</td><td>'+aData[11]+'</td></tr>';
			sOut += '</table>';
			sOut += '</div>';
			sOut += '</div>';

			return sOut;
		}

		$(document).ready(function() {

			/*
			 * Insert a 'details' column to the table
			 */
			var nCloneTh = document.createElement( 'th' );
			var nCloneTd = document.createElement( 'td' );
			nCloneTd.innerHTML = '<img src="/img/details_open.png">';
			nCloneTd.className = "center";

			$('#hidden-table-info thead tr').each( function () {
				this.insertBefore( nCloneTh, this.childNodes[0] );
			} );

			$('#hidden-table-info tbody tr').each( function () {
				this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
			} );

			/*
			 * Initialse DataTables, with no sorting on the 'details' column
			 */
			var oTable = $('#hidden-table-info').dataTable( {
				"aaSorting": [[1, 'asc']]
			});

			/* Add event listener for opening and closing details
			 * Note that the indicator for showing which row is open is not controlled by DataTables,
			 * rather it is done here
			 */
			$(document).on('click','#hidden-table-info tbody td img',function () {
				var nTr = $(this).parents('tr')[0];
				if ( oTable.fnIsOpen(nTr) )
				{
					/* This row is already open - close it */
					this.src = "/img/details_open.png";
					oTable.fnClose( nTr );
				}
				else
				{
					/* Open this row */
					this.src = "/img/details_close.png";
					oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
				}
			} );
		} );


