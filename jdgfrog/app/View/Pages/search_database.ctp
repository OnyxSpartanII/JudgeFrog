<!-- <?php $this->set('selectedlink', 'search'); ?> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/search_page_css.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/nav_bar_style.css">

  <!-- Search Imports -->
  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/default.css" />
  <link rel="stylesheet" type="text/css" href="/jdgfrog/css/component.css" />
  <script src="/jdgfrog/js/modernizr.custom.js"></script>

  <!--NoUISlider Imports -->
  <link href="/jdgfrog/css/jquery.nouislider.min.css" rel="stylesheet">
  <script src="/jdgfrog/js/jquery.nouislider.all.min.js"></script>
 

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
<!-- Slider Script Code: added by LW 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
  -->
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
              <input type="text" name="Name" placeholder="Name (e.g. USA v. Jones)"> <br>
              <input type="text" name="Number" placeholder="Number (e.g. 00-cu-)"> <br>
              Number of Defendants: (slider) <input type="text" name="Number_of_Defendants"> <br>
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
            <input type="text" name="nameDefendant" placeholder="Name"> <br>
              <select>
                        <option value="genderD">--Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br>
              Year Of Birth (Slider): <br>
                   
              Race: <select>
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
            <input type="text" name="nameJudge" placeholder="Name"> <br>
              <select>
                        <option value="judge_race">--Race--</option>
                        <option value="judge_white">White</option>
                        <option value="judge_black">Black</option>
                        <option value="judge_hispanic">Hispanic</option>
                        <option value="judge_asian">Asian</option>
                        <option value="judge_other">Other</option>
                      </select> <br>
              <select>
                        <option value="genderJ">--Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select> <br>
              Year Appointed (slider): <br>
              <input type="text" name="judgeAppointedBy" placeholder="Appointed By"> <br>
            </form>
        </div>

      <h2><a href="#">Organized Crime Group</a></h2>
        <div>
            <form action="">
            <input type="text" name="groupName" placeholder="Group Name"> <br>
              <select>
                        <option value="ocgType">--Type--</option>
                        <option value="momAndPopOCG">Mom and Pop</option>
                        <option value="sgOCG">Street Gang</option>
                        <option value="cartelOCG">Cartel/Syndicate/Mafia</option>
                        <option value="prisonGangOCG">Prison Gang</option>
                        <option value="otherOCG">Other</option>
                      </select> <br>
              <select>
                        <option value="ocgScope">--Scope--</option>
                        <option value="LocalOCG">Local</option>
                        <option value="transStateOCG">Trans-State</option>
                        <option value="transNationalOCG">Trans-National</option>
                      </select> <br>
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
              Total: (Slider) <br>
               <div id="range-slider"></div>  <!-- Trying to implement nouiSlider Code -->
               <Script>
               $("#nonlinear").noUiSlider({
                  connect: true,
                  behaviour: 'tap',
                  start: [ 500, 4000 ],
                  range: {
                    // Starting at 500, step the value by 500,
                    // until 4000 is reached. From there, step by 1000.
                    'min': [ 0 ],
                    '10%': [ 500, 500 ],
                    '50%': [ 4000, 1000 ],
                    'max': [ 10000 ]
                  }
                });
               </Script>

              Minor: (Slider)<br>
              Foreigner: (Slider) <br>
              Female: (Slider) <br>
            </form>
        </div>

      <h2><a href="#">Arrest Details</a></h2>
        <div>
            <form action="">
              Total: (Slider) <br>
              Minor: (Slider)<br>
              Foreigner: (Slider) <br>
              Female: (Slider) <br>
            </form>
        </div>

      <h2><a href="#">Charge Details</a></h2>
        <div>
            <form action="">
              Charge Date: (year Slider) <br>
              Total Number of Charges: (Slider)<br>
              Statute: (Drop down of all statutes) <br>
              Counts: (Slider) <br>
              Counts Nolle Prossed: (slider) <br>
              ***Question on form***  <br>
              Plea Dismissed: <input type="number" name="dismissedPleaCharge"> <br>
              Plea Guilty: <input type="number" name="pleaGuiltyCharge"> <br>
              Trial Guilty: <input type="number" name="trialGuiltyCharge"> <br>
              Trial Not Guilty: <input type="number" name="trialNotGuiltyCharge"> <br>
              ***Question on form***  <br>
              Fines: (slider) <br>
              Sentence: (slider) <br>
              Probation: (slider) <br>
            </form>
        </div>

      <h2><a href="#">Sentencing Details</a></h2>
        <div>
            <form action="">
             Total Number Felonies Sentenced: (Slider) <br>
             Date Terminated: (Slider) <br>
             Total Months Sentenced: (Slider) <br>
             <input type="text" name="amountResSentence" placeholder="$ Amount Restitution"> <br>
                Total: <input type="number" name="totalSentence"> <br>
                    <select>
                        <option value="yesSentence">--Asset Forfeit--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br>
                
                    <select>
                        <option value="yesSentence">--Appeal--</option>
                        <option value="yesSentence">Yes</option>
                        <option value="noSentence">No</option>
                      </select> <br>
                Number of Months Supervised Release: (Slider) <br>
                Number of Months Probation: (Slider) <br>
            </form>
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

    <script src="/jdgfrog/js/classie.js"></script>
    <script src="/jdgfrog/js/uisearch.js"></script>
    <script>
      new UISearch( document.getElementById( 'sb-search' ) );
    </script>


</body>