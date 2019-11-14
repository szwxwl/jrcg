<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>意见反馈</title>
		<link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}" sizes="32x32">
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/common.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('web/css/feedback.css') }}" />
		<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="main">
			<div class="top">
				<h1>意见反馈</h1>
				<p>请留下您的宝贵意见，我们将为您提供更好的产品和服务。</p>
			</div>
			<form method="post" action="/feedback_add" enctype="multipart/form-data" id="feedback">
				@csrf
				<div class="middle">
					@if(Session::get('stateMessage') == NULL)
					<div class="message">
						<div class="middle01">
							<p class="title">请详细描述您的问题或建议<span>*</span></p>
							<textarea name="content" class="" id="textarea" ></textarea>
							<p class="tips">请填写此项</p>
						</div>
						<div class="middle01">
							<p class="title">图片上传</p>
							<p style="font-size: 12px;color: rgba(102,102,102,0.7);">支持 JPG/PNG 图片格式</p>
							<div class="fileinput">
								<img src="{{ asset('web/img/formCom.png') }}"/>
								<p>点击选择图片</p>
								<input type="file" name="image" id="file_upload" value="" />
								<input type="hidden" name="feedback_image" id="compress_value" value="" />
							</div>
						</div>
						<div class="middle01">
							<p class="title">联系方式 (选填)<span>*</span></p>
							<p class="title01">可输入邮箱/手机/微信等联系方式</p>
							<input type="text" name="contact" id="telinput" value="" class="telinput" />
							<p class="tips">请填写此项</p>
						</div>
						<p class="bottomtext">谢谢您的反馈，如果有主动联系我们的需要，请发送邮件至youbianzaina@qq.com</p>
						<p style="text-align: center;"><input type="submit" id="submit" value="提交" class="submit" /></p>
					</div>
					@endif

					@if(!empty(Session::get('stateMessage')))
					<div class="success">
						<img src="{{ asset('web/img/success.png') }}"/>
						<p class="tj">{{ Session::get('stateMessage')['state'] }}</p>
						<p class="fk">{{ Session::get('stateMessage')['message'] }}</p>
						@if(Session::get('stateMessage')['state'] == '提交成功！')
							<a href="/" class="submit">返回</a>
						@else
							<a href="feedback" class="submit">返回</a>
						@endif
					</div>
					@endif
				</div>
			</form>
		</div>
	</body>
<script>
	$("#submit").click(function(){
		var ok='',ok01=''
		if ($("#textarea").val()=="") {
			$("#textarea").css({'border-color':"red"}).siblings('.tips').show()
		} else{
			$("#textarea").css({'border-color':"#dddddd"}).siblings('.tips').hide()
			ok=1
		}
		if ($("#telinput").val()=="") {
			$("#telinput").css({'border-color':"red"}).siblings('.tips').show()
		} else{
			$("#telinput").css({'border-color':"#dddddd"}).siblings('.tips').hide()
			ok01=1
		}
		if (ok==1&&ok01==1) {
		    $('#feedback').submit();
		} else {
		    return false;
		}
	})

    $('#file_upload').change(function(){
        uploadBtnChange();
    });

    function uploadBtnChange(){
        var scope = this;
        if(window.File && window.FileReader && window.FileList && window.Blob){
            //获取上传file
            var filefield = document.getElementById('file_upload'),
                file = filefield.files[0];
            //获取用于存放压缩后图片base64编码
            var compressValue = document.getElementById('compress_value');
            processfile(file,compressValue);
        }else{
            alert("此浏览器不完全支持压缩上传图片");
        }
    }

    function processfile(file,compressValue) {
        var reader = new FileReader();
        reader.onload = function (event) {
            var blob = new Blob([event.target.result]);
            window.URL = window.URL || window.webkitURL;
            var blobURL = window.URL.createObjectURL(blob);
            var image = new Image();
            image.src = blobURL;
            image.onload = function() {
                var resized = resizeMe(image);
                compressValue.value = resized;
            }
        };
        reader.readAsArrayBuffer(file);
    }

    function resizeMe(img) {
        //压缩的大小
        var max_width = 1920;
        var max_height = 1080;

        var canvas = document.createElement('canvas');
        var width = img.width;
        var height = img.height;
        if(width > height) {
            if(width > max_width) {
                height = Math.round(height *= max_width / width);
                width = max_width;
            }
        }else{
            if(height > max_height) {
                width = Math.round(width *= max_height / height);
                height = max_height;
            }
        }

        canvas.width = width;
        canvas.height = height;

        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);
        //压缩率
        return canvas.toDataURL("image/jpeg",0.92);
    }
</script>
</html>
