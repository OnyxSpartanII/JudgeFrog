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
                            <li><a href="#meth">METHODOLOGY</a></li>
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
                              <div id="meth">
                                  <div class="facts">
                                    <p>The cases in this database by no means represent the entire universe of all federal human trafficking cases in the United States; however, we are confident that it does represent a very large proportion of them.  Our goal was to develop a case search methodology that was broad enough to capture human trafficking cases that might otherwise go unnoticed, but specific enough so as not to yield large numbers of irrelevant cases.</p>
                                    <p>We started with the premise that many cases of human trafficking are going unidentified as such by scholars, practitioners, and other stakeholders because they are being prosecuted as some other type of organized criminal activity.  Thus, establishing the most accurate and comprehensive understanding of human trafficking in the United States is going to require an examination of those cases prosecuted not only for human trafficking, but also for other types of related organized criminal activity.</p>
                                    <p>The cases in this database were identified using three different legal search engines:  Bloomberg Law, WestLaw, and LexisNexis.  Detailed search protocols for each search engine were written, tested, and finalized.  Search terms, in various combinations, included, but were not limited to: human trafficking, labor trafficking, forced labor, servitude, slave, prostitute, brothel, gang, organized crime, mafia, cartel, conspiracy, racketeering, RICO, visa fraud, document fraud, document tampering.  Case searches were limited to post-TVPA cases, 2000 to 2013.</p>
                                    <p>We triangulated the results of the cases that turned up from searching Bloomberg Law, WestLaw, and LexisNexis using media searches of human trafficking cases in several other news search engines, including Access World News, Google News, and LexisNexis.  Every state was searched systematically using the following terms and/or combinations of terms:  human trafficking, sex trafficking, labor trafficking, arrest, convict, and investigate.</p>
                                    <p>Cases that turned up in the searches were then reviewed to determine whether they were human trafficking cases.  For all cases that were determined to be human trafficking, dockets and indictments were obtained via PACER and the cases were coded according to the criteria that are now searchable on this database.</p>  
                                  </div>
                              </div>
                              <div id="prin-inv">
                                  <div class="facts">
                                    <p>
                                    <?php echo $this->Html->image('van.jpg', array('alt' => 'Vanessa Bouche', 'style' => 'float:left; padding-right:10px;' )); ?>
                                      Dr. Vanessa Bouch&eacute; is Assistant Professor of Political Science at Texas Christian University.  Dr. Bouch&eacute; is currently the co-PI on three federally-funded grants on human trafficking, two from the National Institute of Justice and one from the United States Agency on International Development.  Her research has been published in the Journal of Politics, Journal of Public Policy, Politics &amp; Gender, among others, and focuses on questions about identity and politics, human trafficking, and public policymaking. As a scholar-activist, Dr. Bouch&eacute; is also engaged in community efforts to combat human trafficking at the local, state, federal, and international levels, which has taken her across the country and the globe to consult and collaborate with various government agencies, international organizations, and NGOs.  Dr. Bouch&eacute; received her Ph.D. from The Ohio State University, a Masters in Public Affairs from the University of Texas, LBJ School of Public Affairs, and a B.A. from Columbia University.</p> 
                                  </div>
                              </div>
                              <div id="ack">
                                  <div class="facts">
                                    <p>This website was developed under a grant from the National Institute of Justice (NIJ), United States Department of Justice. Special thanks goes out to Global Centurion for assisting with case searches, as well several research assistants at TCU for their very thorough culling and coding of case records. We are also indebted to Dr. Donnell Payne and her senior design team in TCU&#39;s Department of Computer Science for their technical expertise and guidance in crafting the exceptional functionalities of this database.</p>  
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>