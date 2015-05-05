<div class="contact">
<!--about-banner-->
<div class="about-banner">
       <div class="container">
             <div class="about-main"> 
                <h2>About</h2>
             </div>
       </div>
</div>
<?php
    //Modified version of jquery-ui. jquery min is a necessary call for the tabs to function.
    echo $this->Html->css(array('jquery-ui-new'));
    echo $this->Html->script(array('jquery-1.10.2.min', 'jquery-ui-new'));
?>
  <script>
  $(function() {
    $( "#horizontalTab").tabs();
  });
  </script>
<!---about banner end here-->
<div class="about-tab">
      <div class="container" "about-con">
            <div class="about-tab-main">
                  <div class="sap_tabs">    
                     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px; border:none">
                          <ul style="font-size:1.1em; width: 100%;">
                            <li><a href="#about-htd">ABOUT HUMAN TRAFFICKING DATA</a></li>
                            <li><a href="#prin-inv">PRINCIPLE INVESTIGATOR</a></li>
                            <li><a href="#ack">ACKNOWLEDGEMENTS</a></li>
                          </ul>
                              <div id="about-htd">
                                  <div class="facts">
                                    <p>HumanTraffickingData.org is an open-source, searchable database with information on federal human trafficking prosecutions across the United States.  It is a user-friendly experience designed for researchers, non-profit organizations, and government agencies, as well as any citizen with a civic interest in understanding the complexity of human trafficking cases in the United States.</p>
                                    <p>Users can download specific data and variables for analysis, derive graphs and charts of their choosing with descriptive information on federal human trafficking cases, or map where different types of cases across the country are being prosecuted.  The possibilities for data generation and analysis using this database are endless.</p>
                                    <p>Our hope is that this database becomes an invaluable tool for everyone with an interest in combatting human trafficking in the United States.  We hope the information obtained within this database is helpful in understanding the issue more deeply and developing the most effective solutions to prevent, protect against, and prosecute human trafficking in the U.S.     
                                    </p>     
                                  </div>
                              </div>
                              <div id="prin-inv">
                                  <div class="facts">
                                    <p>
                                      Dr. Vanessa Bouch&eacute; is Assistant Professor of Political Science at Texas Christian University.  Dr. Bouch&eacute; is currently the co-PI on three federally-funded grants on human trafficking, two from the National Institute of Justice and one from the United States Agency on International Development.  Her research has been published in the Journal of Politics, Journal of Public Policy, Politics &amp; Gender, among others, and focuses on questions about identity and politics, human trafficking, and public policymaking. As a scholar-activist, Dr. Bouch&eacute; is also engaged in community efforts to combat human trafficking at the local, state, federal, and international levels, which has taken her across the country and the globe to consult and collaborate with various government agencies, international organizations, and NGOs.  Dr. Bouch&eacute; received her Ph.D. from The Ohio State University, a Masters in Public Affairs from the University of Texas, LBJ School of Public Affairs, and a B.A. from Columbia University.</p> 
                                  </div>
                              </div>
                              <div id="ack">
                                  <div class="facts">
                                    <p>This website was developed under a grant from the National Institute of Justice (NIJ), United States Department of Justice. Special thanks goes out to Global Centurion for assisting with case searches, as well several research assistants at TCU for their very thorough culling and coding of case records. We are also indebted to a Senior Design team in the  TCU Computer Science Department for their technical expertise and guidance in crafting the database and the exceptional functionalities of this web application.</p>  
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>