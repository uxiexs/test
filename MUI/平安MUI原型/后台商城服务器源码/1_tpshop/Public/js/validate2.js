/**
 * Created by admin on 2015/11/28.
 * JS常用表单验证函数
 */

/**
 * 验证是否是数字
 */
function is_number(num){
    numericRegex = /^[0-9]+$/;
    return (numericRegex.test(num));
}

/**
 * 验证是否邮箱
 */
function is_email(email){
    emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    return (emailRegex.test(email));

}

/**
 * 验证是否包含数字，字母
 */
function is_num_and_alpha(text){
    alphaNumericRegex = /^[a-z0-9]+$/i;
    return (alphaNumericRegex.test(text));
}

/**
 * 验证是否URL
 */

function is_url(text){
    urlRegex = /^((http|https):\/\/(\w+:{0,1}\w*@)?(\S+)|)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/;
    return (urlRegex.test(text));
}

/**
 * 验证是否手机
 */
function is_mobile(text){

    var isMobile=/^(?:13\d|15\d|18\d|17\d|14\d)\d{5}(\d{3}|\*{3})$/; //手机号码验证规则
     return (isMobile.test(text));


}