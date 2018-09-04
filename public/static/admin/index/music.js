$(function(){
	$(".edit_button").click(function(){
		var data=$(this).parent().parent().children();
		var data_other=$(this).parent().children();
		var aa='<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		aa+='<div class="modal-dialog" style="width:1200px">';
		aa+='<form action="/public/admin/index/music.html" method="post">';
		aa+='<div class="modal-content" style="width:1200px">';
		aa+='<div class="modal-header" style="width:1200px">';
		aa+='<button type="button" class="close delete-div" data-dismiss="modal" aria-hidden="true">&times;</button>';
		
		aa+='<h4 class="modal-title" id="myModalLabel">修改歌曲信息</h4></div>';
		aa+='<div class="modal-body" style="width:1200px"><input type="hidden" value="update" name="type">';
		aa+='<table><tr style="text-align: center"><td>主键i d <input type="text" name="id" value="'+data[0].innerHTML+'"></td>';
		aa+='<td>日 文名<input type="text" name="japanese_name" value="'+data[1].innerHTML+'"></td>';
		aa+='<td>中文名<input type="text" name="chinese_name" value="'+data[2].innerHTML+'"></td><td>专辑代号<input type="text" name="album" value="'+data[3].innerHTML+'"></td>';
		aa+='<td>地址链接<input type="text" name="address" value="'+data[4].innerHTML+'"></td><td>泉水值<input type="text" name="quanshui" value="'+data[5].innerHTML+'"/></td></tr>';
		
		aa+='<tr style="text-align: center"><td>发行时间<input type="text" name="issue_time" value="'+data_other[0].value+'"/></td>';
		aa+='<td>是否为单曲<input type="text" name="is_sole" value="'+data_other[1].value+'"/></td>';
		aa+='<td>个人评论<input type="text" name="comment" value="'+data_other[2].value+'"/2ft></td></tr></table></div>';
		
		aa+='<div class="modal-footer" style="width:1200px"><button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
		aa+='<input type="submit" value="提交更改" class="btn btn-primary"></div></div></form></div></div>';
		$('#wrapper').after(aa);
	});
	$(".delete_button").click(function(){
		var data=$(this).parent().parent().children();
		var aa='<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		aa+='<div class="modal-dialog" style="width:1200px">';
		aa+='<form action="/public/admin/index/music.html" method="post">';
		aa+='<div class="modal-content" style="width:1200px">';
		aa+='<div class="modal-header" style="width:1200px">';
		aa+='<button type="button" class="close delete-div" data-dismiss="modal" aria-hidden="true">&times;</button>';
		aa+='<h4 class="modal-title" id="myModalLabel">删除歌曲信息</h4></div>';
		aa+='<div class="modal-body" style="width:1200px"><input type="hidden" value="delete" name="type">';
		aa+='<table><tr style="text-align: center"><td>id<input type="text" name="id" value="'+data[0].innerHTML+'"></td>';
		aa+='<td>日文名<input type="text" name="japanese_name" value="'+data[1].innerHTML+'"></td>';
		aa+='<td>中文名<input type="text" name="chinese_name" value="'+data[2].innerHTML+'"></td><td>专辑代号<input type="text" name="album" value="'+data[3].innerHTML+'"></td>';
		aa+='<td>地址链接<input type="text" name="address" value="'+data[4].innerHTML+'"></td><td>泉水值<input type="text" name="quanshui" value="'+data[5].innerHTML+'"/></td></tr></table></div>';
		aa+='<div class="modal-footer" style="width:1200px"><button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>';
		aa+='<input type="submit" value="确定" class="btn btn-primary"></div></div></form></div></div>';
		$('#wrapper').after(aa);
	});
})