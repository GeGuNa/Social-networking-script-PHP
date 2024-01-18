

var err = {
name: "qweqwe",
message: "qweqweqwe"	
}


window.alert(`${err.name}: ${err.message}`)




////////////////////////

const xhr = new XMLHttpRequest();
xhr.open("GET", "/path/to/audio.ogg", true);
xhr.responseType = "arraybuffer";
xhr.send();
xhr.onload = () => {
  const decodedBuffer = context.createBuffer(xhr.response, false);
  if (decodedBuffer) {
    // Decoding was successful, do something useful with the audio buffer
  } else {
    alert("Decoding the audio buffer failed");
  }
};

//////////////////
  
  
  
  
      const b = document.querySelector("button");
      let clicked = false;
      const chunks = [];
      const ac = new AudioContext();
      const osc = ac.createOscillator();
      const dest = ac.createMediaStreamDestination();
      const mediaRecorder = new MediaRecorder(dest.stream);
      osc.connect(dest);

      b.addEventListener("click", (e) => {
        if (!clicked) {
          mediaRecorder.start();
          osc.start(0);
          e.target.textContent = "Stop recording";
          clicked = true;
        } else {
          mediaRecorder.stop();
          osc.stop(0);
          e.target.disabled = true;
        }
      });

      mediaRecorder.ondataavailable = (evt) => {
        // Push each chunk (blobs) in an array
        chunks.push(evt.data);
      };

      mediaRecorder.onstop = (evt) => {
        // Make blob out of our blobs, and open it.
        const blob = new Blob(chunks, { type: "audio/ogg; codecs=opus" });
        document.querySelector("audio").src = URL.createObjectURL(blob);
      };
