(function(obj) {
    'use strict';
    obj(window)['on']('load', function() {
        obj('[data-loader="circle-side"]')['fadeOut']();
        obj('#preloader')['delay'](350)['fadeOut']('slow');
        obj('body')['delay'](350)['css']({
            'overflow': 'visible'
        })
    });
    obj('form#wrapped')['on']('submit', function() {
        var formwrapper = obj('form#wrapped');
        formwrapper['validate']();
        if (formwrapper['valid']()) {
            obj('#loader_form')['fadeIn']()
        }
    });
    obj('.container_radio.version_2 input[type="radio"], .container_check.version_2 input[type="checkbox"]')['click'](function() {
        obj(this)['parent']()['addClass']('active')['siblings']('label')['removeClass']('active')
    });
    obj('a[href^="#"].mobile_btn')['on']('click', function(formaction) {
        formaction['preventDefault']();
        var objVal = this['hash'];
        var objVal2 = obj(objVal);
        obj('html, body')['stop']()['animate']({
            'scrollTop': objVal2['offset']()['top']
        }, 400, 'swing', function() {
            window['location']['hash'] = objVal
        })
    });
    var _0xfb19x6 = new FloatLabels('form', {
        style: 1
    });

    function loadToggle(formaction) {
        obj(formaction['target'])['prev']('.card-header')['find']('i.indicator')['toggleClass']('ti-minus ti-plus')
    }
    obj('.accordion_2')['on']('hidden.bs.collapse shown.bs.collapse', loadToggle);

    function _0xfb19x8(formaction) {
        obj(formaction['target'])['prev']('.panel-heading')['find']('.indicator')['toggleClass']('ti-minus ti-plus')
    }
    obj('#faq_box a[href^="#"]')['on']('click', function() {
        if (location['pathname']['replace'](/^\//, '') == this['pathname']['replace'](/^\//, '') || location['hostname'] == this['hostname']) {
            var objVal = obj(this['hash']);
            objVal = objVal['length'] ? objVal : obj('[name=' + this['hash']['slice'](1) + ']');
            if (objVal['length']) {
                obj('html,body')['animate']({
                    scrollTop: objVal['offset']()['top'] - 195
                }, 800);
                return false
            }
        }
    });
    obj('ul#cat_nav li a')['on']('click', function() {
        obj('ul#cat_nav li a.active')['removeClass']('active');
        obj(this)['addClass']('active')
    });
    var objNav = obj('.cd-overlay-nav'),
        objCont = obj('.cd-overlay-content'),
        objPryNav = obj('.cd-primary-nav'),
        objnavTrigger = obj('.cd-nav-trigger');
    animateFrameSet();
    obj(window)['on']('resize', function() {
        window['requestAnimationFrame'](animateFrameSet)
    });
    objnavTrigger['on']('click', function() {
        if (!objnavTrigger['hasClass']('close-nav')) {
            objnavTrigger['addClass']('close-nav');
            objNav['children']('span')['velocity']({
                translateZ: 0,
                scaleX: 1,
                scaleY: 1
            }, 500, 'easeInCubic', function() {
                objPryNav['addClass']('fade-in')
            })
        } else {
            objnavTrigger['removeClass']('close-nav');
            objCont['children']('span')['velocity']({
                translateZ: 0,
                scaleX: 1,
                scaleY: 1
            }, 500, 'easeInCubic', function() {
                objPryNav['removeClass']('fade-in');
                objNav['children']('span')['velocity']({
                    translateZ: 0,
                    scaleX: 0,
                    scaleY: 0
                }, 0);
                objCont['addClass']('is-hidden')['one']('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                    objCont['children']('span')['velocity']({
                        translateZ: 0,
                        scaleX: 0,
                        scaleY: 0
                    }, 0, function() {
                        objCont['removeClass']('is-hidden')
                    })
                });
                if (obj('html')['hasClass']('no-csstransitions')) {
                    objCont['children']('span')['velocity']({
                        translateZ: 0,
                        scaleX: 0,
                        scaleY: 0
                    }, 0, function() {
                        objCont['removeClass']('is-hidden')
                    })
                }
            })
        }
    });

    function animateFrameSet() {
        var getWindSize = (Math['sqrt'](Math['pow'](obj(window)['height'](), 2) + Math['pow'](obj(window)['width'](), 2)) * 2);
        objNav['children']('span')['velocity']({
            scaleX: 0,
            scaleY: 0,
            translateZ: 0
        }, 50)['velocity']({
            height: getWindSize + 'px',
            width: getWindSize + 'px',
            top: -(getWindSize / 2) + 'px',
            left: -(getWindSize / 2) + 'px'
        }, 0);
        objCont['children']('span')['velocity']({
            scaleX: 0,
            scaleY: 0,
            translateZ: 0
        }, 50)['velocity']({
            height: getWindSize + 'px',
            width: getWindSize + 'px',
            top: -(getWindSize / 2) + 'px',
            left: -(getWindSize / 2) + 'px'
        }, 0)
    }
})(window['jQuery'])