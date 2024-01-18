function getElem(elem) {
	return document.querySelector(elem);
}

function rRRedRction(url){
	return window.location = url
}


function hdrChDpqwe(){
	

var kkek1 = document.querySelector("#HdrDp11_id")	
var kkek1zAcmqwe = document.querySelector("#ckifUsrbClicked")	


//kkek1zAcmqwe.addEventListener('click', () => {

	kkek1.classList.toggle('HdrDp11_id');

//});
	
}


//jpg jpeg bmp webp gif
function if_image(ttt){
	
const validImageTypes = ['image/gif', 'image/png',  'image/jpeg','image/jpg', 'image/bmp', 'image/x-bmp', 'image/webp'];

return 	validImageTypes.includes(ttt);
	
}


//we could just use xmlhttprequest directly or fetch and just check status of the result 

//XMLHttpRequest
//fetch("").then(()=>)  //
function checkImage(imageSrc, good, bad) {
var img = new Image();
img.onload = good; 
img.onerror = bad;
img.src = imageSrc;
}
    
   // checkImage("foo.gif", function(){ console.log("good"); }, function(){ console.log("bad"); } );

   // checkImage("favicon.ico", function(){ console.log("good"); }, function(){ console.log("bad"); } );



function removeFile() {

var cfz = document.querySelectorAll("input[name=file1]");


cfz[0].value = null;
cfz[0].files = null;
/*	
cfz.forEach(inp => {	

let file = inp.files[0];

console.log(file)

file = null;

console.log(file)
	
})*/
	
	//event.target.value = null;
	
	
	
}

/*
async function get_Data_Msg2() {
  const response = await fetch("");
  const movies = await response.json();
  console.log(movies);
}*/


function RmWhiteSpacesbfandaf(qk) {
	
	//var s1231Qtext = document.querySelectorAll('.editable')[0]
	
//	var l12 = s1231Qtext.innerText.toString()
	
	
	//l12.append(l12.trim())
	
	
	
 // const inputValue = s1231Qtext.innerText.toString();

	
	//s1231Qtext
	
	//console.log(l12)
	//return qk.innerHTML.trim()
	//s1231Qtext.focus()
}

function func_sendMess(to_whom) {

var s1231Qtext = document.querySelectorAll('.editable')[0]
var slText = s1231Qtext.innerText

//slText.toString().trim()

var new1231Textwashed = slText.toString().trim();

if (new1231Textwashed.length  < 1) {
	alert('Text is too short')
	return;
}

/*const data = {
  text: "qweqweqweqweqwe",
  send: "1"
};
*/

const url = `/mail/who.php?who=${to_whom}`;


// Data to send (in x-www-form-urlencoded format)
const data = new URLSearchParams();
data.append('text', new1231Textwashed);
data.append('send', '1');

axios.post(url, data.toString(), {
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded'
  }
})
  .then(response => {
    //console.log(response.data); // Process the response from the server
   location.reload();
  })
  .catch(error => {
    console.error(error); // Handle errors
  });


/*
console.log(data)

axios.post(url, data, {
  withCredentials: true
})
  .then(response => {
    //console.log(response.data); // Process the response from the server
  })
  .catch(error => {
    console.error(error); // Handle errors
  });


*/



	
/*
axios({
  method: 'post',
  url: `/mail/who.php?who=${to_whom}`,
  params: {  
	  text: slText,
	  send: "1",
  },
  responseType: 'html',
  withCredentials: true,
}).then(function (response) {
	 // window.reload = '?id='+to_whom+''
	 // location.reload();
	 console.log(response.data)
});	
	*/
	
	
}

function get_Data_Msg(id2) {
axios({
  method: 'get',
  url: '/api/data.php',
  params: {
	id: id2  
  },
  responseType: 'json',
  withCredentials: true,
})
  .then(function (response) {
   // console.log(response.data)
    
    var dsp13 = `
    
    ${response.data.image.length > 1 ? `<div style="position:relative;overflow:hidden;">
		<img src='/page/notes/images/mini/${response.data.image}.jpg' style='width: calc(100%);'> <br><br>	
    </div>` : ``} 
    
    ${response.data.text}
    
    `;
    
    //<div class="u_blogg21" shw_nffl="<?=$post['id'];?>">
   //document.querySelector("div[shw_nffl='"+id2+"']").setHTML('ქწექწე');
  //document.querySelector("div[shw_nffl='"+id2+"']").innerHTML = 'ქწექწე';
   document.querySelector("div[shw_nffl='"+id2+"']").remove();
  document.querySelector("div[shw_nffl2='"+id2+"']").innerHTML = dsp13;
  
  });

}

/*
function get_Data_Msg(id) {
        fetch({
          method: "GET",
          url: "/api/data.php",
          body: "id="+id,
          credentials: "same-origin",
        }).then(function(data) {
            var ss = data.text;
            
            console.log(ss);
        });


}*/






window.onclick = function(event) {
	

	let cztel = event.target
	
  if (!cztel.matches('.Drpdnw')) {
	  
    var dropdowns = document.getElementsByClassName("drpdmain");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
		openDropdown.style.display = 'none'
    }
    
    
  }
  

/*  
var ss_qt12qf = getElem("#drp_2z_aa_Settings")

var sqwe = ss_qt12qf.style.display


if (sqwe == 'block')$("#drp_2z_aa_Settings").css("display", "none");
*/

}

//var cnblqwe_mnrvqe_st21 = 0;	
	
function User_DropDw() {
	
var ss_qt12qf = getElem("#drp_2z_aa_Settings")

var sqwe = ss_qt12qf.style.display

if (sqwe == 'none')sqwe = 'block'; else sqwe = 'none';

//$("#drp_2z_aa_Settings").css("display", sqwe);



ss_qt12qf.style.display = ''+sqwe

//console.log(sqwe)
//cnblqwe_mnrvqe_st21 = 1;
	
//return false;	
}
	
	
/*	
window.onclick = function(event) {
	
	
let cztel = event.target


  
var ss_qt12qf = getElem("#drp_2z_aa_Settings")

var sqwe = ss_qt12qf.style.display


if (sqwe == 'block')$("#drp_2z_aa_Settings").css("display", "none");



}	
	
	*/
	
	

function ShowThings(evs, type){


const l1 = evs.getAttribute("data_id") 

const l2 = document.querySelector("div[pstevents='"+l1+"']")



    var dropdowns = document.getElementsByClassName("drpdmain");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
		
     var openDropdown = dropdowns[i];
     
		if (openDropdown.getAttribute("pstevents") != l1){
			openDropdown.style.display = 'none'
		}
    }	



