<?php include 'cek_session.php'; ?>
<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Game-Login</title>

        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="css/blue.css" />
        <!-- tooltip -->
			     <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />

        <!-- Favicon -->

        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
  		<div class="login_box" >
  			<form action="login.php" method="post">
  				<div class="top_b">Silahkan Masuk</div>
  				<div class="cnt_b">
  					<div class="formRow">
  						<div class="input-prepend">
  							<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username" placeholder="Username" required/>
  						</div>
  					</div>
  					<div class="formRow">
  						<div class="input-prepend">
  							<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" required/>
  						</div>
  					</div>
  				</div>
  				<div class="btm_b clearfix">
  					<button class="btn btn-inverse pull-right" type="submit" name="submit">Login</button>
  				</div>
  			</form>
  		</div>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.actual.min.js"></script>
        <script src="lib/validation/jquery.validate.min.js"></script>
		    <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){

				//* boxes animation
				form_wrapper = $('.login_box');
				function boxHeight() {
					form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);
				};
				form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	 : target_height,
							marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});
                        });
					});
					e.preventDefault();
				});
            });
        </script>
    </body>

</html>
