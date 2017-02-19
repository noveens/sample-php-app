function call_api () {
	var tmp = document.getElementById('inp');
	var data = tmp.value;

	var t = $.post( "https://cotomax-summarizer-text-v1.p.mashape.com/summarizer", 
		{ 
			"X-Mashape-Key": "7SROpIgS0PmshmbUByUzGWU28ko6p1rbV8GjsnxxIQE1KEpMxU",
        	"Content-Type": "application/json",
        	"Accept": "application/json" 
		}
	);

	alert('dd');
}

function add_to (set) {
	document.getElementById('inp2').value = set;
}