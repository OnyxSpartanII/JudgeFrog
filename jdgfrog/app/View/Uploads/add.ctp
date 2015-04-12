<?php
    $this->layout = 'admin_panel_layout';
    $this->set('title', 'Batch Upload - Admin Panel | Human Trafficking Data');
    // $this->set('active', 'create_case');
?>
<?php echo $this->Html->script(array('bootstrap.file-input'));?>
<!-- File: /app/View/Uploads/add.ctp -->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Batch Upload</h3>
            <div class="col-md-12 contact-right">
				<div class="col-md-12 search_disclaim case_creation_form">
						<div style="max-width:60%;margin: 0 auto">
              <div style="min-height:100px;">
                <?php
                echo $this->Form->create('Uploads', array('type' => 'file'));
                echo $this->Form->input('file', array('label'=>'', 'type' => 'file', 'data-filename-placement'=>'inside', 'title'=>'Search for a csv file to upload', 'accept'=>'.csv'));
                ?>
              </div>
              <div style="margin-top:0px; padding-top:10px; border-top:1px solid #DCDCDC">
							 <?php echo $this->Form->end('Submit'); ?>
              </div>
            </div>
						<br>
					<p><strong>*Note: </strong>You may only upload files of the CSV format</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- WELCOME BANNER -->
<style type="text/css">
  .receipt, .success, #echmsg{
  padding: 40px;
  font-size: 30px;
  color: #FFF;
  -webkit-animation: fadeInDown 1.3s ease-in-out;
  -moz-transition: fadeInDown 1.3s ease-in-out;
  animation: fadeInDown 1.3s ease-in-out;
  border-bottom: 1px solid #999;
  background-color: #5cb85c;
  }
</style>
<script type="text/javascript">
    var $mess = $(".receipt");
    var $subMess =$("#echmsg");
    setTimeout(function() {
        // $mess.slideUp(20000).delay(5000).fadeOut(15000);
        // $subMess.slideUp(20000).delay(5000).fadeOut(15000);
    }, 4000);
</script>
<!-- File Upload Style Script -->
<script type="text/javascript">
  $('input[type=file]').bootstrapFileInput();
$('.file-inputs').bootstrapFileInput();
</script>


