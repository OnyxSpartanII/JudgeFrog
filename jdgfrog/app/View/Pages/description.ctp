<div class="contact">
<!--about-banner-->
<div class="about-banner">
       <div class="container">
             <div class="about-main"> 
                <h2>Description &amp; Definition</h2>
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
                     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px; border:none; tet-align:left">
                          <ul style="font-size:1.2em; width: 100%;">
                            <li><a href="#meth">METHODOLOGY</a></li>
                            <li><a href="#oct">ORGANIZED CRIME TYPOLOGIES</a></li>
                            <li><a href="#fed-stat">DESCRIPTION OF STATUTES</a></li>
                          </ul>
                              <div id="meth">
                                  <div class="facts">
                                    <p>The cases in this database by no means represent the entire universe of all federal human trafficking cases in the United States; however, we are confident that it does represent a very large proportion of them.  Our goal was to develop a case search methodology that was broad enough to capture human trafficking cases that might otherwise go unnoticed, but specific enough so as not to yield large numbers of irrelevant cases.</p>
                                    <p>We started with the premise that many cases of human trafficking are going unidentified as such by scholars, practitioners, and other stakeholders because they are being prosecuted as some other type of organized criminal activity.  Thus, establishing the most accurate and comprehensive understanding of human trafficking in the United States is going to require an examination of those cases prosecuted not only for human trafficking, but also for other types of related organized criminal activity.</p>
                                    <p>The cases in this database were identified using three different legal search engines:  Bloomberg Law, WestLaw, and LexisNexis.  Detailed search protocols for each search engine were written, tested, and finalized.  Search terms, in various combinations, included, but were not limited to: human trafficking, labor trafficking, forced labor, servitude, slave, prostitute, brothel, gang, organized crime, mafia, cartel, conspiracy, racketeering, RICO, visa fraud, document fraud, document tampering.  Case searches were limited to post-TVPA cases, 2000 to 2013.</p>
                                    <p>We triangulated the results of the cases that turned up from searching Bloomberg Law, WestLaw, and LexisNexis using media searches of human trafficking cases in several other news search engines, including Access World News, Google News, and LexisNexis.  Every state was searched systematically using the following terms and/or combinations of terms:  human trafficking, sex trafficking, labor trafficking, arrest, convict, and investigate.</p>
                                    <p>Cases that turned up in the searches were then reviewed to determine whether they were human trafficking cases.  For all cases that were determined to be human trafficking, dockets and indictments were obtained via PACER and the cases were coded according to the criteria that are now searchable on this database.</p>  
                                  </div>
                              </div>
                              <div id="oct">
                                   <div class="facts">
                                       <div class="col-md-6 ocg-container">
                                       <h4 style="font-size:1.1em; margin:25px 0px; color:#4D1979; border-bottom:2px solid #DCDCDC">CLASSIFICATION CONDITIONS</h4>
                                             <div class="typo">
                                                  <h4 style="text-decoration: underline">Mom &amp; Pop</h4>
                                                  <p>
                                                       The primary variable that classifies a mom &amp; pop criminal organization is the total size of the organization and whether or not they have a name.  If the organized criminal activity that is taking place among a relatively small group of people who are not connected to or affiliated with an organization that has a name, then it is considered a mom &amp; pop group.
                                                  </p>
                                                  <label><strong>Sophistication </strong> Varies</label><br>
                                                  <label><strong>Scope</strong> Varies</label><br>
                                                  <label><strong>Structure</strong> Varies</label><br>
                                                  <strong>Self-Identification</strong>
                                                       <ul class="self-list">
                                                            <li>Strength: <span>Varies</span></li>
                                                            <li>Type: <span>Family or business</span></li>
                                                            <li>Name: <span>No</span></li>
                                                       </ul>
                                                  <label><strong>Size</strong> Small</label><br>
                                             </div>
                                             <br style="padding 10px 0px;">
                                             <div class="typo">
                                                  <h4 style="text-decoration: underline">Street Gang</h4>
                                                  <p>
                                                       The primary variables classifying a street gang are that the group operates only in a locality or across the U.S. (but not internationally), that the group has a name, that members strongly identify with the group, and that the gang is organized based on either race/ethnicity or gender (but not family or business).
                                                  </p>
                                                  <label><strong>Sophistication </strong> Varies</label><br>
                                                  <label><strong>Scope</strong> Local, U.S.</label><br>
                                                  <label><strong>Structure</strong> Varies</label><br>
                                                  <strong>Self-Identification</strong>
                                                       <ul class="self-list">
                                                            <li>Strength: <span>Strong</span></li>
                                                            <li>Type: <span>Race, Ethinicity/Gender</span></li>
                                                            <li>Name: <span>No</span></li>
                                                       </ul>
                                                  <label><strong>Size</strong> Small</label><br>
                                             </div>
                                             <br style="padding 10px 0px;">
                                             <div class="typo">
                                                  <h4 style="text-decoration: underline">Cartel/Mafia/Syndicate</h4>
                                                  <p>
                                                       There are several variables that can be used to classify whether a group is a cartel/mafia/syndicate.  First is the level of sophistication of the types of criminal activity in which these groups are engaged.  Second, these groups cannot operate only locally; they operate either across the U.S. or internationally.  Third, these groups are hierarchically structured, with a head boss at the top who calls the shots and has final authority.  Finally, these groups are organized around family ties or race/ethnicity and are usually comprised of hundreds (or thousands) of people.
                                                  </p>
                                                  <label><strong>Sophistication:</strong> High sophistication</label><br>
                                                  <label><strong>Scope:</strong> U.S. International</label><br>
                                                  <label><strong>Structure</strong> Hierarchical</label><br>
                                                  <strong>Self-Identification</strong>
                                                       <ul class="self-list">
                                                            <li>Strength: <span>Varies</span></li>
                                                            <li>Type: <span>Family, Race/Ethinicity</span></li>
                                                            <li>Name: <span>Varies</span></li>
                                                       </ul>
                                                  <label><strong>Size</strong> Large</label><br>
                                             </div>
                                             <br style="padding 10px 0px;">
                                             <div class="typo" style="border:none">
                                                  <h4 style="text-decoration: underline">Illegal Enterprise</h4>
                                                  <p>
                                                       The illegal enterprise classification is based on high sophistication, and self-identification being weak among those involved where the identity is based on creation of a business that has an incorporated or legal name. 
                                                  </p>
                                                  <label><strong>Sophistication </strong> High sophistication</label><br>
                                                  <label><strong>Scope</strong> Varies</label><br>
                                                  <label><strong>Structure</strong> Varies</label><br>
                                                  <strong>Self-Identification</strong>
                                                       <ul class="self-list">
                                                            <li>Strength: <span>Weak</span></li>
                                                            <li>Type: <span>Business</span></li>
                                                            <li>Name: <span>Yes</span></li>
                                                       </ul>
                                                  <label><strong>Size</strong> Varies</label><br>
                                             </div>
                                        </div>
                                   <div class="col-md-6 stat-container">
                                        <h4 style="font-size:1.1em; margin:25px 0px; color:#4D1979; border-bottom:2px solid #DCDCDC">DEFINITIONS</h4>
                                        <div class="typo">
                                             <h4 style="text-decoration: underline">Sophistication</h4>
                                                  <p>
                                                       The sophistication of the organized crime group is determined by the complexity of the group’s organized criminal activity.  Sophistication can range from high to low.  The level of sophistication is based on the different types of criminal activity in which the group engages outside of human trafficking (e.g., drugs, arms, document/visa/immigration fraud, murder, money laundering, tax evasion, etc.)
                                                  </p>
                                        </div>
                                        <div class="typo">
                                             <h4 style="text-decoration: underline">Scope</h4>
                                                  <p>
                                                       The scope of the organized crime group is where the group operates:  locally, in the U.S. only, or internationally.
                                                  </p>
                                        </div>
                                        <div class="typo">
                                             <h4 style="text-decoration: underline">Structure</h4>
                                                  <p>
                                                       The structure of an organized crime group is determined by how hierarchical the group is.  It ranges from very hierarchical, wherein the group has a “king pin” or “Godfather” figure, to highly decentralized where there is no main boss or head of the group.
                                                  </p>
                                        </div>
                                        <div class="typo">
                                             <h4 style="text-decoration: underline">Self-Identification</h4>
                                                  <p>
                                                       The self-identification of an organized crime group is based on three things: 1) how strongly members adhere to their identification with the group, 2) the type of identification around which the group is formed, and 3) whether the group has a name.  Members can strongly identify with the group (e.g., with branding and/or initiation) or only weakly or loosely affiliate.  The group can identify itself based on being a member of a biological family, race/ethnicity, gender, or business.
                                                  </p>
                                        </div>
                                        <div class="typo">
                                             <h4 style="text-decoration: underline">Size</h4>
                                                  <p>
                                                       The size of an organized crime group refers to the total number of people that would consider themselves a part or member of the group or enterprise.  A small group would have less than 20 people as part of the group.  Large groups have thousands.
                                                  </p>
                                        </div>
                                   </div>
                                   </div>
                              </div>
                              <div id="fed-stat">
                                  <div class="facts">      
                                        <div class="col-md-5">
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1028</h4>
                                                            <p>
                                                                 Fraud and related activity in connection with access devices
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1324</h4>
                                                            <p>
                                                                 Bringing in and harboring certain aliens
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1328</h4>
                                                            <p>
                                                                 Importation of alien for immoral purposes
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1351</h4>
                                                            <p>
                                                                 Fraud in foreign labor contracting
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1425</h4>
                                                            <p>
                                                                 Unlawful procurement of citizenship or nationalization
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1512</h4>
                                                            <p>
                                                                 Tampering with a witness, victim, or an informant
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1546</h4>
                                                            <p>
                                                                 Tampering with a witness, victim, or an informant
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1546</h4>
                                                            <p>
                                                                 Fraud and misuse of visas, permits, and other documents
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1581-1588</h4>
                                                            <p>
                                                                 Peonage and slavery
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1589</h4>
                                                            <p>
                                                                 Forced labor
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1590</h4>
                                                            <p>
                                                                 Trafficking
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1591</h4>
                                                            <p>
                                                                 Sex trafficking children
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1592</h4>
                                                            <p>
                                                                 Documents in furtherance of trafficking
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 2252</h4>
                                                            <p>
                                                                 Material involving sexual exploitation of minors
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 2260</h4>
                                                            <p>
                                                                 Sexually explicit images of minor for importation to U.S.
                                                            </p>
                                                  </div>
                                                  <div class="typo">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 1961-1968</h4>
                                                            <p>
                                                                 RICO
                                                            </p>
                                                  </div>
                                                  <div class="typo" style="border:none">
                                                       <h4 style="text-decoration: underline">18 U.S.C. &sect; 2421-2424</h4>
                                                            <p>
                                                                 Transportation for purpose of prostitution
                                                            </p>
                                                  </div>
                                        </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>






<style type="text/css">
	.self-list li{
		font-weight: 400;
	}
	.self-list li span{
		font-weight: normal;
		font-style: italic;
		font-size: 13px;
		font-weight: 300;
	}
	.typo{
		text-align:left;  
		border-bottom:1px solid #ddd;
		padding-bottom: 20px;
	}
</style>