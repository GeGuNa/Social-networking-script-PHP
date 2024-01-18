var myWorker = new Worker('worker.js');

myWorker.addEventListener('message', function(e) {
  var resultFromWorker = e.data;
  console.log('Result received from worker:', resultFromWorker);
});

var dataToSend = 5;
myWorker.postMessage(dataToSend);



///

var w;

function startWorker() {
  if(typeof(Worker) !== "undefined") {
    if(typeof(w) == "undefined") {
      w = new Worker("worker.js");
    }
    w.onmessage = function(event) {
      document.getElementById("result").innerHTML = event.data;
    };
  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Workers...";
  }
}

function stopWorker() { 
  w.terminate();
  w = undefined;
}

//////




if (window.Worker) {
	
	
}
