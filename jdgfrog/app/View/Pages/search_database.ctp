<!-- <?php // $this->set('selectedlink', 'search'); ?> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <!-- <link rel="stylesheet" type="text/css" href="/jdgfrog/css/search_page_css.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="/jdgfrog/css/nav_bar_style.css"> -->

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

  <!-- Search Imports -->
  <!-- <link rel="stylesheet" type="text/css" href="/jdgfrog/css/default.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="/jdgfrog/css/component.css" /> -->
  <!-- <script src="/jdgfrog/js/modernizr.custom.js"></script> -->

<!-- added by Landon -->
<script type="text/javascript">
  $(document).ready(function(){

  // hide all div containers
  $('#collapsible-panels div').hide();
  // append click event to the a element
  $('#collapsible-panels a').click(function(e) {
    // slide down the corresponding div if hidden, or slide up if shown
    $(this).parent().next('#collapsible-panels div').slideToggle('slow');
    // set the current item as active
    $(this).parent().toggleClass('active');
    e.preventDefault();
  });
});
</script>
<!-- added by Landon (above) -->
<body>
    <div id="body" class="width">
        <h2>Database Search</h2>
        
        <div class="body_content">


<!-- TOP STATUS AND SEARCH BAR -->
<div class="top_bar">
  <div class="top_bar_left">
    <h3>Specifc Search</h3>
  </div>


<!-- SEARCH -->
  <div class="main">
        <div class="column">
          <div id="sb-search" class="sb-search">
            <form>
              <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
              <input class="sb-search-submit" type="submit" value="">
              <span class="sb-icon-search"></span>
            </form>
          </div>
        </div>
  </div><!-- SEARCH CONTAINER -->

</div>


        <!-- Search Interface -->
<div id="collapsible-panels">

     <h2><a href="#">Case</a></h2>
        <div>
            <form action="">
              Name: <input type="text" name="Name"> <br><br>
              Number: <input type="text" name="Number"> <br><br>
              Number of Defendants: <input type="text" name="Number_of_Defendants"> <br><br>
              State: <select>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                      </select>   <br><br>
              Federal District: <input type="text" name="Federal_District">
            </form>
        </div>
 
     <h2><a href="#">Defendant</a></h2>
        <div>
            <form action="">
              First Name: <input type="text" name="fNameDefendant"> <br><br>
              Last Name: <input type="text" name="lNameDefendant"> <br><br>
              Gender: <select>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br><br>
              Date Of Birth:
                    <select name="month" onChange="changeDate(this.options[selectedIndex].value);">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    <select name="day" id="day">
                    <option value="na">Day</option>
                    </select>
                    <select name="year" id="year">
                    <option value="na">Year</option>
                    </select>
                         <script language="JavaScript" type="text/javascript">
                              function changeDate(i){
                              var e = document.getElementById('day');
                              while(e.length>0)
                              e.remove(e.length-1);
                              var j=-1;
                              if(i=="na")
                              k=0;
                              else if(i==2)
                              k=28;
                              else if(i==4||i==6||i==9||i==11)
                              k=30;
                              else
                              k=31;
                              while(j++<k){
                              var s=document.createElement('option');
                              var e=document.getElementById('day');
                              if(j==0){
                              s.text="Day";
                              s.value="na";
                              try{
                              e.add(s,null);}
                              catch(ex){
                              e.add(s);}}
                              else{
                              s.text=j;
                              s.value=j;
                              try{
                              e.add(s,null);}
                              catch(ex){
                              e.add(s);}}}}
                              y = 1993;
                              while (y-->1940){
                              var s = document.createElement('option');
                              var e = document.getElementById('year');
                              s.text=y;
                              s.value=y;
                              try{
                              e.add(s,null);}
                              catch(ex){
                              e.add(s);}}
                              </script>  <br><br>       <!-- Date script -->

              Race: <select>
                        <option value="def_Native_American">Native American</option>
                        <option value="def_white">White</option>
                        <option value="def_African_American">African American</option>
                        <option value="def_Mexican">Mexican</option>
                      </select>
            </form>

        </div>

     <h2><a href="#">Judge</a></h2>
        <div>
            <form action="">
              Name: <input type="text" name="fNameDefendant"> <br><br>
              Race: <select>
                        <option value="judge_Native_American">Native American</option>
                        <option value="judge_white">White</option>
                        <option value="judge_African_American">African American</option>
                        <option value="judge_Mexican">Mexican</option>
                      </select> <br><br>
              Gender: <select>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br><br>
              Tenure: <input type="number" name="fNameJudge"> <br><br>
              Appointed By: <input type="text" name="appointedJudge"> <br><br>
            </form>
        </div>

      <h2><a href="#">Organized Crime Group</a></h2>
        <div>
            <form action="">
              Group Name: <input type="text" name="groupName"> <br><br>
              Size: <input type="text" name="groupSize"> <br><br>
              Scope: <input type="text" name="groupName"> <br><br>
               Race: <select>
                        <option value="judge_Native_American">Native American</option>
                        <option value="judge_white">White</option>
                        <option value="judge_African_American">African American</option>
                        <option value="judge_Mexican">Mexican</option>
                      </select> <br>
            </form>
        </div>

      <h2><a href="#">Victims</a></h2>
        <div>
            <form action="">
              Total: <input type="number" name="totalVic"> <br><br>
              Minor: <input type="number" name="minorVic"> <br><br>
              Foreigner: <input type="number" name="ForeignerVic"> <br><br>
              Female: <input type="number" name="femaleVic"> <br><br>
            </form>
        </div>

      <h2><a href="#">Arrest &amp Charge Details </a></h2>
        <div>
            <form action="">
              Charge Date:
                    <select name="month" onChange="changeDate(this.options[selectedIndex].value);">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    <select name="day" id="day">
                    <option value="na">Day</option>
                    </select>
                    <select name="year" id="year">
                    <option value="na">Year</option>
                    </select> <br><br>
              Date of Arrest:
                    <select name="month" onChange="changeDate(this.options[selectedIndex].value);">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    <select name="day" id="day">
                    <option value="na">Day</option>
                    </select>
                    <select name="year" id="year">
                    <option value="na">Year</option>
                    </select> <br><br>

              Defendant Detained?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br><br>

              Defendant's Role: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br><br>

              Labor Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br><br>

              Adult Sex Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br><br>

              Minor Sex Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br><br>

              Counts of Felonies: <input type="text" name="felonyCounts"> <br><br>
              Sentenced Felonies: <input type="text" name="felonySentenced"> <br><br>
              Bail Type: <input type="text" name="felonySentenced"> <br><br>
              Bail Amount: <input type="text" name="felonySentenced"> <br><br>
              Bail Amount: <span class="currencyinput">$<input type="text" name="currency"></span><br>

                             <br><br>
            </form>
        </div>

      <h2><a href="#">Charge </a></h2>
        <div>
            <form action="">
              Counts: <input type="number" name="countsCharge"> <br><br>
              CountsNolleProssed: <input type="number" name="countsNolleCharge"> <br><br>
              Statute: <input type="text" name="statuteCharge"> <br><br>
              Plea Dismissed: <input type="number" name="dismissedPleaCharge"> <br><br>
              Plea Guilty: <input type="number" name="pleaGuiltyCharge"> <br><br>
              Trial Guilty: <input type="number" name="trialGuiltyCharge"> <br><br>
              Trial Not Guilty: <input type="number" name="trialNotGuiltyCharge"> <br><br>
              Fines: <input type="number" name="finesCharge"> <br><br>
              Sentence: <input type="number" name="sentenceCharge"> <br><br>
              Probation: <input type="number" name="probationCharge"> <br><br>
            </form>
        </div>

      <h2><a href="#">Sentence </a></h2>
        <div>
            <form action="">
             Date Terminated: <select name="month" onChange="changeDate(this.options[selectedIndex].value);">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    <select name="day" id="day">
                    <option value="na">Day</option>
                    </select>
                    <select name="year" id="year">
                    <option value="na">Year</option>
                    </select> <br><br>

                Date : <select name="month" onChange="changeDate(this.options[selectedIndex].value);">
                    <option value="na">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                    </select>
                    <select name="day" id="day">
                    <option value="na">Day</option>
                    </select>
                    <select name="year" id="year">
                    <option value="na">Year</option>
                    </select> <br><br>
                Total: <input type="number" name="totalSentence"> <br><br>
                Restitution: <input type="number" name="restSentence"> <br><br>
                Total: <input type="number" name="totalSentence"> <br><br>
                Asset Forfeit: 
                    <select>
                        <option value="yesSentence">--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br><br>
                Appeal: 
                    <select>
                        <option value="yesSentence">--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br><br>
                Supervised Release: <input type="number" name="supervisedSentence"> <br><br>
                Probation: <input type="number" name="probationSentence"> <br><br>
            </form>
        </div>

         
 </div>

    <!-- <div class="nav_title"> 
    <p>Search criteria</p>
   <form>
        <input type="text" placeholder="Search..." required>
        <input type="button" value="Search">
