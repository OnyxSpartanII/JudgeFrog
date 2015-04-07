var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

var caseInfoFS = $('#caseInfoFS');
var caseSum = $('#caseSumFS');
var judge = $('#newJudgeFS');
var traffInfo = $('#traffInfo');
var defendant = $('#defendant');
var acd = $('#acd'); 
var chargeScreen = $('#chargeScreen');
var aggSentence = $('#aggSentence');
var chargeScreen = $('#chargeScreen');
var ocgScreen = $('#ocgScreen'); 
var reviewScreen = $('#reviewScreen');

caseSum.hide();

/*
--------- Next Functions ------------
*/

//Takes user to selection screen
$(".toCaseSum").click(function(){
  alert ("Working");
  caseInfoFS.hide('slow');
  caseSum.fadeIn('slow');
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
  selection.fadeIn('slow');
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
