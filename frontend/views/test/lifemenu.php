<script src="/js/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js"></script>
<style>
dl{float:left;width:200px;height:200px;overflow:hidden;margin:0 !important;}
dl+dl{margin:0 0 0 5px;}
#drop_area{width:220px;height:220px;background:#ccc;padding:20px;}
</style>
<div id="drop_area"></div>
<dd>
	<dl>favorite</dl>
	<dl><img src="/images/drink/1.jpg" alt="" /></dl>
	<dl><img src="/images/drink/2.jpg" alt="" /></dl>
	<dl><img src="/images/drink/3.jpg" alt="" /></dl>
	<dl><img src="/images/drink/4.png" alt="" /></dl>
	<dl><img src="/images/drink/5.jpg" alt="" /></dl>
</dd>
<script>
$().ready(function(){
	$('dl:gt(0)').each(function(){
		$(this).find('img').css({width: $(this).width()+'px', height: $(this).height()+'px'});
	});
	
	var draggableConfig = {
		//refreshPositions: true,
		//opacity: 0.35,
		snap: 'dl:eq(0)',
		snapMode: 'inner',
		cursor: 'move',
		revert: 'invalid',
		helper: 'clone',
		start: function(){
			console.log(2);
		},
		drag: function(){
		},
		stop: function(){
		}	
	};
	$('dl').draggable(draggableConfig);
	
	$('#drop_area').droppable({
		accept: function(){return true},
		drop: function(e, ui){
			exchangeImage(ui.draggable);
		},
	});
	$(document).on('dblclick', 'dd dl', function(){
		var _this = $(this);
		var dropArea = $('#drop_area');
		var t = _this.clone();
		if(dropArea.is(':empty')){
			dropArea.empty().append(t);
			_this.remove();
			t.fadeIn();
		}else{
			var $favorite = dropArea.find('dl');
			_this.replaceWith($favorite);
			$favorite.draggable(draggableConfig);
			dropArea.empty().append(t);
			$favorite.fadeIn();
			t.fadeIn();
		}
	});
	
	function exchangeImage($dropitem){
		var dropArea = $('#drop_area');
		var t = $dropitem.clone();
		$dropitem.fadeOut(function(){
			if(dropArea.is(':empty')){
				dropArea.empty().append(t);
				$dropitem.remove();
				t.fadeIn();
			}else{
				var $favorite = dropArea.find('dl');
				$dropitem.replaceWith($favorite);
				$favorite.draggable(draggableConfig);
				dropArea.empty().append(t);
				$favorite.fadeIn();
				t.fadeIn();
			}
		});
	}
});
</script>