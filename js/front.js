

var audioContext;

function getAudioContext() {
  if (!audioContext) {
    audioContext = (AudioContext && new AudioContext()) ||
           (webkitAudioContext && new webkitAudioContext());
  }
  return audioContext;
}


function hasGetUserMedia() {
  return !!(navigator.mediaDevices.getUserMedia || 
			navigator.getUserMedia || navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia || navigator.msGetUserMedia);
}



function getAudioContext() {
  if (!audioContext) {
    audioContext = (AudioContext && new AudioContext()) ||
           (webkitAudioContext && new webkitAudioContext());
  }
  return audioContext;
}


function getUserMedia(...args) {
  if (!hasGetUserMedia()) {
    return;
  }

  return navigator.mediaDevices.getUserMedia && navigator.mediaDevices.getUserMedia(...args) ||
		 navigator.getUserMedia && navigator.getUserMedia(...args) ||
         navigator.webkitGetUserMedia && navigator.webkitGetUserMedia(...args) ||
         navigator.mozGetUserMedia && navigator.mozGetUserMedia(...args) ||
         navigator.msGetUserMedia && navigator.msGetUserMedia(...args)
}



/////////


function  getMediaCall(callbacks) {
    navigator.getUserMedia =
      navigator.getUserMedia ||
      navigator.mozGetUserMedia || 
      navigator.mediaDevices.getUserMedia ||
      navigator.webkitGetUserMedia;
    const constraints = { audio: true, video: false };
    navigator.getUserMedia(constraints, callbacks.success, callbacks.error);
  }

//navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
		

function  recStream(stream, elementId) {
    const video = document.getElementById(elementId);
    video.srcObject = stream;
    window.peerStream = stream;
  }


function strrcrddng(){
	
   getMediaCall({
        success: (stream) => {
          this.localstream = stream;
          this.recStream(stream, "lVideo");
          const formData = new FormData()
          formData.append('id', this.props.eventId);
          formData.append('streaming', true);
          //if (!this.props.featured) {
            //this.props.updateEvent(formData)
          //}
        },
        error: (err) => {
          // console.log(err)
          alert("Cannot access your camera");
        },
      });
      
}





const getUserMedia = (constraints) => {
  try {
    return navigator.mediaDevices.getUserMedia(constraints);
  } catch (error) {
    return (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia)(constraints);
  }
};



var promisifiedOldGUM = function(constraints) {

 
  var getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia);

 
  if(!getUserMedia) {
    return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
  }

  
  return new Promise(function(resolve, reject) {
    getUserMedia.call(navigator, constraints, resolve, reject);
  });
		
}


if(navigator.mediaDevices === undefined) {
  navigator.mediaDevices = {};
}


if(navigator.mediaDevices.getUserMedia === undefined) {
  navigator.mediaDevices.getUserMedia = promisifiedOldGUM;
}




function getElem(elem) {
	return document.querySelector(elem);
}

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


/*

mediaRecorder.addEventListener('dataavailable', function(event) {
  // Do something with the recorded data.
});

*/

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
		
		
		var blobWaves = new Blob(chunks, { type : 'audio/mp3' });
		
		
		
	var dataOfFor33ms = new FormData();
	dataOfFor33ms.append('Recording',  blobWaves, "aba.mp3");
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
    window.alert(`${err.name}: ${err.message}`)
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
	
	getElem("#starT_Audiorcr11").addEventListener('click', () => {
		
	    iFaudioisAvailable = 0
	  
		intervalId = setInterval(updateCounterAudioRecordingTime, 1000);	  
		
		startRecordings()
		
		StopScrolling()
		  
		ShwmmDD2lfRm()
		  
		console.log('Recording started');
		
	      

  });

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

const rmAudm211 = document.querySelector("input[name='voiceaddr']")

if (rmAudm211){   
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
	  
    const response = await fetch("/ajax/gossip.php", {
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













