  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="/JudgeFrog/jdgfrog/js/moment.js"></script>
  <script type="text/javascript" src="/JudgeFrog/jdgfrog/js/ion.rangeSlider.js"></script>
  <script type="text/javascript" src="/JudgeFrog/jdgfrog/js/ion.rangeSlider.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/JudgeFrog/jdgfrog/css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="/JudgeFrog/jdgfrog/css/ion.rangeSlider.skinFlat" />
  <link rel="stylesheet" type="text/css" href="/JudgeFrog/jdgfrog/css/ion.rangeSlider.css" />
  


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
              <input type="text" name="Name" placeholder="Name (e.g. USA v. Jones)"> <br><br>
              <input type="text" name="Number" placeholder="Number (e.g. 00-cu-)"> <br><br>
              Number of Defendants<br><br>
              <input type="text" id="numbDefSlide" value="" name="numbDefSlide" /> <br><br>
              <select>
                        <option value="state">--State--</option>
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
              <input type="text" name="Federal_District" placeholder="Federal District"> <br>
            </form>
        </div>
 
    <h2><a href="#">Type of Trafficking</a></h2>
        <div>
            <form action="">
            <input type="checkbox" name="adultSex" value="name"> Adult Sex
            <input type="checkbox" name="minorSex" value="age"> Minor Sex
            <input type="checkbox" name="laborSex" value="age"> Labor
            </form>
        </div>

    <h2><a href="#">Defendant</a></h2>
        <div>
            <form action="">
            <input type="text" name="nameDefendant" placeholder="Name"> <br><br>
              <select>
                        <option value="genderD">--Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br><br>
              Year of Birth<br><br>
              <input type="text" id="yearBirthDefendant" value="" name="yearBirthDefendant" /> <br><br>
                   
              <select>
                        <option value="def_race">--Race--</option>
                        <option value="def_white">White</option>
                        <option value="def_black">Black</option>
                        <option value="def_hispanic">Hispanic</option>
                        <option value="def_asian">Asian</option>
                        <option value="def_other">Other</option>
                      </select>
            </form>

        </div>

    <h2><a href="#">Judge</a></h2>
        <div>
            <form action="">
            <input type="text" name="nameJudge" placeholder="Name"> <br><br>
              <select>
                        <option value="judge_race">--Race--</option>
                        <option value="judge_white">White</option>
                        <option value="judge_black">Black</option>
                        <option value="judge_hispanic">Hispanic</option>
                        <option value="judge_asian">Asian</option>
                        <option value="judge_other">Other</option>
                      </select> <br><br>
              <select>
                        <option value="genderJ">--Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br><br>
              Year Appointed<br><br>
              <input type="text" id="yearAppointJudge" value="" name="yearAppointJudge" /> <br><br>
              <input type="text" name="judgeAppointedBy" placeholder="Appointed By"> <br>
            </form>
        </div>

    <h2><a href="#">Organized Crime Group</a></h2>
        <div>
            <form action="">
            <input type="text" name="groupName" placeholder="Group Name"> <br><br>
              <select>
                        <option value="ocgType">--Type--</option>
                        <option value="momAndPopOCG">Mom and Pop</option>
                        <option value="sgOCG">Street Gang</option>
                        <option value="cartelOCG">Cartel/Syndicate/Mafia</option>
                        <option value="prisonGangOCG">Prison Gang</option>
                        <option value="otherOCG">Other</option>
                      </select> <br><br>
              <select>
                        <option value="ocgScope">--Scope--</option>
                        <option value="LocalOCG">Local</option>
                        <option value="transStateOCG">Trans-State</option>
                        <option value="transNationalOCG">Trans-National</option>
                      </select> <br><br>
               <select>
                        <option value="OCG_race">--Race--</option>
                        <option value="OCG_white">White</option>
                        <option value="OCG_black">Black</option>
                        <option value="OCG_hispanic">Hispanic</option>
                        <option value="OCG_asian">Asian</option>
                        <option value="OCG_other">Other</option>
                      </select> <br>
            </form>
        </div>

    <h2><a href="#">Victims</a></h2>
        <div>
            <form action="">
              Total<br><br>
              <input type="text" id="totalSlide" value="" name="totalSlide" /> <br><br>
              Minor<br><br>
              <input type="text" id="minorSlide" value="" name="minorSlide" /> <br><br>
              Foreigner <br><br>
              <input type="text" id="foreignerSlide" value="" name="foreignerSlide" /> <br><br>
              Female <br><br>
              <input type="text" id="femaleSlide" value="" name="femaleSlide" /> <br><br>

            </form> 
        </div>

    <h2><a href="#">Arrest Details</a></h2>
        <div>
            <form action="">
              Date of Arrest<br><br>
              <input type="text" id="dateArrestAD" value="" name="dateArrestAD" /> <br><br>
              <select>
                <option value="detainedArrest">--Detained--</option>
                <option value="detainedYes">Yes</option>
                <option value="detainedNo">No</option>
              </select> <br><br>
              <select>
                <option value="roleArrest">--Role--</option>
                <option value="roleYes">Yes</option>
                <option value="roleNo">No</option>
              </select> <br><br>
               <select>
                <option value="bailArrest">--Bail Type--</option>
                <option value="noBail">No Bail</option>
                <option value="suretyBail">Surety Bail</option>
                <option value="nonSuretyBail">Non-Surety Bail</option>
              </select> <br><br>
              <input type="text" name="nameJudge" placeholder="Name"> <br><br>
              Bail Amount<br><br>
              <input type="text" id="bailAmountArrest" value="" name="bailAmountArrest" /> <br>
             
            </form>
        </div>

    <h2><a href="#">Charge Details</a></h2>
        <div>
            <form action="">
              Charge Date <br><br>
              <input type="text" id="chargeDate" value="" name="chargeDate" /> <br><br>
              Total Number of Charges<br><br>
              <input type="text" id="totalCharges" value="" name="totalCharges" /> <br><br>
              <h3><a href="#">Statutes</a></h3> 
              <div>
                Place statutes here? <br>
              </div> <br><br>
              Counts<br><br>
              <input type="text" id="countsCharge" value="" name="countsCharge" /> <br><br>
              Counts Nolle Prossed <br><br>
              <input type="text" id="countsNolleProssed" value="" name="countsNolleProssed" /> <br><br>
              Pleas Dismissed <br><br>
              <input type="text" id="pleaDismiss" value="" name="pleaDismiss" /> <br><br>
              Pleas Guilty <br><br>
              <input type="text" id="pleaGuilty" value="" name="pleaGuilty" /> <br><br>
              Trials Guilty <br><br>
              <input type="text" id="trialGuilty" value="" name="trialGuilty" /> <br><br>
              Trials Not Guilty <br><br>
              <input type="text" id="trialNotGuilty" value="" name="trialNotGuilty" /> <br><br>
              Fines <br><br>
              <input type="text" id="finesCharge" value="" name="finesCharge" /> <br><br>
              Sentence <br><br>
              <input type="text" id="sentenceCharge" value="" name="sentenceCharge" /> <br><br>
              Probation <br><br>
              <input type="text" id="probationCharge" value="" name="probationCharge" /> <br><br>
            </form>
        </div>

    <h2><a href="#">Sentencing Details</a></h2>
        <div>
            <form action="">
             Total Number Felonies Sentenced <br><br>
             <input type="text" id="totalNumFelonySentence" value="" name="totalNumFelonySentence" /> <br><br>
             Date Terminated <br><br>
             <input type="text" id="dateTermSentenced" value="" name="dateTermSentenced" /> <br><br>
             Total Months Sentenced <br><br>
             <input type="text" id="totalMonthsSentenced" value="" name="totalMonthsSentenced" /> <br><br>
             Amount Restitution <br><br>
             <input type="text" id="amountRestitutionSent" value="" name="amountRestitutionSent" /> <br><br>
              <select>
                <option value="assetForfeit">--Asset Forfeit--</option>
                <option value="ASYes">Yes</option>
                <option value="AsNo">No</option>
              </select> <br><br>
              <select>
                <option value="appealSentence">--Appeal--</option>
                <option value="yesSentence2">Yes</option>
                <option value="noSentence2">No</option>
              </select> <br><br>
            Number of Months Supervised Release <br><br>
              <input type="text" id="monthsSuperReleaseSentence" value="" name="monthsSuperReleaseSentence" /> <br><br>
            Number of Months Probation <br><br>
              <input type="text" id="monthsProbationSentence" value="" name="monthsProbationSentence" /> <br><br>


               

                     
                

            </form>
        </div>

         
 </div>
</div>

            <br><br>
            <hr style="1px dashed #9a9a9a;">

            <br>

            <div class="search_disclaim">
            <p><strong>Disclaimer: </strong>Not every combination of searched values can be graphed.</p>
            </div>
 
        </div>
    </div>

<!--*********************************************
SCRIPTS
*********************************************-->    
<!-- Script to allow search bars collapsible - added by Landon -->
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
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>
<!-- slider Script -->
 <script type="text/javascript" src="/JudgeFrog/jdgfrog/js/sliderMod.js"></script>


</body>