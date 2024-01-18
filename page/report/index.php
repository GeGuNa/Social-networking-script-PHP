<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';


include '../../inc/header.php';


title();
aut();
?>


<div style="background:#fff;">


<div class="rptrz11">Send report</div>


<div class="rptrz11_2">
	<h4>Subject</h4>
	<div>
		<input type="text" placeholder="Subject"/>
	</div>
</div>



<div class="rptrz11_2">
	<h4>Details</h4>
	<div>
		<textarea placeholder="Try to include details"></textarea>
	</div>
</div>



<input type="file" name="kAttach" id="k_sel_zattch1" style="display:none;"/>


<div class="rptrz11_21">
	<div class="pp_repo1z" onclick="kSelFile()"> Attach file </div>
</div>

<div class="rptrz11_2">
<button>Submit</button>
</div>


</div>


<script>
const  kSelFile = (e) => {
	document.querySelector("#k_sel_zattch1").click();
	return false;
};

</script>


<?
include '../../inc/footer.php';
?>