if (l2.style.display == 'none') {
	l2.style.display="block"
} else if (l2.style.display == 'block') {
	l2.style.display="none"
} else {
	l2.style.display="none"
}


	
}


/*
 
 

	

function ShowThings(evs){
	
    var dropdowns = document.getElementsByClassName("Drpdnw2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
    	var openDropdown = dropdowns[i];
			openDropdown.style.display = 'none'
    }    
    	

const l1 = evs.getAttribute("data_id") 

const l2 = document.querySelector("div[pstevents='"+l1+"']")
	

    var dropdowns = document.getElementsByClassName("drpdmain");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
		
     var openDropdown = dropdowns[i];
     
		if (openDropdown.getAttribute("pstevents") != l1){
			openDropdown.style.display = 'none'
		}
    }	



if (l2.style.display == 'none') {
	l2.style.display="block"
} else if (l2.style.display == 'block') {
	l2.style.display="none"
} else {
	l2.style.display="none"
}


	
} 
 
 
*/ 
	
	
function Clsmdlfrm2() {
	
var cl1z = document.getElementById("wrngg2");

cl1z.classList.toggle("clr123hst21")



var c12z2z2z = document.getElementsByTagName("body")[0]

c12z2z2z.style="overflow:auto"



event.preventDefault()
}	
	
	

function Shwmdlfrm(){
	
var cl1z = document.getElementById("wrngg2");


var c12z = document.getElementsByTagName("body")[0]
var cl213  = cl1z.classList

var cl1zz2 = cl1z.classList;



	cl1zz2.toggle("clr123hst21")

	c12z.style="overflow:hidden"





	
	event.preventDefault();
}




/*
		
		removeClass: function (selectors, className) {
				if (!(selectors instanceof HTMLElement) && selectors !== null) {
						selectors = document.querySelector(selectors);
				}
				if (e.isVariableDefined(selectors)) {
						selectors.removeClass(className);
				}
		},
		removeAllClass: function (selectors, className) {
				if (e.isVariableDefined(selectors) && (selectors instanceof HTMLElement)) {
						document.querySelectorAll(selectors).forEach((element) => {
								element.removeClass(className);
						});
				}

		},		
		
		
		
		isVariableDefined: function (el) {
				return typeof !!el && (el) != 'undefined' && el != null;
		},
		
		
	getParents: function (el, selector, filter) {
				const result = [];
				const matchesSelector = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;

				// match start from parent
				el = el.parentElement;
				while (el && !matchesSelector.call(el, selector)) {
						if (!filter) {
								if (selector) {
										if (matchesSelector.call(el, selector)) {
												return result.push(el);
										}
								} else {
										result.push(el);
								}
						} else {
								if (matchesSelector.call(el, filter)) {
										result.push(el);
								}
						}
						el = el.parentElement;
						if (e.isVariableDefined(el)) {
								if (matchesSelector.call(el, selector)) {
										return el;
								}
						}

				}
				return result;
		},	
		
		
		navbarDropdownHover: function () {
				e.onAll('.dropdown-menu a.dropdown-item.dropdown-toggle', 'click', function (event) {
						var element = this;
						event.preventDefault();
						event.stopImmediatePropagation();
						if (e.isVariableDefined(element.nextElementSibling) && !element.nextElementSibling.classList.contains("show")) {
								const parents = e.getParents(element, '.dropdown-menu');
								e.removeClass(parents.querySelector('.show'), "show");
								if(e.isVariableDefined(parents.querySelector('.dropdown-opened'))){
										e.removeClass(parents.querySelector('.dropdown-opened'), "dropdown-opened");
								}
						}
						var $subMenu = e.getNextSiblings(element, ".dropdown-menu");
						e.toggleClass($subMenu, "show");
						$subMenu.previousElementSibling.toggleClass('dropdown-opened');
						var parents = e.getParents(element, 'li.nav-item.dropdown.show');
						if (e.isVariableDefined(parents) && parents.length > 0) {
								e.on(parents, 'hidden.bs.dropdown', function (event) {
										e.removeAllClass('.dropdown-submenu .show');
								});
						}
				});
		},
		
		
		onAll: function (selectors, type, listener) {
				document.addEventListener("DOMContentLoaded", () => {
						document.querySelectorAll(selectors).forEach((element) => {
								if (type.indexOf(',') > -1) {
										let types = type.split(',');
										types.forEach((type) => {
												element.addEventListener(type, listener);
										});
								} else {
										element.addEventListener(type, listener);
								}


						});
				});
		},		
		
		
		
*/

function textEscape(stext) {

var SpecialSymbols =  {
    '<': '&lt;',
    '>': '&gt;',
    '(': '&#40;',
    ')': '&#41;',
    '#': '&#35;',
    '&': '&amp;',
    '"': '&quot;',
    "'": '&apos;'
};


}



