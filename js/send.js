//发送评论的内容
function send() {
    var remark = document.querySelectorAll(".right_tags img");
    var right_spans = document.querySelectorAll(".right_tags span");
    var fa_remark=document.querySelector(".fa_remark");
    var send=document.querySelector(".fa_remark img");//发送按钮
    var input = document.querySelector(".fa_remark input");
    var warn = document.querySelector(".warn");
    var sid=document.querySelector('input[name="sid"]');
    var data='';
    remark[1].onclick=function () {
        fa_remark.style.display="block";
    };

    send.onclick=function () {

        if(!input.value){
            warn.style.display="block";
        }else {
            warn.style.display="none";
            fa_remark.style.display="none";
            data='remark='+input.value;
            data+='&sid='+sid.value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", './rmsubmit.php');
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    // console.log(data);
                    if (data.r == 'add') {
                        right_spans[1].innerText=parseInt(right_spans[1].innerText)+1;
                        window.location.reload();
                    }
                }
            }

        }
    }
}

function res(){
    var fa_huifu=document.querySelector(".fa_huifu");
var res=document.querySelector(".fa_huifu img");
var comment_stats=document.querySelector(".comment_stats p");
var input=document.querySelector('input[name="res"]');
    var rid=document.querySelector('input[name="rid"]');
    var warn = document.querySelector(".warn");
var data='';
    comment_stats && (comment_stats.onclick=function () {
        fa_huifu.style.display="block";
    });
 res && (res.onclick=function(){
    if(!input.value){
        warn.style.display="block";
    }else {
        warn.style.display="none";

        fa_huifu.style.display="none";
        data='res='+input.value;
        data+='&rid='+rid.value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", './ressubmit.php');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'add') {
                    window.location.reload();

                }
            }
        }

    }

})
}