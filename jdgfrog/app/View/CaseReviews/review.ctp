<?php
    echo $this->Html->css(array('modal_window_style'));
?>
<!--search start here-->
<div class="contact">
    <div class="container">
        <div class="contact-main">
          <h3 class="page_title">Review Case</h3>
              <div class="col-md-4 contact-right">
                <!-- TOP CREATE A NEW USER BAR -->
                  <div class="top_bar col-md-4">
                    <div class="top_bar_left">
                      <h4>PENDING CASE(S)</h4>
                    </div>
                      <!-- PENDING BUTTON-->
                      <div title="Click here to edit the selected case." style="margin-top: 19px;">
                        <label for="" class="user_button">
                          <?php
                          echo $this->Html->link(
                              $this->Html->image("review.png", array("alt" => "Edit Case", 'style' => 'float:left; padding: 10px 6px 8px 0px;')),

                              "/AdminPanel/edit", array('escape' => false, 'id' => 'edit_case')); ?> 
                        </label>
                      </div>  
                  </div>
                    <table class="pending_case all_results">
                        <tbody>
                          <tr>
                              <th>Case Name</th>
                              <th>Editor's Name</th>
                          </tr>

                          <?php
                            if (isset($p_cases)) {
                              $index = 0;
                              foreach ($p_cases as $pc) {
                                echo '<tr id='.$index.' class="toggle_case">' .
                                '<td>' . $pc[0] . '</td>' .
                                '<td>' . $pc[1] . '</td>' .
                                '</tr>';
                                $index++;
                              }
                            }
                          ?>
                        </tbody>
                    </table>
                <!-- Create Interface -->
                <div class="user_creation" style="padding-bottom:50px; margin-top:50px;">
                  <div class="login_details" style="background-color:#DCDCDC">
                  </div>
                </div>
            </div> 
                <div class="col-md-8 contact-right">
                  <!-- TOP PUBLISH SELECTED USER BAR -->
                    <div class="top_bar col-md-8">
                      <div class="top_bar_dash">
                        <h4>CASE REVIEW DASHBOARD</h4>
                      </div>
                        <!-- PUBLISH BUTTON-->
                        <div title="Click here to publish this case." style="padding: 0px 0px 0px 0px;" id="publish_button">
                          <label for="" class="user_button">
                            <?php echo $this->Html->image('send.png', array('alt' => 'Publish', 'style' => 'padding: 10px 8px 8px 0px;' )); ?>
                          </label>
                        </div>
                    </div>
                    <div id="selected_case" class="selected_case">
                      
                    </div>
                </div>
          </div>
      </div> 
  </div>
</div>
            <div class="search_disclaim" style="margin-top:200px">
              <p><strong>Note: </strong>Not every combination of analyzable objects will return meaningful results.</p>
            </div>
</div>

<!-- TABLE SELECTION SCRIPT -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript">

  <?php
    if (isset($p_cases)) {
      $jsarr = json_encode($p_cases);
      echo 'var p_cases = ' . $jsarr . ';';
    } else {
      echo 'var p_cases = [];';
    }
  ?>
    // TOGGLE SELECTED CASE
    $('.selected_case').hide();
       $('.toggle_case').click(function(){

          var index = $(this).attr('id');
            $.ajax({                   
                url: '/JudgeFrog/jdgfrog/CaseReviews/generateTable/' + index,
                cache: false,
                type: 'GET',
                dataType: 'HTML',
                success: function (html) {
                    $('.selected_case').html(html);
                    $('.this_def_info').hide();
                    $(this).toggleClass('clicked', 'slow');
                    $('.toggle_def').click(function(){
                      $(this).nextUntil('.toggle_def').toggle('slow');
                      $(this).toggleClass('clicked', 'slow');
                    });
                    $('.selected_case').toggle(50);
                    $('#edit_case').attr('href', '/CaseEdits/edit/' + p_cases[index][0]);
                }
            });


            
      });
       // TOGGLE SELECTED DEFENDENT

       $('#publish_button').click(function(){
          alert('This case has been published!');
      });
</script>