const escapeHTML = str =>
  str.replace(
    /[&<>'"]/g,
    tag =>
      ({
		'#': '&#35;',
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        "'": '&#39;',
        '"': '&quot;'
      }[tag] || tag)
  );
  
  
  
 
///////



function insertAfterSecondChild2(containerId, htmlCode) {
	
  const container =  document.querySelectorAll(containerId)[0]
  //document.getElementById(containerId);
  
  
  
  if (!container) {
    console.error('Container not found');
    return;
  }

  // Get the reference to the second child node
  const secondChild = container.lastElementChild;

  // Insert the new HTML code after the second child using insertAdjacentHTML
  secondChild.insertAdjacentHTML('beforebegin', htmlCode);
}




///////// 
  
  
  
  
  
  

function get_Data_contacts(ntqpw) {
	

var s1 = document.querySelectorAll(".mess_6")	
	
	
axios({
  method: 'get',
  url: '/api/contacts.php',
  params: {
	page: ntqpw 
  },
  responseType: 'json',
  withCredentials: true,
})
  .then(function (response) {
 
 //console.log(response.data)
 
 for (var ss of response.data) {
	insertAfterSecondChild2(".mess_6",`
	
	
<div class="pointer p_s_shover" onclick="window.location='/mail/who.php?who=${ss.user}'">
		
		


		
		
		<div class="rmsmsg1_1">
	
		
				<div> ${ss.pic}</div>




<div class="rmsmsg1_2">
	
	
	
				<div>
					
						<div class="rmsmsg1_3">
				
							
							<div>${ss.nick}</div>	
							<div><span class="date">${ss.when}</span></div>
										
						</div>
				
				</div>
		
	
	
				<div>
			
					<div class="rmsmsg1_4">		
					
					
							
							<div> <span class="date">${ss.text}</span> </div>
							<div> ${ss.cnt > 0 ? '<span class="kggren123">'+ss.cnt+'</span>' : ''} </div>
							
					</div>		
					
					
				</div>	
				
				
			</div>	
		
		
		
		
			</div>
		
		
		
		
		</div>	
	
	
	
	
	
	 `)
}
  });
  
  var s1 = document.querySelectorAll(".mess_6")[0]
  
  
  


}

////////////////


function insertAfterSecondChild(containerId, htmlCode) {
	
  const container =  document.querySelectorAll(containerId)[0]
  //document.getElementById(containerId);
  
  
  
  if (!container) {
    console.error('Container not found');
    return;
  }

  // Get the reference to the second child node
  const secondChild = container.children[1];

  // Insert the new HTML code after the second child using insertAdjacentHTML
  secondChild.insertAdjacentHTML('afterend', htmlCode);
}


//const htmlCodeToInsert = '<p>This is the new HTML code to insert.</p>';
//insertAfterSecondChild('container', htmlCodeToInsert);



/////////////





/////////////////////////////for messaging






function get_Data_Messages(slide, bywhom, me) {
	

	

var s131zq_lk1 = document.querySelectorAll(".messs_20")[0]
	
	
let y_h = s131zq_lk1.scrollHeight;	
		
//console.log(s131zq_lk1.children[1])	
	
	
axios({
  method: 'get',
  url: '/api/message.php',
  params: {
	page: slide,
	who: bywhom
  },
  responseType: 'json',
  withCredentials: true,
})
  .then(function(response) {
 
 
 var sa123 = Object.values(response.data);
 
 sa123.map((ssw2)=> {
	
	
	

if (ssw2.user == me) {

	//s131zq_lk1.insertAdjacentHTML("afterbegin", 
	insertAfterSecondChild('.messs_20',`
	
		<div class="cm_stex_1">
		
		
		<div>  ${ssw2.pic} </div>
		
		
			
			<div class="cm_stex_2">
				
			
		<div> 
		
		
		
	<div class="XX_msg1">
			
		
		<div class="cm_stex_2">
			<div> ${ssw2.text}  </div>
			<div> <span onclick="ShwMdlFRm(${ssw2.mid});" class="Xmsg1">more_horiz</span> </div>
		</div>	
			
			
		
			
			
		</div>
				
				
				<div class="cm_stex_3">
					
					${ssw2.when}
				
				
					<span class="my_msg1">
						
						${ssw2.read == 0 ? ' <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="15" width="15" xmlns="http://www.w3.org/2000/svg"><polyline points="20 6 9 17 4 12"></polyline></svg> ' : ' <svg stroke="currentColor" fill="#43A047" stroke-width="0" viewBox="0 0 24 24" height="20" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg> '}
						
						</span>
				
				
				
				</div>
		
		
		
		
		</div>
		

		
			</div>
			
			
			
	
				
		
			</div>
			

	
	`)
	
	
	
} else {
	
	
	//s131zq_lk1.insertAdjacentHTML("afterbegin", 
	
insertAfterSecondChild('.messs_20',`
	
		<div class="cm_stex_4">
		
	
			
	<div class="cm_stex_2">
				
			
		<div> 
		
		
		
		<div class="XX_msg31">

			 
			 
	<div class="cm_stex_22">
			<div>	${ssw2.text}   </div>
			<div> <span onclick="ShwMdlFRm(${ssw2.mid});" class="Xmsg1">more_horiz</span> </div>
		</div>				 
			 
			 
			 
			 
			 
			 
		</div>
				
				
				<div class="cm_stex_3">
					
				${ssw2.when}  

				
				</div>
		
		
		
		
		</div>
		

		
			</div>
			
			
	
	
		<div> ${ssw2.pic}   </div>
		
				
		
			</div>
			
			

	
	`)	
	
}
	
	
	 

	


	
	
	
 })
 
 
 
 //console.log(sa123)
 
 /*sa123.map((dk,val)=> {
	console.log(dk[1].mid) 
 })
 */
 
 
 //console.log(sa123)
 
/* 
 for (var [lz] in sa123) {
	console.log(sa123[lz].user)
 }
 */


/*  
 var s = [1,2,3,4,5,6];
 
 s.map(function(kz) {
	
	console.log(kz)
	
});
*/
 
 
// var pdTa = JSON.parse(response.data)
 

 
//s131zq_lk1.scrollTo(0, y_h)


});
  
  var s1 = document.querySelectorAll(".mess_6")[0]
  
  
  

}



function ActiveDiv() {

const activeArea = document.activeElement;


if (activeArea.getAttribute('id')!="ckifUsrbClicked") {

var kkek1 = document.querySelector("#HdrDp11_id")	

	kkek1.classList.add('HdrDp11_id');

}
	
//<div class="relative rel22rctq1312" reaction="11884" id="">	
	
	
//lets check every clicking on the document then lets check if the activeobj is the reaction div  then  add none class to all of them	


//if ($("div[reaction='"+rid+"']").hasClass('none')) {

//<a onclick="ShowingReactionDiv(690326)" href="?id=4" class="clrWpstofLink pointer">Like</a>
//Rct="btn1shSt2"


if (!activeArea.getAttribute('href')!="?id=4_rct" && !activeArea.getAttribute('Rct')) {
	
	
//var sk1 = document.querySelectorAll("div[class='relative'][reaction]")	


var sk1 = document.querySelectorAll("div[reaction]")	
	
//console.log(sk1.length)


for (const div of sk1) {
  //console.log(div.getAttribute('reaction'));
  
 div.classList.add('none') 
  
  
}


/*for(var i=0;  i<sk1.length; i++){
	console.log(sk1[i].innerHTML);
}*/

/*
 
for (const div of divsWithReaction) {
  console.log(div.getAttribute('reaction'));
}


	*/
	
/*for(var i=0; sk1.length < i; i++){
	sk1[i].classList.add('none')
}*/	

//console.log(activeArea)

}


	//console.log(activeArea)	


var lqweKmqwel1231l2Cmej1 = document.querySelector("#emojiPicker")
	
    if (!(event.target.id === "emojiPicker" || event.target.closest("#emojiPicker") || event.target.id === "dsplEmojiChk")) {



if (globMojEmojistat!=1 && lqweKmqwel1231l2Cmej1) {

		emojiPicker.innerHTML = '';
		document.querySelector("#emojiPicker").remove()
}


    } //else {
       // console.log("Clicked outside of the div and its descendants.");
  //  }	
	
	
	
}





function Reacts(rid, type, this2) {
	
	
axios({
  method: 'get',
  url: '/api/reaction.php',
  params: {
	post: rid,
	type: type,
	where: this2.getAttribute('type'),
  },
  responseType: 'json',
  withCredentials: true,
}).then(function (response) {
	  
//console.log(response.data)

})
	
	
	
	
/*	
	
	// !isset($_GET['post']) || !isset($_GET['type'])) {
	* 
	* 

	
*/	
	
//<div st_reactsts="1" lastbtn="frown" id="React_Main" post="11896" class="flreacRendshow1">
						
	
var ttlmmln2_rpc1 = document.querySelectorAll("div[id='React_Main'][post='"+rid+"']")[0]

	
var st_reactSts = ttlmmln2_rpc1.getAttribute('st_reactSts')	
var LasTReactedButton = ttlmmln2_rpc1.getAttribute('lastbtn')			
	
	
//console.log(`sts = ${st_reactSts} = sts \n  last= ${LasTReactedButton}    \ntype = ${type}`)	
	
	
if (LasTReactedButton === type && st_reactSts == 1)	{
	
		
var ttlmmln2_rpc1_old1_zfq = document.querySelectorAll("span[react_type='"+LasTReactedButton+"'][post='"+rid+"']")[0]
	
const q1_zslroq  =  parseInt(ttlmmln2_rpc1_old1_zfq.getAttribute('val'))
	
	
if (q1_zslroq-1 == 0) {
	ttlmmln2_rpc1_old1_zfq.classList.add('none')
} 
	
//<span react_type="wow" val="0" post="11896" class="none">😂</span>

//var ss22_ttl222z_2 = parseInt(ttlmmln2_rpc1.innerText)	
	
	//console.log(`qqq`)
} else if (st_reactSts == 1)	{
	
	
	
var ttlmmln2_rpc1_old1_zfq = document.querySelectorAll("span[react_type='"+LasTReactedButton+"'][post='"+rid+"']")[0]
	
const q1_zslroq  =  parseInt(ttlmmln2_rpc1_old1_zfq.getAttribute('val'))
	
	
if (q1_zslroq-1 == 0) {
	ttlmmln2_rpc1_old1_zfq.classList.add('none')
} 
	
	
	
} 
		

/*
 
ar st_reactSts = 0;
var LasTReactedButton = "";


	<div st_reactSts="1" lastbtn=""   <?=($kq_zz == 0 ? "class='dddl1241_1'" : "");?>  id="React_Main" post="<?=$post['id'];?>"
	
	
	*/
	
	
	
//st_reactSts = 1	
//LasTReactedButton = type
	

//<div <?=($kq_zz == 0 ? "class='none'" : "");?>  id="React_Main" post="<?=$post['id'];?>"
var TotalReactions = document.querySelectorAll("div[id='React_Main'][post='"+rid+"']")[0]

var ss22_ttl = parseInt(TotalReactions.innerText)






//<span style="font-size:12px;padding-left:3px;font-weight: 600;" post_react="11896">0</span>

var TotalReactions22zz = document.querySelectorAll("span[post_react='"+rid+"']")[0]

var ss22_ttl222z_2 = parseInt(TotalReactions22zz.innerText)




var s1_d2 = document.querySelectorAll("div[reaction='"+rid+"']")[0]
s1_d2.classList.add('none')

var s1nqwe = parseInt(this2.getAttribute('val'))


const s1_d2z = document.querySelector('span[react_type="'+type+'"][post="'+rid+'"]');
var s1231 = parseInt(s1_d2z.getAttribute('val'))




///////////showing buttons


var ss1_22cnmtq = parseInt(s1_d2z.getAttribute('val'))

//console.log(ss1_22cnmtq)

if (ss1_22cnmtq == 0) {
	
//s1_d2z.classList.remove('none');
	
	s1_d2z.classList.remove('none')
	//reactedOnn21.setAttribute('val', ss1_22cnmtq+1)
	
}




//////////



if (st_reactSts == 1) {
	

if (type != LasTReactedButton) {
	

	const s1_d2zLast = document.querySelector('span[react_type="'+LasTReactedButton+'"][post="'+rid+'"]');
	
	var s1231z21 = parseInt(s1_d2zLast.getAttribute('val'))

	s1_d2zLast.setAttribute('val', parseInt(s1231z21-1))

	//TotalReactions22zz.innerText = ss22_ttl222z_2-1

	
	
	s1_d2z.setAttribute('val', parseInt(s1231+1));
	
	//TotalReactions22zz.innerText = ss22_ttl222z_2+1
	
	//st_reactSts = 1	
	
	
	ttlmmln2_rpc1.setAttribute('st_reactSts', 1)
	ttlmmln2_rpc1.setAttribute('lastbtn', type)	
	
	
	//LasTReactedButton = type
	
} else {
	
	
	const s1_d2zLast = document.querySelector('span[react_type="'+LasTReactedButton+'"][post="'+rid+'"]');	
	var s1231z21 = parseInt(s1_d2zLast.getAttribute('val'))



////////////
if (type == LasTReactedButton) {
	s1_d2zLast.setAttribute('val', parseInt(s1231z21-1))	
}
	TotalReactions22zz.innerText = parseInt(ss22_ttl222z_2-1)
////////////

ss22_ttl222z_2--;


if (ss22_ttl222z_2 == 0)	{
	TotalReactions.classList.add('dddl1241_1')
}


	
	//st_reactSts = 0
	//LasTReactedButton = ''
	
	
		ttlmmln2_rpc1.setAttribute('st_reactSts', 0)
	ttlmmln2_rpc1.setAttribute('lastbtn', '')	
	
	
}	
	
	
} else {
	
	

	TotalReactions.classList.remove('dddl1241_1')

	
	
////////////	
	s1_d2z.setAttribute('val', parseInt(s1231+1));
	TotalReactions22zz.innerText = parseInt(ss22_ttl222z_2+1)
////////////
	
	//st_reactSts = 1	
	//LasTReactedButton = type
	
	ttlmmln2_rpc1.setAttribute('st_reactSts', 1)
	ttlmmln2_rpc1.setAttribute('lastbtn', type)
	
	
	
}



if (ss1_22cnmtq == 0) {
	
//s1_d2z.classList.remove('none');
	
	s1_d2z.classList.remove('none')
	//reactedOnn21.setAttribute('val', ss1_22cnmtq+1)
	
}


	
}




function ShowingReactionDiv(rid) {







$("div .rel22rctq1312").each(function(index) {
  //console.log(index+": " +$(this).attr("reaction"));
  
  
 

if (rid != $(this).attr("reaction") &&   !$("div[reaction='"+$(this).attr("reaction")+"']").hasClass('none')) {
	
	$("div[reaction='"+$(this).attr("reaction")+"']").addClass('none')
}


});



if ($("div[reaction='"+rid+"']").hasClass('none')) {
	$("div[reaction='"+rid+"']").removeClass('none')
} else {
	$("div[reaction='"+rid+"']").addClass('none')
}


event.preventDefault()


}





//;(function(){

//document.body.addEventListener


document.addEventListener("DOMContentLoaded", function() {

//var BmyWN11EntireOBJ = document.body;

document.body.addEventListener("click", function(event) {

    //console.log("The div has been clicked!");
    
    ActiveDiv()

    
    
});

});

//})();







////////////////////////

var elapsedTimeTag = document.getElementsByClassName("elapsed-time")[0];


function computeElapsedTime(startTime) {
    //record end time
    let endTime = new Date();

    //time difference in ms
    let timeDiff = endTime - startTime;

    //convert time difference from ms to seconds
    timeDiff = timeDiff / 1000;

    //extract integer seconds that dont form a minute using %
    let seconds = Math.floor(timeDiff % 60); //ignoring uncomplete seconds (floor)

    //pad seconds with a zero if neccessary
    seconds = seconds < 10 ? "0" + seconds : seconds;

    //convert time difference from seconds to minutes using %
    timeDiff = Math.floor(timeDiff / 60);

    //extract integer minutes that don't form an hour using %
    let minutes = timeDiff % 60; //no need to floor possible incomplete minutes, becase they've been handled as seconds
    minutes = minutes < 10 ? "0" + minutes : minutes;

    //convert time difference from minutes to hours
    timeDiff = Math.floor(timeDiff / 60);

    //extract integer hours that don't form a day using %
    let hours = timeDiff % 24; //no need to floor possible incomplete hours, becase they've been handled as seconds

    //convert time difference from hours to days
    timeDiff = Math.floor(timeDiff / 24);

    // the rest of timeDiff is number of days
    let days = timeDiff; //add days to hours

    let totalHours = hours + (days * 24);
    totalHours = totalHours < 10 ? "0" + totalHours : totalHours;

    if (totalHours === "00") {
        return minutes + ":" + seconds;
    } else {
        return totalHours + ":" + minutes + ":" + seconds;
    }
}





function handleElapsedRecordingTime() {
    //display inital time when recording begins
    displayElapsedTimeDuringAudioRecording("00:00");

    //create an interval that compute & displays elapsed time, as well as, animate red dot - every second
    elapsedTimeTimer = setInterval(() => {
        //compute the elapsed time every second
        let elapsedTime = computeElapsedTime(audioRecordStartTime); //pass the actual record start time
        //display the elapsed time
        displayElapsedTimeDuringAudioRecording(elapsedTime);
    }, 1000); //every second
}



function displayElapsedTimeDuringAudioRecording(elapsedTime) {
    //1. display the passed elapsed time as the elapsed time in the elapsedTime HTML element
    elapsedTimeTag.innerHTML = elapsedTime;

    //2. Stop the recording when the max number of hours is reached
    if (elapsedTimeReachedMaximumNumberOfHours(elapsedTime)) {
        
    }
}


function elapsedTimeReachedMaximumNumberOfHours(elapsedTime) {
    //Split the elapsed time by the symbo :
    let elapsedTimeSplitted = elapsedTime.split(":");

    //Turn the maximum recording time in hours to a string and pad it with zero if less than 10
    let maximumRecordingTimeInHoursAsString = maximumRecordingTimeInHours < 10 ? "0" + maximumRecordingTimeInHours : maximumRecordingTimeInHours.toString();

    //if it the elapsed time reach hours and also reach the maximum recording time in hours return true
    if (elapsedTimeSplitted.length === 3 && elapsedTimeSplitted[0] === maximumRecordingTimeInHoursAsString)
        return true;
    else //otherwise, return false
        return false;
}





/////////////////




let mediaRecorder = null;
let recordedChunks = [];

var startRecordButton3 
var stopRecordButton2 
var SendRcrdgns1 
let l213rcr 	
let ststoUpld 


function stop_R2ecording(end, start) {
   window.mediaRecorder.stop();
   
   // stop all tracks
   window.mediaStream.getTracks() .forEach((track) => {track.stop();});
   //disable the stop button and enable the start button
   end.disabled = true;
   start.disabled = false;
}


let iFaudioisAvailable = 0

function startRecordings() {
	
var StrTBttn1 = document.querySelector('#stprecord')	
var StrTBttn1 = document.querySelector('#stprecord')	
	
	
const constraints = {
  audio: true
  //video: { width: 1280, height: 720 },
};


let chunks = [];

navigator.mediaDevices.getUserMedia(constraints).then((mediaStream) => {
	  
	  

      const mediaRecorder = new MediaRecorder(mediaStream);

      //const myStream = mediaRecorder.stream;
      //console.log(myStream);

	mediaRecorder.start();



    getElem("#CancelingAudioRecord11ss").addEventListener('click', function() {


	mediaRecorder.stop()


rmAudioAddr()

	mediaStream.getTracks().forEach((track) => {
			if (track.readyState == 'live') {
				track.stop();
			}
		});  


	clearInterval(intervalId);
    
    //StopScrolling()
    
    	const TmCnTrId2 = getElem("#TmCnTrId");
		TmCnTrId2.textContent = "00:00:00";
  
         Tm_seconds = 0;
		 Tm_minutes = 0;
		 Tm_hours = 0;
    
    
    
    getElem("body").style.overflow=""
	
	document.querySelectorAll(".stl121_1")[0].style.display="none"
	document.querySelectorAll(".stl121_11")[0].style.display="none"
	
       
     console.log('Recording canceled and wasn\'t sent ' );



	})



      getElem("#sndRcrdOfAudioblobs").addEventListener('click', function() {
		  

        mediaRecorder.stop();
      
      
      
         mediaRecorder.ondataavailable = function(e) {
		 
		chunks.push(e.data);
    }

	mediaRecorder.onstop = function(e) {
		
	  // console.log(`qwqeqwe`)	    
		
		
		var blobWaves = new Blob(chunks, { 'type' : 'audio/wav' });
		
		
		
	var dataOfFor33ms = new FormData();
	dataOfFor33ms.append('Recording',  blobWaves, "aba.wav");
	dataOfFor33ms.append('text',  "1111233");

	

	uploadFile32sThruFetch(dataOfFor33ms)

	
		
	}; 
      
      
      
 ///////////////     
      
        clearInterval(intervalId);

    	const TmCnTrId2 = getElem("#TmCnTrId");
		TmCnTrId2.textContent = "00:00:00";
  
         Tm_seconds = 0;
		 Tm_minutes = 0;
		 Tm_hours = 0;
    
    
    
    getElem("body").style.overflow=""
	
	document.querySelectorAll(".stl121_1")[0].style.display="none"
	document.querySelectorAll(".stl121_11")[0].style.display="none"
	
       
     console.log('Recording was sent');  
      
      
      
 /////////////////////////     
      
      });


	

	


  })
  .catch((err) => {
    // always check for errors at the end.
    console.error(`${err.name}: ${err.message}`);
  });
  
  
}




		
		let Tm_seconds = 0;
		let Tm_minutes = 0;
		let Tm_hours = 0;
  



    function updateCounterAudioRecordingTime() {

			
		
	 const TmCnTrId2 = getElem("#TmCnTrId");
	
		
      Tm_seconds++;
      if (Tm_seconds === 60) {
        Tm_seconds = 0;
        Tm_minutes++;
        if (Tm_minutes === 60) {
          Tm_minutes = 0;
          Tm_hours++;
        }
      }

      const formattedTime = `
      ${Tm_hours.toString().padStart(2, "0")}:${Tm_minutes.toString().padStart(2, "0")}:${Tm_seconds.toString().padStart(2, "0")}`;
      TmCnTrId2.textContent = formattedTime;
       
       //console.log(formattedTime)
    }

  



function StopScrolling() { 
	
getElem("body").style.overflow="hidden"
	
}

function AllowScroLLing() { 
	
getElem("body").style.overflow=""
	
}


var intervalId = null

document.addEventListener("DOMContentLoaded", () => {
	//StopScrolling()
	
	
	
if (getElem("#starT_Audiorcr11")) {	
	getElem("#starT_Audiorcr11").addEventListener('click', () => {
		
	    iFaudioisAvailable = 0
	  
		intervalId = setInterval(updateCounterAudioRecordingTime, 1000);	  
		
		startRecordings()
		
		StopScrolling()
		  
		ShwmmDD2lfRm()
		  
		console.log('Recording started');
		
	      

  });
  
  
}

/*
   getElem("#CancelingAudioRecord11ss").addEventListener('click', () => {
    
  
  
  
  
    
    clearInterval(intervalId);
    
    //StopScrolling()
    
    	const TmCnTrId2 = getElem("#TmCnTrId");
		TmCnTrId2.textContent = "00:00:00";
  
         Tm_seconds = 0;
		 Tm_minutes = 0;
		 Tm_hours = 0;
    
    
    
    getElem("body").style.overflow=""
	
	document.querySelectorAll(".stl121_1")[0].style.display="none"
	document.querySelectorAll(".stl121_11")[0].style.display="none"
	
       
     console.log('Recording canceled');
  });


*/






 
 /*  getElem("").addEventListener('click', async () => {
      console.log('Uploading recording...');
   });
	*/
	
	
})


/*
  const startBtn = document.getElementById('startBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const uploadBtn = document.getElementById('uploadBtn');
  const form = document.getElementById('recordingForm');
*/




////////uploading   canceling  and starting the voice recording



 



//////////////////////////////////////////////////////////////////



function ShwmmDD2lfRm(){
	
	
	document.querySelectorAll(".stl121_1")[0].style.display="block"
	document.querySelectorAll(".stl121_11")[0].style.display="block"
	
	
}


function RmMd_lf_2rm1() {
	
	StopScrolling()
	
	document.querySelectorAll(".stl121_1")[0].style.display="none"
	document.querySelectorAll(".stl121_11")[0].style.display="none"
	clearInterval(intervalId);
	
}



function rmAudioAddr() {


if (document.querySelector("input[name='voiceaddr']")) {

	const rmAudm211 = document.querySelector("input[name='voiceaddr']")
	rmAudm211.remove()

}

var l1za = document.querySelector("#dispaudioNm")

document.querySelector("#vcNma").innerHTML = ""


//l1za.textContent = '';
l1za.style.display = 'none'




//console.log(rmAudm211)
	
}


async function uploadFile32sThruFetch(formData) {

  try {
	  
    const response = await fetch("http://localhost:1252/aba.php", {
      method: "POST",
      body: formData,
    });
    
    const result = await response.text();
   // const result = await response.json();
    //console.log("Success:", result);
    //console.log(result);
    
const form3z11 = getElem("#postForm");
const inputElemen22t = document.createElement("input");
	
var lprs = JSON.parse(result);	
	

inputElemen22t.type = "hidden";
inputElemen22t.name = "voiceaddr";
inputElemen22t.value = lprs.lnk


form3z11.appendChild(inputElemen22t);


getElem("#dispaudioNm").style.display="block"
getElem("#vcNma").innerHTML = lprs.lnk
    
    
    
  } catch (error) {
    console.error("Error:", error);
  }
}


















function uploadFilesThruFetch23(formData) {



axios({
  method: 'post',
  url: 'http://localhost:1252/aba.php',
  params: formData,
  withCredentials: true,
  responseType: 'json',
}).then(response => {
	  
console.log(`eqweqwe`)


const form3z11 = getElem("#postForm");
const inputElemen22t = document.createElement("input");
	

inputElemen22t.type = "hidden";
inputElemen22t.name = "voiceaddr";
inputElemen22t.value = '123123123'


form3z11.appendChild(inputElemen22t);


}).catch(error => {
	
	console.error(error); 
})




    
  
  

    
  // console.log(`qweqweqweqw`) 
   
    
   
   // alert(result)
   // const result = await response.json();
    //console.log("Success:", result);
    
    // Select the first form element
    
/*
const form = document.querySelector("#postForm3");

const inputElement = document.createElement("input");
inputElement.type = "hidden";
inputElement.name = "voiceaddr";
inputElement.value = '123123123'


form.appendChild(inputElement);
*/  



}



/////////////////


async function getMedia(constraints) {
	

	if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
	  alert('Your browser does not support recording!');
	  return;
	}		
	
	
  let stream = null;

  try {
    stream = await navigator.mediaDevices.getUserMedia(constraints);
    /* use the stream */
  } catch (err) {
    /* handle the error */
  }
}







