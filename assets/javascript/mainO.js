function getElem(elem) {
	return document.querySelector(elem);
}

function rRRedRction(url){
	return window.location = url
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



var st_reactSts = 0;
var LasTReactedButton = "";


function Reacts(rid, type, this2) {
	
	
st_reactSts = 1	
LasTReactedButton = type
	
//$("div[reaction='"+rid+"']").addClass('none')	
	
//document.querySelectorAll("div[reaction='"+rid+"']")[0].style.display="none"

var s1_d2 = document.querySelectorAll("div[reaction='"+rid+"']")[0]


s1_d2.classList.add('none')


var s1nqwe = this2.getAttribute('val')

//console.log(s1nqwe)






//var s1_d2z = document.querySelectorAll(`'span react_Type=['${type}'] reaction=['${rid}'] post=[rid]')[0];

//<span react_type="wow" val="0" post="11896" none="">😂</span>

// JavaScript code to select the specified <span> tag
const s1_d2z = document.querySelector('span[react_type="'+type+'"][post="'+rid+'"]');

var s1231 = s1_d2z.getAttribute('val')





//if (s1231>0 && st_reactSts == 1 && LasTReactedButton == type) {

/*
if (st_reactSts == 1) {

if (s1231>0 && LasTReactedButton == type) {
	
	s1_d2z.setAttribute('val', parseInt(s1231-1))

} else {
	
	s1_d2z.setAttribute('val', parseInt(s1231-1))
	
}



} */




if (LasTReactedButton.length>1) {
	
	const s1_d2zLast = document.querySelector('span[react_type="'+LasTReactedButton+'"][post="'+rid+'"]');
	
	var s1231z21 = s1_d2zLast.getAttribute('val')


	
	
	s1_d2zLast.setAttribute('val', parseInt(s1231z21-1))
	
}


if (LasTReactedButton != type) {

	s1_d2z.setAttribute('val', parseInt(s1231+1));
	
}


//console.log(s1_d2z.innerText)


/*

<span react_Type="wow" val="<?=$kqrct->wow;?>" post="<?=$post['id'];?>" <?=($kqrct->wow == 0 ? "none" : "");?>>😂</span>
								


*/



//$("div[reaction='"+rid+"']").addClass('none')	
	


/*



<div class="Up_Reaction_Main_d1 pointer Up_Reaction_Main_d1_sacling">
		
		<div class="relative">
			<div class="cs1_zwow" onclick="Reacts(11896, 'wow')" val="0"> 😂</div>
		</div>
		
	</div>

*/

	
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
