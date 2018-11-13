window.onload=function(){
    regis();
    login();
};
function regis(){
    var regis=document.querySelector(".register_bt");
    if(!regis) return;
    regis.onclick=function(){
        var data = '';
        //姓名必填
        var username = document.querySelector("input[name='username']");

        if (!username.value) {
            // console.log(username.parentNode.nextElementSibling);
            username.parentNode.nextElementSibling.classList.add("H");
            username.focus();
            return false;
        } else {
            username.parentNode.nextElementSibling.classList.remove("H");
            data = 'username=' + username.value;
        }

        var passwd = document.querySelector("input[name='passwd']");
        var reg_pass=/^\d{6,12}$/;
        if (!reg_pass.test(passwd.value)) {
            // console.log(username.parentNode.nextElementSibling);
            passwd.parentNode.nextElementSibling.classList.add("H");
            passwd.focus();
            return false;
        } else {
            passwd.parentNode.nextElementSibling.classList.remove("H");
            data += '&passwd=' + passwd.value;
        }
        console.log(123);
        var xhr=new XMLHttpRequest();
        xhr.open("POST","./registersubmit.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        //接收服务器返回的数据
        xhr.onreadystatechange=function () {
            if(xhr.readyState === 4 && xhr.status === 200){
                var data=JSON.parse(xhr.responseText);
                console.log(data);
                if(data.r==='username_exited'){
                    document.querySelector(".umind").innerHTML="*此账号已存在";
                    document.querySelector(".umind").classList.add("H");
                    return;
                }
                if (data.r === "ok") {
                    layer.confirm('注册成功', {
                        btn: ['确定']
                    }, function (index, layero) {
                        window.location.reload();
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }
        }
    };
}


function login(){
    var login=document.querySelector(".login_bt");
    if(!login) return;
    login.onclick=function(){

        var data = '';
        //姓名必填
        var username = document.querySelector("input[name='username']");

        if (!username.value) {
            // console.log(username.parentNode.nextElementSibling);
            username.parentNode.nextElementSibling.classList.add("H");
            username.focus();
            return false;
        } else {
            username.parentNode.nextElementSibling.classList.remove("H");
            data = 'username=' + username.value;
        }

        var passwd = document.querySelector("input[name='passwd']");

        if (!passwd.value) {
            // console.log(username.parentNode.nextElementSibling);
            passwd.parentNode.nextElementSibling.classList.add("H");
            passwd.focus();
            return false;
        } else {
            passwd.parentNode.nextElementSibling.classList.remove("H");
            data += '&passwd=' + passwd.value;
        }
        console.log(data);
        var xhr=new XMLHttpRequest();
        xhr.open("POST","./loginsubmit.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        //接收服务器返回的数据
        xhr.onreadystatechange=function () {
            if(xhr.readyState === 4 && xhr.status === 200){
                var data=JSON.parse(xhr.responseText);

                if(data.r==='username_not_exit'){

                    document.querySelector(".umind").innerHTML="*此账号不存在";
                    document.querySelector(".umind").classList.add("H");
                    return;
                }
                if(data.r==='passwd_error'){
                    document.querySelector(".pmind").innerHTML="*密码不正确";
                    document.querySelector(".pmind").classList.add("H");
                    return;
                }
                if(data.r==='ok'){
                    window.location.href = './index.php';
                }
            }
        }
    };
}



