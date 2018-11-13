window.onload = function () {

    shareimg();
    sharedetails()


};

//上传图片
function shareimg() {
    var mypicture = document.querySelector('.mypicture');
    if(!mypicture) return ;
    var uploadimg = document.querySelector('.uploadimg');
    //事件处理
    mypicture.onchange = function(){
        var n=uploadimg.querySelectorAll("img").length;
        if ((n+this.files.length)>8) {
            layer.confirm('最多选8张图片', {
                btn: ['确定']
            }, function (index, layero) {
                window.location.reload();
            });
        } else {
            //把文件上传到服务器 AJAX 然后服务器返回一个图片地址
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './uploads.php');
            //创建一个表单数据对象
            var formdata = new FormData();  //类似于写了一个表单  <form></form>
            for(var i =0; i < this.files.length; i++){
                formdata.append('mypicture[]', this.files[i]);
            }
            xhr.send(formdata);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    // console.log(data);
                    if(data.path.length>0){
                        for(var j=0;j<data.path.length;j++){
                            var imgj=document.createElement("img");
                            imgj.src=data.path[j];
                            uploadimg.append(imgj);
                        }
                    }
                    // 修改图片地址的值
                    // document.querySelector('input[name="picture"]').value = JSON.stringify(data.path);
                }
            }
        }
    }
}

//上传细节
function sharedetails() {
    var sharebt = document.querySelector(".sharebt");
    if (!sharebt) return;
    sharebt.onclick = function () {

        var data = '';
        var uploadimg = document.querySelectorAll(".uploadimg img");
        var urls = [];
        for (var i = 0; i < uploadimg.length; i++) {
            urls.push(uploadimg[i].getAttribute("src"));
        }
        data = "picture=" + urls.join(',');

        // 专栏标题
        var title = document.querySelector("input[name='title']");
        data += '&title=' + title.value;

        //专栏标签
        var like = document.querySelectorAll('input[name="tag[]"]:checked');
        var str = [];
        for (var j = 0; j < like.length; j++) {
            str.push(like[j].value);
        }
        data += '&tag=' + str.join(',');
        // console.log(data);

        //富文本框
        data += '&detail=' + document.querySelector('#info').value;
        console.log(document.querySelector('#info'));
        // var editor = document.querySelector("#info").value;
        console.log(data);


        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./sharesubmit.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        // 接收服务器返回的数据
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                // console.log(data);
                if (data.r === 'ok') {
                    layer.confirm('确定上传', {
                        btn: ['确定','取消']
                    }, function (index, layero) {
                        window.location.reload();
                    },
                    function (index) {
                        window.location.reload();
                    });
                }else {
                    alert('失败，请刷新后重新操作');
                }
            }
        }
    }
}