//var cl1z = document.getElementById("wrngg2");


function startRecordingProcess() {
	
var ltxmmmll123123 = document.querySelector("textarea[name='msgs']");	
	
	if (ltxmmmll123123.length<1){ 
		alert('იმისათვის რომ გაგზავნოთ  ვოისი საჭიროა მინიმუმ 1 სიმბოლოს დაწერა ვოისის ჩაწერამდე')
		return;
	}
	
	
	
	
 startRecordButton3 = document.querySelector("#strRecording");
 stopRecordButton2 = document.querySelector("#stprecord");
 SendRcrdgns1 = document.querySelector("#sendRcrdgns");
	
	
document.querySelector("#MessageForm").style.display="none"	
	
	
	

	
	startRecording()
}

let sttmintrvlfrTmcnt1 = 0
let s1xmqwe11

function tmcntlww1() {
	sttmintrvlfrTmcnt1++;
	
	var ltmcnt21 = document.querySelector("#TmCntr1")
	
	//var tmvl21 = ltmcnt21.innerHTML.toString().split(":")
	var tmvl21 = ltmcnt21.innerHTML.split(":")
	
    var frvaltm
	
	
	var scvaltm1
		
	
	
	
	if (sttmintrvlfrTmcnt1<60) {
		frvaltm = '00';
		scvaltm1 = sttmintrvlfrTmcnt1
	} else if (sttmintrvlfrTmcnt1>60) {
		frvaltm = '01';
		scvaltm1 = parseInt(sttmintrvlfrTmcnt1-60)
	} else if (sttmintrvlfrTmcnt1==60) {
		frvaltm = '01';
		scvaltm1 = parseInt(sttmintrvlfrTmcnt1-60)
	} else if (sttmintrvlfrTmcnt1>60 && 120<=sttmintrvlfrTmcnt1) {
		frvaltm = '02';
		scvaltm1 = parseInt(sttmintrvlfrTmcnt1-60)
	}  else {
		frvaltm = null
		scvaltm1 = null
	}
	
  	
	
	
	
	ltmcnt21.innerHTML = frvaltm+":"+scvaltm1
	
	if (sttmintrvlfrTmcnt1 == 10) { 
		clearInterval(s1xmqwe11)
		sttmintrvlfrTmcnt1 = 0
	}
	
}


