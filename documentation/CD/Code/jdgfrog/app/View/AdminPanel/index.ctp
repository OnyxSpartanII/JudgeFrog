<!-- FUNCTION TO ANIMATE LOGO -->
  <script type="text/javascript">   
    var radius = 5;

    var interval = window.setInterval(function() {
    $(".logo").css("-webkit-mask", "-webkit-gradient(radial, 30 30, " + radius + ", 5 59, " + (radius + 5) + ", from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))");
    radius++;
    if (radius === 400) {
    window.clearInterval(interval);
    }
    }, 15);
  </script> 
  <?php echo $this->Html->css(array('home_slider_main', 'home_slider_misc', 'hover', 'jquery-ui'));?>
  <?php echo $this->Html->script(array('jquery-1.9.0.min', 'jquery.fractionslider', 'home_slider_config', 'jquery-ui'));?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script>
    $(function() {
      $( "#accordion" ).accordion();
    });
  </script>
  <?php echo $this->Html->css(array('home_slider_main', 'home_slider_misc', 'hover'));?>
  <?php echo $this->Html->script(array('jquery-1.9.0.min', 'jquery.fractionslider', 'home_slider_config', 'jquery-ui'));?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--Slider Starts Here-->
      <div class="jobs-main top-slider">
        <h3>What's On</h3>
          <div class="slider-wrapper">
            <div class="responisve-container">
              <div class="slider">
                  <div class="fs_loader"></div>

                  <!-- Slider Number 1 -->
                  <div class="slide"> 
                    <p    class="claim"     
                        data-in="top" 
                                    data-position="70,0" data-step="1" data-out="fade" style="font-size:3.2em;">HUMAN TRAFFICKING DATA | Admin Panel?</p>
                    <p    class="claim"     
                         data-in="fade" data-out="fade" data-position="150,160" data-step="2" data-out="left" style="font-size:1.2em; color:4D1979">an open source platform for human trafficking cases in the U.S.</p>
                  </div>

                  <!-- Slider Number 2 -->
                  <div class="slide"> 
                    <p    class="claim"     
                         data-in="fade" data-position="0,350" data-step="1" data-out="fade" style="font-size:2em; color:#fe2232">600,000 to 800,000</p>
                    <p    class="claim"     
                         data-in="fade" data-position="130,200" data-step="2" data-out="fade" style="font-size:1em;">is the approximate amount of trafficked people around the world<span><p style="font-size:1.5em; color:red; font-weight:bold;" data-step="3" data-position="150,400" data-in="fade" data-out="fade" data-delay="1500">Every year</p></span></p>
                  </div>

                  <!-- Slider Number 3 -->
                  <div class="slide"> 
                    <!-- <p     class="claim"     
                         data-in="fade" data-position="20,430" data-step="1" data-out="fade" style="font-size:2em; color:#fe2232">9,000</p> -->
                    <p    class="claim"     
                         data-in="fade" data-position="140, 100" data-step="2" data-out="fade" style="font-size:1.2em;">HumanTraffickingData.org is a user-friendly experience designed for researchers in </p>
                    <p    class="claim"     
                         data-in="fade" data-position="160, 130" data-step="2" data-out="fade" data-delay="3000" style="font-size:1.2em;">understanding the complexity of human trafficking cases in the United States.
                    </p>
                  </div>
              </div>
            </div>
          </div>
       </div>
    <!--Slider Ends Here-->

<div class="jobs">
      <div class="jobs-main" style="padding-bottom:100px">
         <div class="job-top">
            <div class="col-md-13 job-left">
              <h3>How to Create a Case?</h3>
            </div>
            <div class="container">
                  <div class="col-md-13 job-left">
                    <div id="accordion">
                      <h3>1- Create A Case <?php echo $this->Html->image('admin1.png', array('style' => 'float:center'))?></h3>
                      <div>
                          <div style="margin: 0 auto">
                            <p>
                              i. Select the button displayed to proceed to add a new case
                              <br><br>
                              ii. Complete the case fields as necessary (Case name and case number are required) 
                            </p>
                          </div>
                        </div>
                      <h3>2- Add A Defendant To A Case <?php echo $this->Html->image('admin2.png', array('style' => 'float:center'))?></h3>
                      <div>
                          <div style="margin: 0 auto">
                            <p>
                              i. Add a new defendant by selecting the button shown
                              <br><br>
                              ii. Complete the defendant fields as necessary (defendant last name and charge date fields are required)
                            </p>
                          </div>
                        </div>
                      <h3>3- Submit Case For Review | <?php echo $this->Html->image('admin3.png', array('style' => 'float:center'))?></h3>
                      <div>
                          <div style="margin: 0 auto">
                            <p>
                              At the button of the page of the case, select the  “Submit Case for Review?” checkbox and click on submit to finalize that case and allow an administrator to review the case. 
                            </p>
                          </div>
                        </div>
                      </div>
                   </div>
              </div>
          </div>
      </div>
</div>

<!-- WELCOME BANNER -->
<style type="text/css">
  #flashMessage{
  padding: 40px;
  font-size: 30px;
  color: #4D1979;
  -webkit-animation: fadeInDown 1.3s ease-in-out;
  -moz-transition: fadeInDown 1.3s ease-in-out;
  animation: fadeInDown 1.3s ease-in-out;
  border-bottom: 1px solid #999;
  background-color: #DCDCDC;
  }
</style>
<script type="text/javascript">
    var $welcom = $("#flashMessage");
    setTimeout(function() {
        $welcom.slideUp(800).delay(900).fadeOut(900);
    }, 4000);
</script>


