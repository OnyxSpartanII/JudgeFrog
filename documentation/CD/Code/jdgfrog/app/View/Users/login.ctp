<?php
    $this->layout = 'default';
    $this->set('title', 'Create - Admin Panel | Human Trafficking Data');
    $this->set('active', 'create');
	echo $this->Html->css(array('login'));
?>
		<div class="container">
			<div class="col-md-4 wrap">
				<?php echo $this->Form->create('User'); ?>
					<h1>Admin Panel Login</h1>
					<div class="inset">
						<?php echo $this->Session->flash('auth'); ?>
						<p>
							<?php echo $this->Form->input('username');?>
						</p>
						<p>
							<?php echo $this->Form->input('password');?>
						</p>
					</div>
					<div class="submit_btn">
						<?php echo $this->Form->end(__('Login')); ?>
					</div>
			</div>
		</div>

<!-- ERROR BANNER AND ANIMATION-->
<style type="text/css">
  #flashMessage, #authMessage{
  padding: 10px;
  font-size: 30px;
  color: #FFF;
  -webkit-animation: fadeIn 1.5s ease-in-out;
  -moz-transition: fadeIn 1.5s ease-in-out;
  animation: fadeIn 1.5s ease-in-out;
  border-bottom: 1px solid #999;
  background-color: #FE2232;
  }
</style>
<script type="text/javascript">
    var $welcom = $("#flashMessage");
    var $notAutho = $("#authMessage");
    if ($welcom.is(':visible') == true) {
     $('form').css({
          "animation": "pulse 0.8s ease-in-out",	
     					"-webkit-animation": "shake 0.8s ease-in-out",
     						"-moz-animation": "shake 0.8s ease-in-out",
     							"-o-animation": "shake 0.8s ease-in-out"
                });
		$('form label').css('color','#FE2232');
	};
    setTimeout(function() {
        $welcom.slideUp(800).delay(200).fadeOut(400);
    }, 5000);

    if ($notAutho.is(':visible') == true) {
    $('form').css('-webkit-animation','shake 0.8s ease-in-out');
    $('form').css('animation','shake 0.8s ease-in-out');
    $('form').css('-moz-animation','shake 0.8s ease-in-out');
	};
    setTimeout(function() {
        $notAutho.slideUp(800).delay(200).fadeOut(400);
    }, 5000);
</script>

