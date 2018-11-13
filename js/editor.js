var E = window.wangEditor;
// 创建一个编辑器
var editor = new E('#editor');
// 配置服务器端地址
editor.customConfig.uploadImgServer = './editorupload.php?from=pc';
//服务器端接收的文件名称
editor.customConfig.uploadFileName = 'images[]';
//内容同步
var $text1 = document.querySelector('#info');
editor.customConfig.onchange = function (html) {
    // 监控变化，同步更新到 textarea
    // $text1.val(html);
    $text1.value = html;
};


editor.create();
// 再创建一个编辑器
// var editor1 = new E('#editor1')
// editor1.create();