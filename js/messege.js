window.onload = function () {
    uploadhead();
    uploadmessage();
};

//上传头像
function uploadhead() {
    var myheader = document.querySelector('.myheader');
    if(!myheader) return ;
    var headerimg = document.querySelector('.header img');
    //事件处理
    myheader.onchange = function(){
        // console.log(this.files[0]);
        //把文件上传到服务器 AJAX 然后服务器返回一个图片地址
        var xhr = new XMLHttpRequest();
        xhr.open('POST', './upload.php');
        //创建一个表单数据对象
        var formdata = new FormData();  //类似于写了一个表单  <form></form>
        formdata.append('myheader', this.files[0]);//<input name="myheader" type="file" files="this.files[0]">
        xhr.send(formdata);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                headerimg.src = data.path;
                // 修改图片地址的值
                document.querySelector('input[name="head"]').value = data.path;
            }
        }
    }
}

//完善资料
function uploadmessage() {
    var uploadmessage = document.querySelector('.uploadmessage');
    var headerimg = document.querySelector('.header img');
    if(!uploadmessage) return ;
    uploadmessage.onclick = function () {
        // 要提交的数据
        var data = '';
        //昵称
        // console.log(456);
        var smallname = document.querySelector('input[name="smallname"]');
      console.log(smallname.value);
        var reg_smallname = /^[\u4e00-\u9fa5]{1,5}$/;
        if (!reg_smallname.test(smallname.value)) {
            console.log(smallname.parentNode.nextElementSibling);
            smallname.parentNode.nextElementSibling.classList.add('H');
            smallname.focus();
            return false;
        } else {
            smallname.parentNode.nextElementSibling.classList.remove('H');
            data = 'smallname=' + smallname.value;
        }

        // 密码 6-12位
        var passwd = document.querySelector('input[name="passwd"]');
        var reg_passwd = /^\d{6,12}$/;
        if (!reg_passwd.test(passwd.value)) {
            passwd.parentNode.nextElementSibling.classList.add('H');
            passwd.focus();
            return false;
        } else {
            passwd.parentNode.nextElementSibling.classList.remove('H');
            data += '&passwd=' + passwd.value;
        }

        //性别和个性签名
        data += '&gender=' + document.querySelector('input[name="gender"]:checked').value;
        data += '&description=' + document.querySelector('.description').value;
        data += '&header=' + document.querySelector('input[name="head"]').value;

        console.log(data);
        // ajax操作：把数据提交到服务器
        // 第一步：创建一个XHR对象
        var  xhr = new XMLHttpRequest();
        // 第二步：建立对服务器的请求
        xhr.open('POST', './uploadmessage.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //第三步：发送请求
        xhr.send(data);
        // 监听状态改变
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var  data = JSON.parse(xhr.responseText);
                headerimg.src = data.path;
                console.log(data);
                if (data.r == 'ok') {
                    layer.confirm('确定修改', {
                        btn: ['确定']
                    }, function (index, layero) {
                        window.location.reload();
                    });
                } else {
                    alert('失败，请刷新后重新操作');
                }
            }

        }
    }
}

