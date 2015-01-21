<?php $this->set('selectedlink', 'search'); ?>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/collapsible.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/nav_bar_style.css">
<!--
  <script>
  $(function() {
    $( ".nav_bar" ).accordion();
  });
  </script> -->

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
        
        <div style="text-align:justify; margin-bottom:250px;">


        <!-- Search Interface -->
<div id="collapsible-panels">

     <h2><a href="#">Case</a></h2>
        <div>
            <form action="">
              Name: <input type="text" name="Name"> <br>
              Number: <input type="text" name="Number"> <br>
              Number of Defendants: <input type="text" name="Number_of_Defendants"> <br>
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
                      </select>   <br>
              Federal District: <input type="text" name="Federal_District">
            </form>
        </div>
 
     <h2><a href="#">Defendant</a></h2>
        <div>
            <form action="">
              First Name: <input type="text" name="fNameDefendant"> <br>
              Last Name: <input type="text" name="lNameDefendant"> <br>
              Gender: <select>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br>
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
                              </script>  <br>       <!-- Date script -->

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
              Name: <input type="text" name="fNameDefendant"> <br>
              Race: <select>
                        <option value="judge_Native_American">Native American</option>
                        <option value="judge_white">White</option>
                        <option value="judge_African_American">African American</option>
                        <option value="judge_Mexican">Mexican</option>
                      </select> <br>
              Gender: <select>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br>
              Tenure: <input type="number" name="fNameJudge"> <br>
              Appointed By: <input type="text" name="appointedJudge"> <br>
            </form>
        </div>

      <h2><a href="#">Organized Crime Group</a></h2>
        <div>
            <form action="">
              Group Name: <input type="text" name="groupName"> <br>
              Size: <input type="text" name="groupSize"> <br>
              Scope: <input type="text" name="groupName"> <br>
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
              Total: <input type="number" name="totalVic"> <br>
              Minor: <input type="number" name="minorVic"> <br>
              Foreigner: <input type="number" name="ForeignerVic"> <br>
              Female: <input type="number" name="femaleVic"> <br>
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
                    </select> <br>
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
                    </select> <br>

              Defendant Detained?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br>

              Defendant's Role: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br>

              Labor Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br>

              Adult Sex Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br>

              Minor Sex Trafficking?: 
                    <select>
                        <option value="yesDetained">--</option>
                        <option value="yesDetained">Yes</option>
                        <option value="noDetained">No</option>
                      </select> <br>

              Counts of Felonies: <input type="text" name="felonyCounts"> <br>
              Sentenced Felonies: <input type="text" name="felonySentenced"> <br>
              Bail Type: <input type="text" name="felonySentenced"> <br>
              Bail Amount: <input type="text" name="felonySentenced"> <br>
              Bail Amount: <span class="currencyinput">$<input type="text" name="currency"></span>

                             <br>
            </form>
        </div>

      <h2><a href="#">Charge </a></h2>
        <div>
            <form action="">
              Counts: <input type="number" name="countsCharge"> <br>
              CountsNolleProssed: <input type="number" name="countsNolleCharge"> <br>
              Statute: <input type="text" name="statuteCharge"> <br>
              Plea Dismissed: <input type="number" name="dismissedPleaCharge"> <br>
              Plea Guilty: <input type="number" name="pleaGuiltyCharge"> <br>
              Trial Guilty: <input type="number" name="trialGuiltyCharge"> <br>
              Trial Not Guilty: <input type="number" name="trialNotGuiltyCharge"> <br>
              Fines: <input type="number" name="finesCharge"> <br>
              Sentence: <input type="number" name="sentenceCharge"> <br>
              Probation: <input type="number" name="probationCharge"> <br>
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
                    </select> <br>

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
                    </select> <br>
                Total: <input type="number" name="totalSentence"> <br>
                Restitution: <input type="number" name="restSentence"> <br>
                Total: <input type="number" name="totalSentence"> <br>
                Asset Forfeit: 
                    <select>
                        <option value="yesSentence">--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br>
                Appeal: 
                    <select>
                        <option value="yesSentence">--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br>
                Supervised Release: <input type="number" name="supervisedSentence"> <br>
                Probation: <input type="number" name="probationSentence"> <br>
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

 
        </div>
    </div>
</body>