var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

var admin = $('#admin');
var selection = $('#selection');
var caseInfoFS = $('#caseInfoFS');
var judge = $('#newJudgeFS');
var traffInfo = $('#traffInfo');
var defendant = $('#defendant');
var acd = $('#acd'); 
var chargeScreen = $('#chargeScreen');
var aggSentence = $('#aggSentence');
var chargeScreen = $('#chargeScreen');
var ocgScreen = $('#ocgScreen'); 
var reviewScreen = $('#reviewScreen');

/*
--------- Next Functions ------------
*/

//Takes user to selection screen
$(".toSelection").click(function(){
  admin.hide();
  selection.show();
});

$(".toCaseInfoFS").click(function(){
  selection.hide();
  caseInfoFS.show();
});

$(".toNewJudge").click(function(){
  caseInfoFS.hide();
  judge.show();
});
//ADD Judge - takes user back to caseInfo when judge is added 
$(".toCaseInfoFSAdd").click(function(){
  judge.hide();
  caseInfoFS.show();
});
//Cancel Judge - takes user back to caseInfo when judge screen canceled
//Clear fields in this function 
$(".toCaseInfoFSCancel").click(function(){
  judge.hide();
  caseInfoFS.show();
});

$(".toTraffInfo").click(function(){
  caseInfoFS.hide();
  traffInfo.show();
});

$(".toDefendant").click(function(){
  traffInfo.hide();
  defendant.show();
});

$(".toAcd").click(function(){
  defendant.hide();
  acd.show();
});

$(".toChargeScreen").click(function(){
  acd.hide();
  chargeScreen.show();
});

$(".toAggSentence").click(function(){
  chargeScreen.hide();
  aggSentence.show();
});

$(".toOCG").click(function(){
  aggSentence.hide();
  ocgScreen.show();
});

$(".toReview").click(function(){
  ocgScreen.hide();
  reviewScreen.show();
});
$(".toNextDefendant").click(function(){
  ocgScreen.hide();
  defendant.show();
});

/*
--------- Back Functions ------------
*/
$(".backSelection").click(function(){
  caseInfoFS.hide();
  selection.show();
});
$(".backCaseInfo").click(function(){
  traffInfo.hide();
  caseInfoFS.show();
});
$(".backTraffInfo").click(function(){
  defendant.hide();
  traffInfo.show();
});
$(".backDefendant").click(function(){
  acd.hide();
  defendant.show();
});
$(".backACD").click(function(){
  chargeScreen.hide();
  acd.show();
});
$(".backChargeScreen").click(function(){
  aggSentence.hide();
  chargeScreen.show();
});
$(".backAggSentence").click(function(){
  ocgScreen.hide();
  aggSentence.show();
});

/*
JQuery Code for fancy transitions between windows. 
Became to buggy so used above code
*/
// $(".nextDefendant").click(function(){
//   if(animating) return false;
//   animating = true;

//   current_fs = $(this).parent();
//   next_fs = $(this).parent().next(); 

//   defendant.show();
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0} , {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'transform': 'scale('+scale+')'});
//       //next_fs.css({'left': left, 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });

  


// });
// $(".judgeAddedBack").click(function(){
//   if(animating) return false;
//   animating = true;

//   current_fs = $(this).parent();
//   next_fs = $(this).parent().prev();
  
//   //activate next step on progressbar using the index of next_fs
//   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
//   //show the next fieldset
//   caseInfoFS.show();

//   //next_fs.show(); 

//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'transform': 'scale('+scale+')'});
//       caseInfoFS.css({'left': left, 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       judge.hide();
//       animating = false;
//     }, 
//     // this comes from the custom easing plugin
//     // easing: 'easeInOutBack'


//   });
// });

// /*
// After case info is completed. When user clicks next 
// this will skip the judge window. 
// */
// $(".afterCaseInfo").click(function(){
//   if(animating) return false;
//   animating = true;

//   current_fs = $(this).parent();
//   next_fs = $(this).parent().next().next();
  
//   //activate next step on progressbar using the index of next_fs
//   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
//   //show the next fieldset
//   next_fs.show();

//   //next_fs.show(); 

// current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'transform': 'scale('+scale+')'});
//       next_fs.css({'left': left, 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'


//   });
  

// });
// /*
// Displays the judge window when the add judge button is clicked
// */
// $(".addJudge").click(function(){
//   if(animating) return false;
//   animating = true;

//   current_fs = $(this).parent();
//   next_fs = $(this).parent().next(); 

//   judge.show();

//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'transform': 'scale('+scale+')'});
//       next_fs.css({'left': left, 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });

// });

// /*
// Goes back to case information and skips judge window
// */
// $(".backToCaseInfo").click(function(){
//   if(animating) return false;
//   animating = true;
  
//   current_fs = $(this).parent();
//   previous_fs = $(this).parent().prev();
  
//   //de-activate current step on progressbar
//   $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
//   //show the previous fieldset
//   previous_fs.show(); 
//   current_fs.hide();
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale previous_fs from 80% to 100%
//       scale = 0.8 + (1 - now) * 0.2;
//       //2. take current_fs to the right(50%) - from 0%
//       left = ((1-now) * 50)+"%";
//       //3. increase opacity of previous_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'left': left});
//       previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });
//   current_fs = $(this).parent();
//   previous_fs = $(this).parent().prev().prev();
//   previous_fs.show(); 
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale previous_fs from 80% to 100%
//       scale = 0.8 + (1 - now) * 0.2;
//       //2. take current_fs to the right(50%) - from 0%
//       left = ((1-now) * 50)+"%";
//       //3. increase opacity of previous_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'left': left});
//       previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });
// });

// $(".next").click(function(){
//   if(animating) return false;
//   animating = true;
  
//   current_fs = $(this).parent();
//   next_fs = $(this).parent().next();
  
//   //activate next step on progressbar using the index of next_fs
//   $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
//   //show the next fieldset
//   next_fs.show(); 
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale current_fs down to 80%
//       scale = 1 - (1 - now) * 0.2;
//       //2. bring next_fs from the right(50%)
//       left = (now * 50)+"%";
//       //3. increase opacity of next_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'transform': 'scale('+scale+')'});
//       next_fs.css({'left': left, 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });
// });

// $(".previous").click(function(){
//   if(animating) return false;
//   animating = true;
  
//   current_fs = $(this).parent();
//   previous_fs = $(this).parent().prev();
  
//   //de-activate current step on progressbar
//   $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
//   //show the previous fieldset
//   previous_fs.show(); 
//   //hide the current fieldset with style
//   current_fs.animate({opacity: 0}, {
//     step: function(now, mx) {
//       //as the opacity of current_fs reduces to 0 - stored in "now"
//       //1. scale previous_fs from 80% to 100%
//       scale = 0.8 + (1 - now) * 0.2;
//       //2. take current_fs to the right(50%) - from 0%
//       left = ((1-now) * 50)+"%";
//       //3. increase opacity of previous_fs to 1 as it moves in
//       opacity = 1 - now;
//       current_fs.css({'left': left});
//       previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
//     }, 
//     duration: 800, 
//     complete: function(){
//       current_fs.hide();
//       animating = false;
//     }, 
//     //this comes from the custom easing plugin
//     easing: 'easeInOutBack'
//   });
// });

// $(".submit").click(function(){
//   return false;
// })
// $.fn.redraw = function(){
//   $(this).each(function(){
//     var redraw = this.offsetHeight;
//   });
// };