async function startRecording() {
	
	
	if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
	  alert('Your browser does not support recording!');
	  return;
	}	
	
	
/* 	
	

	
*/	

//sttmintrvlfrTmcnt1 = setInterval(tmcntlww1, 1000)

s1xmqwe11 = setInterval(tmcntlww1, 1000)
 
	
	startRecordButton3.style.display="none"
	stopRecordButton2.style.display="block"
	SendRcrdgns1.style.display="block"	

	 let legacyApi =
    navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia;	
	
	
	
 
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });

    mediaRecorder = new MediaRecorder(stream);
    
    
    mediaRecorder.start();
    
   // startRecordButton.disabled = true;
    //stopRecordButton.disabled = false;
}


function stopRecording() {
	
 // if (mediaRecorder && mediaRecorder.state !== "inactive") {
	document.querySelector("#MessageForm").style.display="block"	
  
	  mediaRecorder.stop();
	//mediaRecorder.stream.getTracks().forEach(track => track.stop());		
	  const tracks = mediaRecorder.stream.getTracks();

	  tracks.forEach((track) => {
		track.stop();
	  });
      
 recordedChunks = [];
   l213rcr = null
//stream.getTracks().forEach(function(track) { track.stop(); });   
      

	startRecordButton3.style.display="block"
	stopRecordButton2.style.display="none"
	SendRcrdgns1.style.display="none"	
  
  
  	clearInterval(s1xmqwe11)	
	sttmintrvlfrTmcnt1 = 0
  
  
    //}
}


