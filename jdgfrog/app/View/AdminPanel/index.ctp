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
  
    <!--Slider Starts Here-->
      <div class="jobs-main top-slider">
        <h3>What's New</h3>
          <div class="slider-wrapper">
            <div class="responisve-container">
              <div class="slider">
                  <div class="fs_loader"></div>

                  <!-- Slider Number 1 -->
                  <div class="slide"> 
                    <p    class="claim"     
                         data-in="top" data-position="20,450" data-step="1" data-out="fade" style="font-size:2em;">on</p>
                    <p    class="claim"     
                        data-in="fade" 
                                    data-position="70,0" data-step="2" data-out="fade" style="font-size:3.2em;">HUMAN TRAFFICKING DATA | Admin Panel?</p>
                    <p    class="claim"     
                         data-in="fade" data-out="fade" data-position="150,160" data-step="3" data-out="left" style="font-size:1.2em; color:4D1979">an open source platform for human trafficking cases in the U.S.</p>
                  </div>

                  <!-- Slider Number 2 -->
                  <div class="slide"> 
                    <p    class="claim"     
                         data-in="fade" data-position="20,350" data-step="1" data-out="fade" style="font-size:2em; color:#fe2232">600,000 to 800,000</p>
                    <p    class="claim"     
                         data-in="fade" data-position="130,170" data-step="2" data-out="fade" style="font-size:1em;">is the approximate amount of trafficked people around the world<span><p style="font-size:1.5em; color:red; font-weight:bold;" data-step="3" data-position="120,700" data-in="fade" data-out="fade" data-delay="1500">Every year</p></span></p>
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
                          <h3>Section 1</h3>
                          <div>
                            <p>
                            Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                            ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                            amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                            odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                            </p>
                          </div>
                          <h3>Section 2</h3>
                          <div>
                            <p>
                            Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                            purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                            velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                            suscipit faucibus urna.
                            </p>
                          </div>
                          <h3>Section 3</h3>
                          <div>
                            <p>
                            Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                            Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                            ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                            lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                            </p>
                            <ul>
                              <li>List item one</li>
                              <li>List item two</li>
                              <li>List item three</li>
                            </ul>
                          </div>
                          <h3>Watch The Tutorial Video</h3>
                          <div>
                            <p>
                            Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                            et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                            faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                            mauris vel est.
                            </p>
                            <p>
                            Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                            inceptos himenaeos.
                            </p>
                          </div>
                        </div>
                   </div>
              </div>
          </div>
      </div>
</div>

