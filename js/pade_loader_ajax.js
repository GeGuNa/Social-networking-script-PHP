function change_ajax(link){
$('#load').html('<img src="/load.gif" style="position: fixed; top: 25%; left: 50%;transform: translateX(-50%); text-align: center; background: rgba(50,50,50,0.5); padding: 5px;">');
 
$.post (link, {'load_ajax' : null},
function (data){
var data = $(data);
var elem = data.find('#content').html();
$("#content").html(elem);
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;	
$('#load').html('');
}
);
}

if (history.pushState){
$(window).on('popstate', function(event){    
var loc = event.location || ( event.originalEvent && event.originalEvent.location ) || document.location;
change_ajax(loc.href);
});
 
$(document).on('click', 'a[load != "none"]', function(e){
var link = $(this).attr('href');
if (link != null){
change_ajax(link);
var titl = $('div[title]').text();
document.title = titl;
history.pushState(link, titl, link);
e.preventDefault();
}
});

 
}
