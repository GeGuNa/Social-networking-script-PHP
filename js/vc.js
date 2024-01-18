var promisifiedOldGUM = function(constraints) {

 
  var getUserMedia = (navigator.getUserMedia ||
      navigator.webkitGetUserMedia ||
      navigator.mozGetUserMedia);

 
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






var p = navigator.mediaDevices.getUserMedia({ audio: true, video: true });

p.then(function(mediaStream) {
	
  var video = document.querySelector('video');
  
  video.src = window.URL.createObjectURL(mediaStream);
  
  video.onloadedmetadata = function(e) {
   
  };
  
  
});

p.catch(function(err) { console.log(err.name); }); // always check for errors at the end.



/*
 
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
 
 
 
 */
