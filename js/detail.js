//分享点赞
function dianZan() {
    var right_tags = document.querySelectorAll(".right_tags img");
    var right_spans = document.querySelectorAll(".right_tags span");
    var sid = document.querySelector('input[name="sid"]').value;

    var clickNum=0;
    var data = '';
    right_tags[0].onclick = function () {
            ++clickNum;
            if(clickNum%2===1){
                right_tags[0].src="./images/dot_red.png";
            }else{
                right_tags[0].setAttribute("src","./images/dot.png");
            }
        data = 'sid=' + sid;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", './dzsubmit.php');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);

                if (data.r == 'add') {
                    right_spans[0].innerText=parseInt(right_spans[0].innerText)+1;
                } else {
                    right_spans[0].innerText=parseInt(right_spans[0].innerText)-1;
                }
            }
        }
    };
}


function collect() {
    var right_tags = document.querySelectorAll(".right_tags img");
    var right_spans = document.querySelectorAll(".right_tags span");
    var sid = document.querySelector('input[name="sid"]').value;
    var data = '';
    right_tags[2].onclick = function () {

        data = 'sid=' + sid;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", './clsubmit.php');
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.r == 'add') {
                    right_spans[2].innerText=parseInt(right_spans[2].innerText)+1;
                }
            }
        }
    }
}

