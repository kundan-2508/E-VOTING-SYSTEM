
// toggling add branch button
$(document).ready(function(){
	$("button#add_branch_toggle").click(function(){
		$("#add_branch_window").toggle();
	});
});


// toggling add leader button
$(document).ready(function(){
	$("button#add_leader_toggle").click(function(){
		$("#add_leader_window").toggle();
	});
});

// printing stats div
function printDiv() {
     var printContents = document.getElementById('printStats').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