function pad(val) {
	
  var valString = val + "";
  
  if (valString.length < 2) {
		return "0" + valString;
  } else {
		return valString;
  }
  
}
	  
	 


function SendingRecordings() {
	
	
document.querySelector("#MessageForm").style.display="block"	

  	clearInterval(s1xmqwe11)	
	sttmintrvlfrTmcnt1 = 0

		
mediaRecorder.stop();



	
mediaRecorder.ondataavailable = event => {
        if (event.data.size > 0) {
            recordedChunks.push(event.data);
        } 
    };

    mediaRecorder.onstop = () => {
		var l213rcr = new Blob(recordedChunks, { type: "audio/wav" });


	var dataOfFor33ms = new FormData();
	dataOfFor33ms.append('Recording',  l213rcr, "aba.wav");

	uploadFilesThruFetch(dataOfFor33ms)



    };
	
	
	


	
//location.reload();

	startRecordButton3.style.display="block"
	stopRecordButton2.style.display="none"
	SendRcrdgns1.style.display="none"	 


	 const tracks = mediaRecorder.stream.getTracks();

	  tracks.forEach((track) => {
		track.stop();
	  });	




	

l213rcr = null
recordedChunks = [];	
	
}





//async function uploa22d() {


//uploa22d(dataOfFor33ms);





