
if (! ($.browser.msie && parseInt($.browser.version) <= 6) )  {
          $.ajax({
                url: 'http://static.360buyimg.com/yiqiguang/dist/v20141106-3/ued.guang.init-min.js',
                dataType: 'script', 
                scriptCharset: 'utf-8'
          });
}
window.GUANG_VERSION = 'v20141106-3';
window.GUANG_AUTO_START = window.GUANG_AUTO_START ? window.GUANG_AUTO_START : true;
window.GUANG_EXCLUDE_CATEGORY_ID = [];

 