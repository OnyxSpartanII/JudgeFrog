$(function () {

    //Case Sliders
      $("#numbDefSlide").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });
    //Denfendant Sliders
      $("#yearBirthDefendant").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 1900,
            max: 2020,
            from: 1970,
            to: 2002,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });  
    //Judge Sliders
      $("#yearAppointJudge").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 1900,
            max: 2020,
            from: 1970,
            to: 2002,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
    //Victim Sliders
      $("#totalSlide").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });
        $("#minorSlide").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });
        $("#foreignerSlide").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });
        $("#femaleSlide").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });
    //Arrest Details Sliders
      $("#dateArrestAD").ionRangeSlider({ /* Do we want just year or date */

             min: +moment().subtract(1, "years").format("X"),
             max: +moment().format("X"),
              from: +moment().subtract(6, "months").format("X"),
              prettify: function (num) {
        return moment(num, "X").format("LL");
      } /*
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true */
        }); 
      $("#bailAmountArrest").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 1000000,
            from: 250000,
            to: 750000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        }); 
    //Charge Details Sliders
      $("#chargeDate").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#totalCharges").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#countsCharge").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#countsNolleProssed").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#pleaDismiss").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#pleaGuilty").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#trialGuilty").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#trialNotGuilty").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#finesCharge").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            grid: true
        }); 
      $("#sentenceCharge").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
      $("#probationCharge").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });

    //Sentencing Details Sliders
      $("#totalNumFelonySentence").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
            }); 
      $("#dateTermSentenced").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
            }); 
      $("#totalMonthsSentenced").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
            }); 
      $("#amountRestitutionSent").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
            }); 
      $("#monthsSuperReleaseSentence").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
            }); 
      $("#monthsProbationSentence").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        }); 
});