function Uploadrecordings() {
    if (mediaRecorder && mediaRecorder.state !== "inactive") {
        mediaRecorder.stop();
        
        
    }
}





/*
stream.getTracks().forEach(track => track.stop())

     const tracks = mediaStream.getTracks();
      tracks[0].stop();

*/

// stop both mic and camera
function stopBothVideoAndAudio(stream) {
    stream.getTracks().forEach((track) => {
        if (track.readyState == 'live') {
            track.stop();
        }
    });
}

// stop only camera
function stopVideoOnly(stream) {
    stream.getTracks().forEach((track) => {
        if (track.readyState == 'live' && track.kind === 'video') {
            track.stop();
        }
    });
}

// stop only mic
function stopAudioOnly(stream) {
    stream.getTracks().forEach((track) => {
        if (track.readyState == 'live' && track.kind === 'audio') {
            track.stop();
        }
    });
}






function fetChTest(){
	
	
const url = "http://localhost:1252"; // Replace with your API upload endpoint URL

const data = {
  value1: 15,
  value2: "buha 253"
};

const fileInput = document.getElementById("fileInput"); // Replace with your file input element

const formData = new FormData();
//formData.append("json_data", JSON.stringify(data));
//formData.append("uploaded_file", fileInput.files[0]);


formData.append("json_data", "ქწექწექწე");
formData.append("uploaded_file", "კუკკქწე");


/*


new URLSearchParams({
        'userName': 'test@gmail.com',
        'password': 'Password!',
        'grant_type': 'password'
    })


*/


var dataOfForms = new URLSearchParams();
dataOfForms.append('userName', 'test@gmail.com');
dataOfForms.append('password', 'Password');
dataOfForms.append('grant_type', 'password');


//const formData = new FormData();


const options = {
  method: "POST",
 // headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'},
  credentials: "include" // This enables sending cookies and authentication data
};





fetch(url, options)
  .then(response => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    
   //console.log(response.data) 
    
     //console.log(response);
  })
  .then(data => {
   //console.log(data);
  })
  .catch(error => {
    console.error("Fetch error:", error);
  });	
	
}


