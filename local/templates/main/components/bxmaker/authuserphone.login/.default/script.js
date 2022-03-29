/**
 * ����� ��� ������ ���������� ����������� �����������
 * @param b
 * @param $
 *
 * @returns {boolean}
 *
 * @emits bxmaker.authuserphone.ajax {request, result, params} - ������� ���������� ����� ��������� ������ �� ajax ������ (�����������, ����������� � ��)
 *
 * @constructor
 */
function BxmakerAuthUserphone(b, $) {
    if (b == undefined || b.hasClass('js_init_complete')) {
        return false;
    }

    var self = this, box = b, msgBox = box.find('.msg');
    var control = false;
    var rand = box.attr('data-rand');
    var paramsData = (!!window.BxmakerAuthUserPhoneLoginData && !!window.BxmakerAuthUserPhoneLoginData[rand] ? window.BxmakerAuthUserPhoneLoginData[rand] : false);

    // console.log('constructor',rand , window.BxmakerAuthUserPhoneLoginData);

    if (!paramsData) {
        return false;
    }

    if (!!BX.UserConsent) {
        control = BX.UserConsent.load(BX(box.attr('id')));

        BX.addCustomEvent(
            control,
            BX.UserConsent.events.save,
            function (data) {

                self.save({
                    'consent': 1,
                    'consent_id': data.id,
                    'consent_sec': data.sec,
                    'consent_url': data.url
                }, box.find(".cbaup_btn"));
            }
        );
    }

    box.addClass('js_init_complete');

    self.getMessage = function (name) {
        return ((!!paramsData.messages && !!paramsData.messages[name]) ? paramsData.messages[name] : '');
    };

    // show errors and messages
    self.showMsg = function (msg, error) {
        var msg = msg || null,
            error = error || false;

        if (!self.hideMsg()) {
            return false;
        }
        if (msg) {
            if (error) msgBox.addClass('error').html(msg);
            else msgBox.addClass('success').html(msg);
        }
    };

    self.hideMsg = function (r) {
        if (!!msgBox === false) return false;
        msgBox.removeClass('error success').empty();
        return true;
    };

    // ���������� �����
    self.showCaptcha = function (param) {
        var cb = box.find('.cbaup_row.captcha');

        param.captcha_sid = param.captcha_sid || '';
        param.captcha_src = param.captcha_src || '';

        if (!cb.find('input[name="captcha_sid"]').length) {
            var html = '<input type="hidden" name="captcha_sid" value="' + param.captcha_sid + '"/>' +
                '<img src="' + param.captcha_src + '" title="' + self.getMessage('UPDATE_CAPTCHA_IMAGE') + '" alt=""/>' +
                '<span class="btn_captcha_reload" title="' + self.getMessage('UPDATE_CAPTCHA_IMAGE') + '"></span>' +
                '<input type="text" name="captcha_word" class="captcha_word" placeholder="' + self.getMessage('INPUT_CAPTHCA') + '"/>';

            cb.append(html).fadeIn(300);
        } else {
            cb.find('input[name="captcha_sid"]').val(param.captcha_sid);
            cb.find('img').attr('src', param.captcha_src);
        }
    };

    //������� ����� � ������
    self.hideCaptcha = function () {
        box.find('.cbaup_row.captcha').empty();
    };

    self.showPasswordText = function () {
        var btn = box.find('.btn_show_password');
        if (!self.isShowPasswordText()) {
            btn.addClass('active').attr('title', btn.attr('data-title-hide'));
            btn.parent().find('input[name="password"]').prop('type', 'text');
        }
    };
    self.hidePasswordText = function () {
        var btn = box.find('.btn_show_password');
        if (self.isShowPasswordText()) {
            btn.removeClass('active').attr('title', btn.attr('data-title-show'));
            btn.parent().find('input[name="password"]').prop('type', 'password');
        }
    };
    self.isShowPasswordText = function () {
        return box.find('.btn_show_password').hasClass("active");
    };


    // �������� ������ - ���� ��� �����������
    self.save = function (data, btn) {
        var data = data || {};
        console.log('save');
        btn.addClass("preloader");

        data['parameters'] = paramsData['parameters'];
        data['template'] = paramsData['template'];
        data['siteId'] = paramsData['siteId'];
        data['sessid'] = BX.bitrix_sessid();

        data['method'] = (box.hasClass('register_show') ? 'register' : 'auth');
        data['phone'] = box.find('input[name="phone"]').val();
        data['email'] = box.find('input[name="email"]').val();
        data['login'] = box.find('input[name="login"]').val();
        data['password'] = box.find('input[name="password"]').val();
        data['remember'] = box.find('input[name="remember"]:checked').val();
        data['captcha_sid'] = box.find('input[name="captcha_sid"]').val();
        data['captcha_word'] = box.find('input[name="captcha_word"]').val();

        self.hideCaptcha();

        $.ajax({
            url: paramsData['ajaxUrl'],
            type: 'POST',
            dataType: 'json',
            data: data,
            error: function (r) {
                self.showMsg('Error connect to server!', true);
                btn.removeClass("preloader");
            },
            success: function (r) {
                console.log('response');
                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'params': paramsData,
                    'request': data,
                    'result': r,
                });

                btn.removeClass("preloader");

                if (!!r.response) {
                    self.showMsg(r.response.msg);
                    console.log('bxmaker.authuserphone success ', r);

                    setTimeout(function () {
                        if (!!r.response.redirect) {
                            location.href = r.response.redirect;
                        } else if (!!r.response.reload) {
                            location.reload();
                        }
                    }, 1);
                } else if (!!r.error) {

                    if (!!r.error && r.error.code == 'INVALID_SESSID' && r.error.more && r.error.more.sessid) {
                        BX.message({"bitrix_sessid": r.error.more.sessid});
                        return false;
                    }

                    self.showMsg(r.error.msg, true);

                    //captcha
                    if (!!r.error.more.captcha_sid) {
                        self.showCaptcha(r.error.more);
                    }

                    if (!!r.error.more.email_restore) {
                        var btn_send_code = box.find('.cbaup_btn_link');
                        if (btn_send_code.length && !box.find('.cbaup_btn_send_email').length) {
                            var btn_parent = btn_send_code.parent();
                            var btn_send_email = $('<div class="cbaup_row send_email"><span class="cbaup_btn_send_email" >' + self.getMessage('BTN_SEND_EMAIL') + '</span></div>');
                            btn_send_email.insertAfter(btn_parent);
                            //btn_parent.hide();
                        }
                    }
                }

                console.log('2222');
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'request': data,
                    'result': r,
                    'params': paramsData
                });


            }
        });
    };


    //registr
    // box.on("click", '.cbaup_btn_reg', function () {
    //     var btn = $(this);
    //     var phone = box.find('input[name="phone"]');
    //     var auth_title = box.find('.cbaup_title');
    //     var email_box = box.find('.cbaup_row.email_box');
    //     var login_box = box.find('.cbaup_row.login_box');
    //     var btn_inter = box.find('.btn_box .cbaup_btn');
    //     var pass_input = box.find('input[name="password"]');
    //
    //     if (!phone.length) {
    //         return false;
    //     }
    //
    //     phone.val('');
    //
    //     self.hideMsg();
    //
    //     if (box.hasClass('register_show')) {
    //         self.showMsg(null);
    //         box.removeClass('register_show bxmaker-authuserphone-login--register');
    //         btn.text(auth_title.attr('data-register-title'));
    //         auth_title.text(auth_title.attr('data-auth-title'));
    //         email_box.hide();
    //         login_box.hide();
    //         phone.attr('placeholder', phone.attr('data-auth-placeholder'));
    //         btn_inter.text(btn_inter.attr('data-auth-title'));
    //
    //         pass_input.attr('placeholder', pass_input.attr('data-auth'));
    //
    //         box.find('.cbaup_row--registration').hide();
    //     } else {
    //         self.showMsg(self.getMessage('REGISTER_INFO'));
    //         box.addClass('register_show bxmaker-authuserphone-login--register');
    //         btn.text(auth_title.attr('data-auth-title'));
    //         auth_title.text(auth_title.attr('data-register-title'));
    //         email_box.show();
    //         login_box.show();
    //         phone.attr('placeholder', phone.attr('data-reg-placeholder'));
    //         btn_inter.text(btn_inter.attr('data-reg-title'));
    //
    //         pass_input.attr('placeholder', pass_input.attr('data-reg'));
    //
    //         box.find('.cbaup_row--registration').show();
    //     }
    //
    //
    // });

    // btn show password
    box.on("click", '.btn_show_password', function () {
        if (self.isShowPasswordText()) {
            self.hidePasswordText();
        } else {
            self.showPasswordText();
        }
    });

    // btn enter
    box.find(".cbaup_btn").on("click", function () {
        var btn = $(this);
        var bRegister = false;

        if (btn.hasClass("preloader")) return false;

        self.hideMsg();

        if (box.hasClass('register_show') && box.attr('data-consent') == 'Y') {
            BX.onCustomEvent('bxmaker_authuserphone_registration', []);
        } else {
            self.save({}, btn);
        }
    });

    // btn send code
    box.on("click", '.cbaup_btn_link', function () {
        var btn = $(this);

        if (btn.hasClass('preloader') || btn.hasClass('timeout')) return false;
        btn.addClass('preloader');

        var data = {};
        data['parameters'] = paramsData['parameters'];
        data['template'] = paramsData['template'];
        data['siteId'] = paramsData['siteId'];
        data['sessid'] = BX.bitrix_sessid();

        data['method'] = 'sendCode';
        data['phone'] = box.find('input[name="phone"]').val();
        data['registration'] = (box.hasClass('register_show') ? 'Y' : 'N');

        //������ ��� ���� � �������, ����� ������������ ��� �� ��� �� iphone
        self.showPasswordText();
        box.find('input[name="password"]').val('').focus();

        data['captcha_sid'] = box.find('input[name="captcha_sid"]').val();
        data['captcha_word'] = box.find('input[name="captcha_word"]').val();

        self.hideCaptcha();

        self.hideMsg();

        $.ajax({
            url: paramsData['ajaxUrl'],
            type: 'POST',
            dataType: 'json',
            data: data,
            error: function (r) {
                self.showMsg('Error connect to server!', true);
                btn.removeClass("preloader");
            },
            success: function (r) {
                var timeout = 0;
                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'params': paramsData,
                    'request': data,
                    'result': r,
                });

                if (!!r.response) {
                    self.showMsg(r.response.msg);

                    $('.js-phone-masked2').parent().hide();
                    $('.codeLinkJs').parent().hide();
                    $('.auth-number__send span').html($('.js-phone-masked2').val());

                    $('.codeInputJs').show();
                    // $('.codeInputJs').focus();

                    $('.auth-inputs__input:first-child').focus();
                    $('.auth-inputs__input').on('keydown', function(e) {
                        let value = $(this).val();
                        let len = value.length;
                        let curTabIndex = parseInt($(this).attr('tabindex'));
                        let nextTabIndex = curTabIndex + 1;
                        let prevTabIndex = curTabIndex - 1;
                        if (len > 0) {
                            $(this).val(value.substr(0, 1));
                            $('[tabindex=' + nextTabIndex + ']').focus();
                        } else if (len == 0 && prevTabIndex !== 0) {
                            $('[tabindex=' + prevTabIndex + ']').focus();
                        }
                    });
                    $('.auth-inputs__input:last-child').on('keyup', function(e) {
                        if($(this).val() != '') {
                            $('.auth-inputs').addClass('done');
                            $('.cbaup_btn').click();
                        }
                    });

                    btn.removeClass("preloader");

                    if (r.response.length) {
                        box.find('input[name="password"]').attr('data-length', r.response.length);
                    }

                    if (!!r.response.time) {
                        timeout = (!!r.response.time ? r.response.time : 59);

                        // ���������
                        var smsInterval = setInterval(function () {
                            if (--timeout > 0) {
                                // btn.text(self.getMessage('BTN_SEND_CODE_TIMEOUT').replace(/#TIMEOUT#/, timeout));
                                $('.auth-time__text').text(self.getMessage('BTN_SEND_CODE_TIMEOUT').replace(/#TIMEOUT#/, timeout));
                            } else {
                                clearInterval(smsInterval);
                                // btn.text(self.getMessage('BTN_SEND_CODE'));
                                // btn.removeClass("timeout");
                                $('.auth-time__text').text('Отправить код ещё раз через');
                                $('.auth-time__text').removeClass("timeout");
                            }
                        }, 1000);

                        //����� ����������
                        btn.text(self.getMessage('BTN_SEND_CODE_TIMEOUT').replace(/#TIMEOUT#/, timeout)).addClass('timeout');
                    }
                } else if (!!r.error) {
                    btn.removeClass("preloader");

                    if (!!r.error && r.error.code == 'INVALID_SESSID' && r.error.more && r.error.more.sessid) {
                        BX.message({"bitrix_sessid": r.error.more.sessid});
                        return false;
                    }

                    self.showMsg(r.error.msg, true);

                    //captcha
                    if (!!r.error.more.captcha_sid) {
                        self.showCaptcha(r.error.more);
                    }

                    if (!!r.error.more && !!r.error.more.time) {

                        timeout = r.error.more.time;

                        var smsInterval = setInterval(function () {
                            if (--timeout > 0) {
                                btn.text(self.getMessage('BTN_SEND_CODE_TIMEOUT').replace(/#TIMEOUT#/, timeout));
                            } else {
                                clearInterval(smsInterval);
                                btn.text(self.getMessage('BTN_SEND_CODE'));
                                btn.removeClass("timeout");
                            }
                        }, 1000);

                        btn.text(self.getMessage('BTN_SEND_CODE_TIMEOUT').replace(/#TIMEOUT#/, timeout)).removeClass("preloader").addClass('timeout');
                    }
                } else {
                    btn.removeClass("preloader");
                }


            }
        })
    });

    // btn send emil
    box.on("click", '.cbaup_btn_send_email', function () {
        var btn = $(this);

        if (btn.hasClass('preloader')) return false;
        btn.addClass('preloader');

        self.hideMsg();

        var data = {
            method: 'sendEmail',
            phone: box.find('input[name="phone"]').val()
        };

        data['parameters'] = paramsData['parameters'];
        data['template'] = paramsData['template'];
        data['siteId'] = paramsData['siteId'];
        data['sessid'] = BX.bitrix_sessid();


        if (box.find('input[name="captcha_sid"]').length) {
            data['captcha_sid'] = box.find('input[name="captcha_sid"]').val();
            data['captcha_word'] = box.find('input[name="captcha_word"]').val();
        }

        $.ajax({
            url: paramsData['ajaxUrl'],
            type: 'POST',
            dataType: 'json',
            data: data,
            error: function (r) {
                self.showMsg('Error connect to server!', true);
                btn.removeClass("preloader");
            },
            success: function (r) {

                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'params': paramsData,
                    'request': data,
                    'result': r,
                });


                if (!!r.response) {
                    self.showMsg(r.response.msg);
                    btn.removeClass("preloader").hide();
                } else if (!!r.error) {
                    btn.removeClass("preloader");

                    if (!!r.error && r.error.code == 'INVALID_SESSID' && r.error.more && r.error.more.sessid) {
                        BX.message({"bitrix_sessid": r.error.more.sessid});
                        return false;
                    }

                    self.showMsg(r.error.msg, true);

                    //captcha
                    if (!!r.error.more.captcha_sid) {
                        self.showCaptcha(r.error.more);
                    }

                } else {
                    btn.removeClass("preloader");
                }

                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'request': data,
                    'result': r,
                    'params': paramsData
                });
            }
        })
    });

    // ���������� �����
    box.on("click", '.cbaup_row.captcha img, .cbaup_row.captcha span', function () {
        var b = box.find('.cbaup_row.captcha');

        if (b.hasClass("preloader")) return false;
        b.addClass("preloader");


        var data = {};
        data['parameters'] = paramsData['parameters'];
        data['template'] = paramsData['template'];
        data['siteId'] = paramsData['siteId'];
        data['sessid'] = BX.bitrix_sessid();
        data['method'] = 'getCaptcha';


        $.ajax({
            url: paramsData['ajaxUrl'],
            type: 'POST',
            dataType: 'json',
            data: data,
            error: function (r) {
                self.showMsg('Error connect to server!', true);
                b.removeClass("preloader");
            },
            success: function (r) {


                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'params': paramsData,
                    'request': data,
                    'result': r,
                });

                b.removeClass("preloader");

                if (!!r.response) {
                    self.showCaptcha(r.response);

                } else if (!!r.error) {
                    if (!!r.error && r.error.code == 'INVALID_SESSID' && r.error.more && r.error.more.sessid) {
                        BX.message({"bitrix_sessid": r.error.more.sessid});
                        return false;
                    }
                }

                // ������� ��������� ������ �� ajax ������
                $(document).trigger('bxmaker.authuserphone.ajax', {
                    'request': data,
                    'result': r,
                    'params': paramsData
                });

            }
        });
    });

    // �������� ��� ����� �� ������ enter
    box.on("keyup", "input", function (e) {
        if (e.keyCode == 13) {
            box.find(".cbaup_btn").click();
        }
    });

    box.find('input[name="password"]').on("keyup", function (e) {
        let input = $(this);
        if (input.attr('data-length') && +input.attr('data-length') > 0 && input.val().trim().length == +input.attr('data-length')) {
            box.find(".cbaup_btn").click();
        }
    });


    box.find('.btn_logout').attr('href', location.pathname + (location.search.length > 0 ? location.search + '&' : '?') + 'logout=Y');

    if (location.hash == "#registration") {
        box.find('.cbaup_btn_reg').click();
    }

}


// ������ --
if (!window.BxmakerAuthUserphoneLoginWorker) {
    function BxmakerAuthUserphoneLoginWorker() {

        if (!!window.jQuery == false) {
            console.log('bxmaker.authuserphone.login - need jQuery');
            return true;
        }

        window.$ = window.jQuery;

        jQuery(document).ready(function () {
            $('.c-bxmaker-authuserphone_login-default-box').each(function () {
                new BxmakerAuthUserphone(jQuery(this), jQuery);
            })
        });
    }
}

//������ ----
if (window.frameCacheVars !== undefined && !!window.frameCacheVars.AUTO_UPDATE) {
    BX.addCustomEvent("onFrameDataReceived", function (json) {
        setTimeout(function () {
            BxmakerAuthUserphoneLoginWorker();
        }, 200);
    });
    BX.addCustomEvent("onFrameDataRequestFail", function (json) {
        setTimeout(function () {
            BxmakerAuthUserphoneLoginWorker();
        }, 200);
    });
}
else {
    BX.ready(function () {
        setTimeout(function () {
            BxmakerAuthUserphoneLoginWorker();
        }, 200);
    });
}



