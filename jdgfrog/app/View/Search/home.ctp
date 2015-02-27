<!-- Imports for Auto Complete -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
<!-- Calling Slider Imports -->
  <?php 
  echo $this->Html->script(array('modernizr.custom', 'classie','moment','ion.rangeSlider.js','ion.rangeSlider.min','sliderMod', 'modal_window_style', 'jquery.simplemodal',)); 
  echo $this->Html->css(array('search_page_css', 'nav_bar_style', 'default','ion.rangeSlider.skinFlat','ion.rangeSlider'));
  ?>

<!--search start here-->
<div class="contact">
    <div class="container">
         <div class="contact-main">
          <h3 class="page_title">SEARCH THE DATABASE</h3>
              <div class="col-md-5 contact-right">
                <!-- TOP STATUS AND SEARCH BAR -->
                  <div class="top_bar col-md-5">
                    <div class="top_bar_left">
                      <h4>SEARCH BY</h4>
                    </div>
                      <!-- SEARCH BUTTON-->
                      <div class="search_button">
                        <label for="submit_form">
                          <?php echo $this->Html->image('submit1.png', array('alt' => 'Submit', 'style' => 'float:left; padding-right:10px; padding-top:10px;' )); ?>
                        </label>
                      </div>
                  </div>
                <!-- Search Interface -->
                  <div class="col-md-5" id="collapsible-panels">
                      <?php
                        $base_url = array('controller' => 'search', 'action' => 'update');
                        echo $this->Form->create(array('url' => $base_url, 'inputDefaults' => array('label' => false, 'div' => false)));
                      ?>
                        <h2><a href="#">Case</a></h2>
                            <div>
                                <?php
                                  echo $this->Form->input('case_Name', array('placeholder' => 'Name (e.g. USA v. Jones)', 'type' => 'text'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_Number', array('placeholder' => 'Number (e.g. 00-cu-)'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_NumDef', array('label' => 'Number of Defendants', 'id' => 'numbDefSlide'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_State', array('options' => array('Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut','Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'), 'empty' => 'State'));
                                  echo "<br><br>";
                                  echo $this->Form->input('case_FedDist', array('placeholder' => 'Federal District', 'options' => array('','Mickey','Mouse')));
                                  echo "<br>";
                                ?>
                            </div>
                   
                          <h2><a href="#">Type of Trafficking</a></h2>
                            <div >
                                <?php
                                  echo $this->Form->input('case_Adult', array('type' => 'checkbox', 'label' => ' Adult Sex ', 'checked' => 'true'));
                                  echo '<br><br>';
                                  echo $this->Form->input('case_Minor', array('type' => 'checkbox', 'label' => ' Minor Sex ', 'checked' => 'true'));
                                  echo '<br><br>';
                                  echo $this->Form->input('case_Labor', array('type' => 'checkbox', 'label' => ' Labor', 'checked' => 'true'));
                                  echo '<br>';
                                ?>
                            </div>

                          <h2><a href="#">Defendant</a></h2>
                            <div>
                                <?php
                                  echo $this->Form->input('defendant_Name', array('placeholder' =>'Name'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_Gender', array('options' => array('Male', 'Female'), 'empty' => 'Gender'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_YOB', array('label' => 'Year of Birth', 'id' => 'yearBirthDefendant'));
                                  echo '<br><br>';
                                  echo $this->Form->input('defendant_Race', array('empty' => 'Race', 'options' => array('White', 'Black', 'Hispanic', 'Asian', 'Other')));
                                  echo '<br>';
                                ?>
                          </div>

                          <h2><a href="#">Judge</a></h2>
                            <div>
                              <?php
                                echo $this->Form->input('judge_Name', array('placeholder' => 'Name'));
                                echo '<br><br>';
                                echo $this->Form->input('judge_Race', array('empty' => 'Race', 'options' => array('White','Black','Hispanic','Asian','Other')));
                                echo '<br><br>';
                                echo $this->Form->input('judge_Gender', array('empty' => 'Gender', 'options' => array('Male','Female')));
                                echo '<br><br>';
                                echo $this->Form->input('judge_YearApp', array('id' => 'yearAppointJudge'));
                                echo '<br><br>';
                                echo $this->Form->input('judge_ApptBy', array('empty' => 'Appointed By', 'options' => array('Democrat', 'Republican')));
                                echo '<br>';
                              ?>
                            </div>

                          <h2><a href="#">Organized Crime Group</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('ocg_Name', array('placeholder' => 'Name'));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Type', array('empty' => 'Type', 'options' => array('Mom and Pop', 'Street Gang', 'Cartel/Syndicate/Mafia', 'Prison Gang', 'Other')));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Scope', array('empty' => 'Scope', 'options' => array('Local', 'Trans-State', 'Trans-National')));
                              echo '<br><br>';
                              echo $this->Form->input('ocg_Race', array('empty' => 'Race', 'options' => array('White','Black','Hispanic','Asian','Other')));
                              echo '<br>';
                            ?>
                          </div>
                          
                          <h2><a href="#">Victims</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('victims_Total', array('id' => 'totalSlide', 'label' => 'Total'));
                              echo $this->Form->input('victims_Minor', array('id' => 'minorSlide', 'label' => 'Minor'));
                              echo $this->Form->input('victims_Foreign', array('id' => 'foreignerSlide', 'label' => 'Foreigner'));
                              echo $this->Form->input('victims_Female', array('id' => 'femaleSlide', 'label' => 'Female'));
                            ?>
                          </div>

                          <h2><a href="#">Arrest Details</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('ad_DateArrest', array('id' => 'dateArrestAD', 'label' => 'Date of Arrest'));
                              echo '<br><br>';
                              echo $this->Form->input('ad_Role', array('empty' => 'Role', 'options' => array('Yes','No')));
                              echo '<br><br>';
                              echo $this->Form->input('ad_BailType', array('empty' => 'Bail Type', 'options' => array('None','Surety','Non-Surety')));
                              echo '<br><br>';
                              echo $this->Form->input('ad_BailAmount', array('id' => 'bailAmountArrest', 'label' => 'Bail Amount'));
                              echo '<br>';
                            ?>
                          </div>

                        <h2><a href="#">Charge Details</a></h2>
                          <div>
                            <?php
                              echo $this->Form->input('cd_Date', array('id' => 'chargeDate', 'label' => 'Date of Charge'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_TtlCharges', array('id' => 'totalCharges', 'label' => 'Total Charges'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_Statute', array('empty' => 'Statute', 'options' => array('Mickey','Mouse')));
                              echo '<br><br>';
                              echo $this->Form->input('cd_Counts', array('id' => 'countsCharge', 'label' => 'Counts'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_CountsNP', array('id' => 'countsNolleProssed', 'label' => 'Counts Nolle Prossed'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_PleaDismiss', array('id' => 'pleaDismiss', 'label' => 'Pleas Dismissed'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_PleaGuilty', array('id' => 'pleaGuilty', 'label' => 'Pleas Guilty'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_TrialGuilty', array('id' => 'trialGuilty', 'label' => 'Trials Guilty'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_TrialNotGuilty', array('id' => 'trialNotGuilty', 'label' => 'Trials Not Guilty'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_Sentence', array('id' => 'sentenceCharge', 'label' => 'Months Sentenced'));
                              echo '<br><br>';
                              echo $this->Form->input('cd_Probation', array('id' => 'probationCharge', 'label' => 'Months Probation'));
                              echo '<br>';
                            ?>
                          </div>

                      <h2><a href="#">Sentencing Details</a></h2>
                      <div>
                        <?php
                          echo $this->Form->input('sd_TtlFelonies', array('id' => 'totalNumFelonySentence', 'label' => 'Total # Felonies Sentenced'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_DateTerminated', array('id' => 'dateTermSentenced', 'label' => 'Year Terminated'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_TtlMonths', array('id' =>'totalMonthsSentenced', 'label' => 'Total Months Sentenced'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_Restitution', array('id' => 'amountRestitutionSent', 'label' => 'Amount Restitution'));
                          echo '<br><br>';
                          echo $this->Form->input('sd_AssetForfeit', array('empty' => 'Asset Forfeit', 'options' => array('Yes','No')));
                          echo '<br><br>';
                          echo $this->Form->input('sd_Appeal', array('empty' => 'Appeal', 'options' => array('Yes','No')));
                          echo '<br><br>';
                          echo $this->Form->input('sd_MonthsProb', array('id' => 'monthsProbationSentence', 'label' => '# of Months Probation'));
                          echo '<br>';
                        ?>
                      </div>
                      <?php
                        echo $this->Form->end(array('id' => 'submit_form'));
                      ?>
                   </div> <!-- END OF COLLAPSIBLE PANEL -->

               </form>
          </div>
          <div class="col-md-7 contact-left">
                <!-- TOP STATUS AND SEARCH BAR -->
                  <div class="top_bar col-md-7">
                    <div class="top_bar_dash">
                      <h4>SEARCH DASHBOARD</h4>
                    </div>
                  </div>
                  <div id="table_div" class="col-md-7" style="width:100%"></div>

            </div>
         </div>
     </div>
</div>

</div>
            <div class="search_disclaim" >
            <p><strong>Disclaimer: </strong>Not every combination of searcheable objects will return meaningful results.</p>
            </div>
</div>

 
        </div>
    </div>


<!--*************
SCRIPTS
**************-->    
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


<!-- SCRIPT FOR THE POPUP FRAME OF SEARCH DETAILS -->
<script type="text/javascript">

$("#target").submit(function(event) {
  
  cuteLittleWindow = window.open("home", "littleWindow", "location=no,width=320,height=200"); 
  event.preventDefault();
});
    // GET DETAILS OF A CASE
      $(".details").on("click", function() {
          // location.href="http://www.google.com";

      });

/*
 * SimpleModal 1.4.4 - jQuery Plugin
 * http://simplemodal.com/
 * Copyright (c) 2013 Eric Martin
 * Licensed under MIT and GPL
 * Date: Sun, Jan 20 2013 15:58:56 -0800
 */
(function(b){"function"===typeof define&&define.amd?define(["jquery"],b):b(jQuery)})(function(b){var j=[],n=b(document),k=navigator.userAgent.toLowerCase(),l=b(window),g=[],o=null,p=/msie/.test(k)&&!/opera/.test(k),q=/opera/.test(k),m,r;m=p&&/msie 6./.test(k)&&"object"!==typeof window.XMLHttpRequest;r=p&&/msie 7.0/.test(k);b.modal=function(a,h){return b.modal.impl.init(a,h)};b.modal.close=function(){b.modal.impl.close()};b.modal.focus=function(a){b.modal.impl.focus(a)};b.modal.setContainerDimensions=
function(){b.modal.impl.setContainerDimensions()};b.modal.setPosition=function(){b.modal.impl.setPosition()};b.modal.update=function(a,h){b.modal.impl.update(a,h)};b.fn.modal=function(a){return b.modal.impl.init(this,a)};b.modal.defaults={appendTo:"body",focus:!0,opacity:50,overlayId:"simplemodal-overlay",overlayCss:{},containerId:"simplemodal-container",containerCss:{},dataId:"simplemodal-data",dataCss:{},minHeight:null,minWidth:null,maxHeight:null,maxWidth:null,autoResize:!1,autoPosition:!0,zIndex:1E3,
close:!0,closeHTML:'<a class="modalCloseImg" title="Close"></a>',closeClass:"simplemodal-close",escClose:!0,overlayClose:1,fixed:!0,position:null,persist:!1,modal:!0,onOpen:null,onShow:null,onClose:null};b.modal.impl={d:{},init:function(a,h){if(this.d.data)return!1;o=p&&!b.support.boxModel;this.o=b.extend({},b.modal.defaults,h);this.zIndex=this.o.zIndex;this.occb=!1;if("object"===typeof a){if(a=a instanceof b?a:b(a),this.d.placeholder=!1,0<a.parent().parent().size()&&(a.before(b("<span></span>").attr("id",
"simplemodal-placeholder").css({display:"none"})),this.d.placeholder=!0,this.display=a.css("display"),!this.o.persist))this.d.orig=a.clone(!0)}else if("string"===typeof a||"number"===typeof a)a=b("<div></div>").html(a);else return alert("SimpleModal Error: Unsupported data type: "+typeof a),this;this.create(a);this.open();b.isFunction(this.o.onShow)&&this.o.onShow.apply(this,[this.d]);return this},create:function(a){this.getDimensions();if(this.o.modal&&m)this.d.iframe=b('<iframe src="javascript:false;"></iframe>').css(b.extend(this.o.iframeCss,
{display:"none",opacity:0,position:"fixed",height:g[0],width:g[1],zIndex:this.o.zIndex,top:0,left:0})).appendTo(this.o.appendTo);this.d.overlay=b("<div></div>").attr("id",this.o.overlayId).addClass("simplemodal-overlay").css(b.extend(this.o.overlayCss,{display:"none",opacity:this.o.opacity/100,height:this.o.modal?j[0]:0,width:this.o.modal?j[1]:0,position:"fixed",left:0,top:0,zIndex:this.o.zIndex+1})).appendTo(this.o.appendTo);this.d.container=b("<div></div>").attr("id",this.o.containerId).addClass("simplemodal-container").css(b.extend({position:this.o.fixed?
"fixed":"absolute"},this.o.containerCss,{display:"none",zIndex:this.o.zIndex+2})).append(this.o.close&&this.o.closeHTML?b(this.o.closeHTML).addClass(this.o.closeClass):"").appendTo(this.o.appendTo);this.d.wrap=b("<div></div>").attr("tabIndex",-1).addClass("simplemodal-wrap").css({height:"100%",outline:0,width:"100%"}).appendTo(this.d.container);this.d.data=a.attr("id",a.attr("id")||this.o.dataId).addClass("simplemodal-data").css(b.extend(this.o.dataCss,{display:"none"})).appendTo("body");this.setContainerDimensions();
this.d.data.appendTo(this.d.wrap);(m||o)&&this.fixIE()},bindEvents:function(){var a=this;b("."+a.o.closeClass).bind("click.simplemodal",function(b){b.preventDefault();a.close()});a.o.modal&&a.o.close&&a.o.overlayClose&&a.d.overlay.bind("click.simplemodal",function(b){b.preventDefault();a.close()});n.bind("keydown.simplemodal",function(b){a.o.modal&&9===b.keyCode?a.watchTab(b):a.o.close&&a.o.escClose&&27===b.keyCode&&(b.preventDefault(),a.close())});l.bind("resize.simplemodal orientationchange.simplemodal",
function(){a.getDimensions();a.o.autoResize?a.setContainerDimensions():a.o.autoPosition&&a.setPosition();m||o?a.fixIE():a.o.modal&&(a.d.iframe&&a.d.iframe.css({height:g[0],width:g[1]}),a.d.overlay.css({height:j[0],width:j[1]}))})},unbindEvents:function(){b("."+this.o.closeClass).unbind("click.simplemodal");n.unbind("keydown.simplemodal");l.unbind(".simplemodal");this.d.overlay.unbind("click.simplemodal")},fixIE:function(){var a=this.o.position;b.each([this.d.iframe||null,!this.o.modal?null:this.d.overlay,
"fixed"===this.d.container.css("position")?this.d.container:null],function(b,e){if(e){var f=e[0].style;f.position="absolute";if(2>b)f.removeExpression("height"),f.removeExpression("width"),f.setExpression("height",'document.body.scrollHeight > document.body.clientHeight ? document.body.scrollHeight : document.body.clientHeight + "px"'),f.setExpression("width",'document.body.scrollWidth > document.body.clientWidth ? document.body.scrollWidth : document.body.clientWidth + "px"');else{var c,d;a&&a.constructor===
Array?(c=a[0]?"number"===typeof a[0]?a[0].toString():a[0].replace(/px/,""):e.css("top").replace(/px/,""),c=-1===c.indexOf("%")?c+' + (t = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"':parseInt(c.replace(/%/,""))+' * ((document.documentElement.clientHeight || document.body.clientHeight) / 100) + (t = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"',a[1]&&(d="number"===typeof a[1]?
a[1].toString():a[1].replace(/px/,""),d=-1===d.indexOf("%")?d+' + (t = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft) + "px"':parseInt(d.replace(/%/,""))+' * ((document.documentElement.clientWidth || document.body.clientWidth) / 100) + (t = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft) + "px"')):(c='(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (t = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"',
d='(document.documentElement.clientWidth || document.body.clientWidth) / 2 - (this.offsetWidth / 2) + (t = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft) + "px"');f.removeExpression("top");f.removeExpression("left");f.setExpression("top",c);f.setExpression("left",d)}}})},focus:function(a){var h=this,a=a&&-1!==b.inArray(a,["first","last"])?a:"first",e=b(":input:enabled:visible:"+a,h.d.wrap);setTimeout(function(){0<e.length?e.focus():h.d.wrap.focus()},
10)},getDimensions:function(){var a="undefined"===typeof window.innerHeight?l.height():window.innerHeight;j=[n.height(),n.width()];g=[a,l.width()]},getVal:function(a,b){return a?"number"===typeof a?a:"auto"===a?0:0<a.indexOf("%")?parseInt(a.replace(/%/,""))/100*("h"===b?g[0]:g[1]):parseInt(a.replace(/px/,"")):null},update:function(a,b){if(!this.d.data)return!1;this.d.origHeight=this.getVal(a,"h");this.d.origWidth=this.getVal(b,"w");this.d.data.hide();a&&this.d.container.css("height",a);b&&this.d.container.css("width",
b);this.setContainerDimensions();this.d.data.show();this.o.focus&&this.focus();this.unbindEvents();this.bindEvents()},setContainerDimensions:function(){var a=m||r,b=this.d.origHeight?this.d.origHeight:q?this.d.container.height():this.getVal(a?this.d.container[0].currentStyle.height:this.d.container.css("height"),"h"),a=this.d.origWidth?this.d.origWidth:q?this.d.container.width():this.getVal(a?this.d.container[0].currentStyle.width:this.d.container.css("width"),"w"),e=this.d.data.outerHeight(!0),f=
this.d.data.outerWidth(!0);this.d.origHeight=this.d.origHeight||b;this.d.origWidth=this.d.origWidth||a;var c=this.o.maxHeight?this.getVal(this.o.maxHeight,"h"):null,d=this.o.maxWidth?this.getVal(this.o.maxWidth,"w"):null,c=c&&c<g[0]?c:g[0],d=d&&d<g[1]?d:g[1],i=this.o.minHeight?this.getVal(this.o.minHeight,"h"):"auto",b=b?this.o.autoResize&&b>c?c:b<i?i:b:e?e>c?c:this.o.minHeight&&"auto"!==i&&e<i?i:e:i,c=this.o.minWidth?this.getVal(this.o.minWidth,"w"):"auto",a=a?this.o.autoResize&&a>d?d:a<c?c:a:f?
f>d?d:this.o.minWidth&&"auto"!==c&&f<c?c:f:c;this.d.container.css({height:b,width:a});this.d.wrap.css({overflow:e>b||f>a?"auto":"visible"});this.o.autoPosition&&this.setPosition()},setPosition:function(){var a,b;a=g[0]/2-this.d.container.outerHeight(!0)/2;b=g[1]/2-this.d.container.outerWidth(!0)/2;var e="fixed"!==this.d.container.css("position")?l.scrollTop():0;this.o.position&&"[object Array]"===Object.prototype.toString.call(this.o.position)?(a=e+(this.o.position[0]||a),b=this.o.position[1]||b):
a=e+a;this.d.container.css({left:b,top:a})},watchTab:function(a){if(0<b(a.target).parents(".simplemodal-container").length){if(this.inputs=b(":input:enabled:visible:first, :input:enabled:visible:last",this.d.data[0]),!a.shiftKey&&a.target===this.inputs[this.inputs.length-1]||a.shiftKey&&a.target===this.inputs[0]||0===this.inputs.length)a.preventDefault(),this.focus(a.shiftKey?"last":"first")}else a.preventDefault(),this.focus()},open:function(){this.d.iframe&&this.d.iframe.show();b.isFunction(this.o.onOpen)?
this.o.onOpen.apply(this,[this.d]):(this.d.overlay.show(),this.d.container.show(),this.d.data.show());this.o.focus&&this.focus();this.bindEvents()},close:function(){if(!this.d.data)return!1;this.unbindEvents();if(b.isFunction(this.o.onClose)&&!this.occb)this.occb=!0,this.o.onClose.apply(this,[this.d]);else{if(this.d.placeholder){var a=b("#simplemodal-placeholder");this.o.persist?a.replaceWith(this.d.data.removeClass("simplemodal-data").css("display",this.display)):(this.d.data.hide().remove(),a.replaceWith(this.d.orig))}else this.d.data.hide().remove();
this.d.container.hide().remove();this.d.overlay.hide();this.d.iframe&&this.d.iframe.hide().remove();this.d.overlay.remove();this.d={}}}}});

</script>

<!-- CSS for table -->
<style>
.search_table {
  width: 100%;
}

.st_header {
  display: flex;
  font-weight: bold;
  text-align: center;
}

.st_row {
  display: flex;
}

.st_cell {
  flex: 1 0 auto;
}
</style>

<!-- Table Script to display searched values -->
<script type="text/javascript">
            google.load("visualization", "1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Case Name');
        data.addColumn('string', 'Case Number');
        data.addColumn('number', 'Year');
        data.addColumn('string', 'Type of Case');
        data.addColumn('number', '# of Defendants');
        <?php
          if (isset($cases)) {
            foreach ($cases as $case) {
              $type = '';
              if ($case[3] == '1') {
                $type .= 'L';
              }
              if ($case[4] == '1') {
                $type .= 'A';
              }
              if ($case[5] == '1') {
                $type .= 'M';
              }
              echo 'data.addRow(["' . $case[0] . '", "' . $case[1] . '", {v: ' . $case[2] . '}, "' . $type . '", {v: '. $case[6] .'}]);'; 
            }
          }
        ?>

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: false});

        google.visualization.events.addListener(table, 'select', function () {
          console.log(table.getSelection());
          var i = table.getSelection()[0].row;
          <?php
            if (isset($cases)) {
              $jsarr = json_encode($cases);
              echo 'var cases = ' . $jsarr . ';';
            } else {
              echo 'var cases = [];';
            }
          ?>
          if (cases.length > 0) {
            var content = '<div><h3>Case Details</h3><br>' +
                          '<div class="search_table">' +
                          '<div class="st_header"><div class="st_cell">Case Name</div><div class="st_cell">Case Number</div><div class="st_cell"># of Defendants</div><div class="st_cell">State</div><div class="st_cell">Year</div></div>' +
                          '<div class="st_row"><div class="st_cell">' + cases[i][0] + '</div>' +
                          '<div class="st_cell">' + cases[i][1] + '</div>' +
                          '<div class="st_cell">' + cases[i][6] + '</div>' +
                          '<div class="st_cell">' + cases[i][7] + '</div>' +
                          '<div class="st_cell">' + cases[i][2] + '</div>' +
                          '</div></div></div><br/>';

            content = content + '<div><h3>Defendant Details</h3><br/>';
            content = content + 
                        '<div class="search_table">' +
                        '<div class="st_header"><div class="st_cell">Name</div><div class="st_cell">Alias</div><div class="st_cell">Gender</div><div class="st_cell">Race</div><div class="st_cell">Birthdate</div></div>';
            for (var j = 0; j < cases[i][16].length; j++) {
              content = content + 
                        '<div class="st_row"><div class="st_cell">' + cases[i][16][j][0] + ', ' + cases[i][16][j][1] + '</div>' +
                        '<div class="st_cell">' + cases[i][16][j][2] + '</div>' +
                        '<div class="st_cell">' + cases[i][16][j][3] + '</div>' +
                        '<div class="st_cell">' + cases[i][16][j][4] + '</div>' +
                        '<div class="st_cell">' + cases[i][16][j][5] + '</div>';
              if (cases[i][16][j][7].length > 0) {
                content = content + 
                          '<br/><div class="search_table"><div class="st_header">' +
                          '<div class="st_cell">Charge Date</div>' +
                          '<div class="st_cell">Arrest Date</div>' +
                          '<div class="st_cell">Detained</div>' +
                          '<div class="st_cell">Bail Type</div>' +
                          '<div class="st_cell">Bail Amount</div>' +
                          '<div class="st_cell">Role</div>' +
                          '<div class="st_cell">Felonies Charged</div>' +
                          '<div class="st_cell">Felonies Sentenced</div>' +
                          '<div class="st_cell">Date Terminated</div>' +
                          '<div class="st_cell">Sentence Date</div>' +
                          '<div class="st_cell"># Months Sentenced</div>' +
                          '<div class="st_cell">Restitution</div>' +
                          '<div class="st_cell">Asset Forfeiture?</div>' +
                          '<div class="st_cell">Appeal?</div>' +
                          '<div class="st_cell">Supervized Release?</div>' +
                          '<div class="st_cell"># Months Probation</div></div>' +
                          '<div class="st_row"><div class="st_cell">' + cases[i][16][j][7][0] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][1] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][2] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][3] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][4] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][5] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][6] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][7] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][8] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][9] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][10] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][11] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][12] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][13] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][14] + '</div>' +
                          '<div class="st_cell">' + cases[i][16][j][7][15] + '</div></div></div>';
              }
            }
            content = content + '</div></div>';
          }
          $.modal(content);
        });
    }

</script>

<!-- Auto Complete Script -->
<script>
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $( "#DataInProgressCaseName" ) //Case Name Field
      .autocomplete({
        source: "/JudgeFrog/jdgfrog/search.php?column=CaseNam" ,
        minLength: 1
      });
    $( "#DataInProgressCaseNumber" ) //Case Number Field
      .autocomplete({
        source: "/JudgeFrog/jdgfrog/search.php?column=CaseNum" ,
        minLength: 1
      });
    $( "#DataInProgressDefendantName" ) //Def Name Field
      .autocomplete({
        source: "/JudgeFrog/jdgfrog/search.php?column=DefFirst,DefLast" ,
        minLength: 1
      });
    $( "#DataInProgressJudgeName" ) //Judge Name Field
      .autocomplete({
        source: "/JudgeFrog/jdgfrog/search.php?column=JudgeName" ,
        minLength: 1
      });
    $( "#DataInProgressOcgName" ) //Ocg Name Field
      .autocomplete({
        source: "/JudgeFrog/jdgfrog/search.php?column=OCName1" ,
        minLength: 1
      });
  });
  </script>