//fetChTest();


const checkNriFHasActive22 = id => {
  const element = document.querySelector(id)
  const isNotNum = element.classList.contains('')
  element.classList.add(isNotNum ? "uRcrDwqweq" : "uRcrDwqweq1");
}


let cssStyle = (el, styles) => {
      for (var property in styles) {
          el.style[property] = styles[property];
      }
};



/*
 
 

      // set the date we are counting down to
      var countDown = new Date("jan 1, 2027 12:12:50").getTime();
     
      //update the count down in every 1 second
      var update = setInterval(function () {
     
         // get the today's date and time
         var now = new Date().getTime();
       
         //find the difference b/w countDown and now
         var diff = countDown - now;
       
         //now we are calculating time in days, hrs, minutes, and seconds.
         var days = Math.floor(diff / (1000 * 60 * 60 * 24));
         var hrs = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((diff % (1000 * 60)) / 1000);
       
         //now output the result in an element with id ="time"
         document.getElementById("time").innerHTML =
         days + "-D: " + hrs + "-H: " + minutes + "-M: " + seconds + "-S ";
         if (diff < 0) {
            clearInterval(update);
            document.getElementById("time").innerHTML = "Expired";
         }
      }, 1000); 
 
 
var counter = 10;
setInterval(function(){
  console.log(counter);
  counter--
  if (counter === 0) {
    console.log("HAPPY NEW YEAR!!");
  }
}, 1000); 
 
 
 */







/*
function loadScript(sURL, onLoad) {
  var loadScriptHandler = function() {
    var rs = this.readyState;
    if (rs === 'loaded' || rs === 'complete') {
      this.onreadystatechange = null;
      this.onload = null;
      window.setTimeout(onLoad, 20);
    }
  };
  function scriptOnload() {
    this.onreadystatechange = null;
    this.onload = null;
    window.setTimeout(onLoad, 20);
  }
  var oS = document.createElement('script');
  oS.type = 'text/javascript';
  if (onLoad) {
    oS.onreadystatechange = loadScriptHandler;
    oS.onload = scriptOnload;
  }
  oS.src = sURL;
  document.getElementsByTagName('head')[0].appendChild(oS);
}


function getLiveData() {
  loadScript('aba.js');
}




let audioplayer = function () {
    var musicFilesId = [],
        volume = 100,
        duration = 0,
        durationEstimate = 0,
        loadLine = 0,
        playlist =
            {
                playing_id: null,
                state: 'stop',
                last_play_id: null,
                progress: true,
            },
        audio = {
            stop: function (t) {
                var n = $("#audio" + t);
                $("#audio" + t + " .ai_dur").text('');
                n.removeClass("ai_playing ai_current");
                playlist.progress = true;
                playlist.state = 'stop';
                playlist.last_play_id = null;
                soundManager.stop(t);
            }, timeFormat: function (a) {
                a = Math.round(a);
                var c = Math.floor(a / 3600), b = a % 3600;
                a = Math.floor(b / 60);
                b = Math.ceil(b % 60);
                0 != c && (c += ":");
                return c + (0 != c && 10 > a ? "0" + a : a) + ":" + (10 > b ? "0" + b : b)
            }

        };


    return {
        playPause: function (e, t, a) {
            if ("i_download" == e.target.className)
                return !1;
            cancelEvent(e);
            var n = $("#audio" + t);
            if (playlist.state == 'play' && playlist.playing_id == t) {
                n.removeClass("ai_playing");
                playlist.state = 'pause';
                soundManager.pause(t);
                return true;
            }
            if (playlist.last_play_id != null && playlist.last_play_id != t) {
                playlist.progress = true;
                audio.stop(playlist.playing_id);
            }
            if (!n.hasClass("ai_playing"))
                n.addClass("ai_playing ai_current");
            else
                n.removeClass("ai_playing");
            if (playlist.state == 'pause' && playlist.playing_id == t) {
                playlist.playing_id = t;
                playlist.last_play_id = t;
                playlist.state = 'play';
                soundManager.resume(t);
            }
            else {
                playlist.playing_id = t;
                playlist.last_play_id = t;
                playlist.state = 'play';
                soundManager.createSound({
                    id: t,
                    url: n.attr('data-file'),
                    whileplaying: function () {
                        var thisTime = ((parseInt(this.position)) / 1000).toFixed();
                        $("#audio" + t + " .ai_dur").text(audio.timeFormat(thisTime));
                    },
                    onfinish: function () {
                        audio.stop(t);
                    },
                    volume: volume
                });

                soundManager.play(t);
            }
            return cancelEvent(e), !1
        }
    }
}();





soundManager.setup({
  url: '/js/soundmanagerv297a-20170601/swf/',
  flashVersion: 9,
  preferFlash: false, // prefer 100% HTML5 mode, where both supported
  forceUseGlobalHTML5Audio: true
  onready: function() {
    console.log('SM2 ready!');
  },
  ontimeout: function() {
     console.log('SM2 init failed!');
  },
  defaultOptions: {
    // set global default volume for all sound objects
    volume: 33
  }
});


*/



