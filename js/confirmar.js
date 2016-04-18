$(document).ready(function() {
	$('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "/examples_support/server_processing.php"
	} );

	
} );





   function ces(s) {
                                    while (s.indexOf('â') != -1) s = s.replace('â','a');
                                    while (s.indexOf('ş') != -1) s = s.replace('ş','s');
                                    while (s.indexOf('ă') != -1) s = s.replace('ă','a');
                                    while (s.indexOf('ţ') != -1) s = s.replace('ţ','t');
                                    return window.btoa(unescape(s))
                                }