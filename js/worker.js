var i = 0;

function timedCount() {
  i = i + 1;
  postMessage(i);
  setTimeout("timedCount()",500);
}

timedCount();


////////////////
self.addEventListener('message', function(e) {
  var messageFromMain = e.data;
  // Do some processing...
  var result = messageFromMain * 2;
  // Send the result back to the main thread
  self.postMessage(result);
});

////////////
self.addEventListener('message', async function(e) {
  var url = e.data;

  try {
    const response = await fetch(url);
    if (response.ok) {
      const data = await response.json();
      self.postMessage({ success: true, data });
    } else {
      self.postMessage({ success: false, error: 'Request failed' });
    }
  } catch (error) {
    self.postMessage({ success: false, error: 'An error occurred' });
  }
});
