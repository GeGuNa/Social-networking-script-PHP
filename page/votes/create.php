<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';

function convertAndBlur($inputIMG, $dst) {

   $img = new Imagick($inputIMG);
 //  $img->cropThumbnailImage($width,$height);
   $img->setImageFormat('jpeg');
  // $img->setImageCompressionQuality($quality);
   $img->writeImage($dst);


   $img->clear(); 
   $img->destroy();



}

function is_image($name) {

$allowedFiles =  array('gif', 'png', 'jpg', 'jpeg', 'webp'); 

$ext = pathinfo($name, PATHINFO_EXTENSION);

if (!in_array($ext, $allowedFiles)) {
    return false;
} else {
	return true;
}

}




if (isset($_POST['createnew']))
{


$title = my_esc($_POST['title']);

if (strlen2($title)>100)Error('დასახელება არ უნდა აღემატებოდეს 128 სიმბოლოს'); 
if (strlen2($title)<3)Error('დასახელება არ უნდა იყოს 3 სიმბოლოზე ნაკლები'); 



$qcnth2mch = count($_POST['variant']);
//Error($qcnth2mch); 
if ($qcnth2mch<2)Error("უუპს"); 
if ($qcnth2mch>10)Error("უუპს"); 




	
for ($i=0; $i < count($_POST['variant']); $i++){
	if (strlen2($_POST['variant'][$i])>125)Error('ვარიანტი №'.$i.' არ უნდა იყოს 125 სიმბოლოზე მეტი');	
	if (strlen2($_POST['variant'][$i])<1)Error('ვარიანტი №'.$i.' არ უნდა იყოს ცარიელი');	
}






if (isset($_FILES["photo"]['name']) && !is_image($_FILES['photo']['name']) && strlen2($_FILES["photo"]['name'])>2) {

Error("დაშვებული ფორმატები gif, png, jpg, jpeg, webp");

}




if (!isset($_SESSION['err'])) {

if (!isset($_FILES["photo"]['name']) || empty($_FILES["photo"]['name'])) {
	
$pdo->query("INSERT INTO `poll` (`time`, `msg`, `id_user`) values(?, ?, ?)", [$time, $title, $user['id']]);
		
$ID = $pdo->getLastInsertedId();				
	
} else {
		
$pdo->query("INSERT INTO `poll` (`time`, `msg`, `id_user`, `image`) values(?, ?, ?, ?)", [$time, $title, $user['id'],'yes']);
		
$ID = $pdo->getLastInsertedId();		
				
$picture = $_FILES['photo']['tmp_name'];	
		
$imgewweee = new Imagick($picture);
		
//@copy($_FILES["photo"]['tmp_name'], H.'plugins/poll/images/'.$ID.'.'.$zzzpwch)
//@chmod(H.'plugins/poll/images/'.$ID.''.$zzzpwch, 0777);

$picturePath = $_SERVER['DOCUMENT_ROOT'].'/page/votes/images/'.$ID.'.jpg';

convertAndBlur($picture, $picturePath);		
			
}


		
	
for ($i=0; $i < count($_POST['variant']); $i++) {
		
$answer = my_esc($_POST['variant'][$i]);
				
$pdo->query("INSERT INTO `poll_variant` (`num`, `answer`, `id_poll`) values(?, ?, ?)", [$i, $answer, $ID]);

}
			
			

		header('Location: poll.php?id='.$ID);

		exit;
	}

}





include '../../inc/header.php';



title();
aut();



?>
<div class="privacyh3">Create a new poll</div>




<div class="ContainerForDivs">
<form method="post" id="myForm" enctype="multipart/form-data" action="create.php">
<textarea name="title" placeholder="Name" maxlength="100"></textarea><br />


<div id="var_list">
<?
for ($i=1; $i<=2; $i++) {
		
echo '<span>Variant №'.$i.'<input type="text" value="" name="variant[]" maxlength="125"></span>';
	
}

?>
</div>


Photo (voluntarily) <br/>
<input type='file' name='photo'> <br/>


<div class="pl_1">
	<div class="W_wpbk21"><div onclick="adding_vars()" value="Add new variant">Add new variant</div> </div>
	<div class="W_wpbk21"><div onclick="Removing_Variants()" value="Remove last variant">Remove last variant </div></div>
</div>



<!--
<button onclick="CzCheckvl()" value="Add" name="createnew">Create </button> 
-->

<input type="submit" onclick="CzCheckvl()" name="createnew" value="Create">

</form> 
</div>



<script>
	
function CzCheckvl() {
	
//echo 'ვარიანტი №'.$i.'<br /><input type="text" value="" name="variant_'.$i.'" maxlength="125"> <br/>';
	

var z42 = document.querySelectorAll("input[name*='variant']")

var ct2ttl = $("textarea[name='title']").val()

var r21 = 0;


if (ct2ttl.length < 3) {
	
r21 = 1;
$("#err_showing").html("გამოკითხვის სახელი არ უნდა იყოს 3 სიმბოლოზე ნაკლები")	

} else if (ct2ttl.length > 100) {
	
r21 = 1;	
$("#err_showing").html("გამოკითხვის სახელი არ უნდა აღემატებოდეს 100 სიმბოლოს")	

} else {
	
for (var i of z42) {
	
//console.log(i.value);
//console.log(i.name);

if (i.value.length <1 || i.value.length>128){
	
r21 = 1;

$("#err_showing").html("არცერთი ველი არ უნდა შეადგენდეს 1 სიმბოლოზე ნაკლებს და 125 სიმბოლოზე მეტს")

break;

} else {
	
r21 = 0;

}

}	
	
}

if (r21 == 1) {
	$("#err_showing").show()
	event.preventDefault();
} else {
	
	//document.querySelector("#myForm").submit()
	
	$("#err_showing").hide()
}


//console.log(z42.length)

}	
	
	/*
document.getElementById("2za").onsubmit = function(event) {

event.preventDefault()
	
};*/
	
	
var czt = 2;

const add_var = () => {
event.preventDefault()	
	
const node = document.getElementById("var_list").lastElementChild;


//node.remove();

//const list = document.getElementById("var_list");

//const node22 = document.createHtmlNode(`<b>qweqw</b>`);

//list.append(node22);

	
	


}

var hwmn = 2;


function Removing_Variants(){

event.preventDefault()

if (hwmn<=2) {
	alert("გამოკითხვა მინიმუმ უნდა შეიცავდე 2 ველს")
	return;
}



let vars2 = document.getElementById('var_list');
vars2.removeChild(vars2.lastElementChild);

hwmn--;
}





function adding_vars(){
event.preventDefault()	
	
	
if (hwmn>10) {
	alert("მხოლოდ 10 არჩევანი შეიძლება იქნეს დამატებული")
	return;
}	

hwmn++;
	
var cz213 = document.createElement("span")	
//cz213.innerHTML = `ვარიანტი №${hwmn}<br /><input type="text" value="" name="variant_${hwmn}" maxlength="125">`;
cz213.innerHTML = `Variant №${hwmn}<br /><input type="text" value="" name="variant[]" maxlength="125">`;

const node = document.getElementById("var_list").lastElementChild;

document.getElementById("var_list").insertAdjacentElement("beforeend", cz213)


}	



	
	
function myFunction(event) {
  event.preventDefault()
}
	

function CheckingValues(event){
	event.preventDefault();
	

}

</script>


<?
include '../../inc/footer.php';
?>
