document.addEventListener("visibilitychange", function logData() {
  if (document.visibilityState === "hidden") {
    navigator.sendBeacon("/log", analyticsData);
  }
});




$(window).on('unload', function() {
	// You can send an ArrayBufferView, Blob, DOMString or FormData
	// Since Content-Type of FormData is multipart/form-data, the Content-Type of the HTTP request will also be multipart/form-data
	var fd = new FormData();
	fd.append('ajax_data', 22);

	navigator.sendBeacon('ajax.php', fd);
});




sendBeacon(url)
sendBeacon(url, data)


#url
The URL that will receive the data. Can be relative or absolute.

#data Optional
An ArrayBuffer, a TypedArray, a DataView, a Blob, a string literal or object, a FormData or a URLSearchParams object containing the data to send.