</form>
    </div>

    <div class="nav_bar">
    <h3>Case</h3>
    <div>
      <ul>
        <li>

          <form action="">
            <input type="checkbox" name="vehicle" value="name"> Age<br>
            <input type="checkbox" name="vehicle" value="age"> Name
          </form>
        </li>
        <li>

        </li>
        <li>
          
        </li>

      </ul>
    </div>
    

    <h3>Defendant</h3>
    <div>
      <ul>
        <li>

          <form action="">
            <input type="checkbox" name="vehicle" value="name"> Age<br>
            <input type="checkbox" name="vehicle" value="age"> Name
          </form>
        </li>
        <li>

        </li>
        <li>
          
        </li>

      </ul>
    </div>


    
    <h3>Case</h3>
    <div>
      <ul>
        <li>

          <form action="">
            <input type="checkbox" name="vehicle" value="name"> Age<br>
            <input type="checkbox" name="vehicle" value="age"> Name
          </form>
        </li>
        <li>

        </li>
        <li>
          
        </li>

      </ul>
    </div>


    
    <h3>Case</h3>
    <div>
      <ul>
        <li>

          <form action="">
            <input type="checkbox" name="vehicle" value="name"> Age<br>
            <input type="checkbox" name="vehicle" value="age"> Name
          </form>
        </li>
        <li>

        </li>
        <li>
          
        </li>

      </ul>
    </div>



</div>
-->

            <br><br>
            <hr style="1px dashed #9a9a9a;">

            <br>

            <div class="search_disclaim">
            <p><strong>Disclaimer: </strong>Not every combination of searched values can be graphed.</p>
            </div>
 
        </div>
    </div>

    <!-- <script src="/jdgfrog/js/classie.js"></script> -->
    <!-- <script src="/jdgfrog/js/uisearch.js"></script> -->
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>


</body>