/* =================================
EXPAND COLLAPSE            
Collect: http://designlab.co/demo/template/kane/
=================================== */
 $(document).ready(function(){
 $('#toggle-switcher').click(function(){
		if($(this).hasClass('open')){
			$(this).removeClass('open');
			$('#switch-style').animate({'left':'-220px'});
		}else{
			$(this).addClass('open');
			$('#switch-style').animate({'left':'0'});
		}
	});
});