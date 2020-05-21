jQuery(function(objv) {
    'use strict';
    //objv('form#wrapped')['attr']('action', 'send_email_1.php');
    objv('#wizard_container')['wizard']({
        stepsWrapper: '#wrapped',
        submit: '.submit',
        unidirectional: false,
        beforeSelect: function(objSet, objsVal) {
            if (!objsVal['isMovingForward']) {
                return true
            };
            var wzVal = objv(this)['wizard']('state')['step']['find'](':input');
            return !wzVal['length'] || !!wzVal['valid']()
        }
    })['validate']({
        errorPlacement: function(objCHK, objCHK_Val) {
            if (objCHK_Val['is'](':radio') || objCHK_Val['is'](':checkbox')) {
                objCHK['insertBefore'](objCHK_Val['next']())
            } else {
                objCHK['insertAfter'](objCHK_Val)
            }
        }
    });
    objv('#progressbar')['progressbar']();
    objv('#wizard_container')['wizard']({
        afterSelect: function(objSet, objsVal) {
            objv('#progressbar')['progressbar']('value', objsVal['percentComplete']);
            objv('#location')['text']('' + objsVal['stepsComplete'] + ' of ' + objsVal['stepsPossible'] + ' completed')
        }
    })
});
$('#wizard_container')['wizard']({
    transitions: {
        branchtype: function(obj, optn) {
            var objval = obj['find'](':checked')['val']();
            if (!objval) {
                $('form')['valid']()
            };
            return objval
        }
    }
});

function getVals(field, fieldVal) {
    switch (fieldVal) {
        case 'name_field':
            var getVal = $(field)['val']();
            $('#name_field')['text'](getVal);
            break;
        case 'email_field':
            var getVal = $(field)['val']();
            $('#email_field')['text'](getVal);
            break
    }
}