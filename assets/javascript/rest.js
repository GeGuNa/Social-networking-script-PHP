
var czt_smileshw = 'bb_textarea';

function textArea(text)
{

var CtxtData = $("#bb_textarea").val();

$("#bb_textarea").val(CtxtData+" "+text);
$("#smiles_frame").empty();
$('#smiles_frame').hide();

}






function  display_smiles(id) {


$.get("/api/smiles.php?id="+id).then((data) => {
	$("#smiles_frame").html(data);
});

}


function open_smile_frame() {

if ($("#smiles_frame").html().length == 0) {

$.get("/api/smiles.php").then((data) => {
	$("#smiles_frame").html(data);
});

$("#smiles_frame").show();

} else {

$("#smiles_frame").empty();
$('#smiles_frame').hide();
	
}




}


function closingsmileFrame()
{

$("#smiles_frame").empty();
$("#smiles_frame").hide();

}
