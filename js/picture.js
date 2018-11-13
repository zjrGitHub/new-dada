
function picture() {
    var zhu_img=document.querySelector('.zhu_img img');
     console.log(zhu_img);
    var each_pic=document.querySelectorAll('.each_pic img');

    for(let i=0;i<each_pic.length;i++){
        each_pic[i].onmouseover=function(){
            each_pic[i].classList.add("color");
            let path=each_pic[i].src;
            zhu_img.src=path;
        };
        each_pic[i].onmouseout=function(){
            each_pic[i].classList.remove("color");
        };
    }
}




