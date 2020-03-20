function toggleID(IDS) {
  var sel = document.getElementById('subnavigation').getElementsByTagName('ul');
  for (var i=0; i<sel.length; i++) { 
    if (sel[i].id != IDS) { sel[i].style.display = 'none'; }
  }
  sel = document.getElementById(IDS);
  sel.style.display = (sel.style.display != 'block') ? 'block' : 'none';
}
$(function(){
	$('.activate').hover(function(){
		$(this).addClass('highlight');
	}, function(){
		$(this).removeClass('highlight');
	});
	$('.activate').click(function(){
		$('.highlight_stay').removeClass('highlight_stay');
		$(this).addClass('highlight_stay');
	});
});