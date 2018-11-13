
//导航条：
var logo = document.querySelector(".logo");
var input = document.querySelector(".nav-input");
var nav_bar = document.querySelector(".layui-nav-bar");
logo.onmouseover = function () {
    nav_bar.style.display = "none";
};
logo.onmouseout = function () {
    nav_bar.style.display = "block";
};
input.onmouseover = function () {
    nav_bar.style.display = "none";
};
input.onmouseout = function () {
    nav_bar.style.display = "block";
};
//滚动条：

//回到顶部
var back_top=document.querySelector(".back_top");
var back_img=document.querySelector(".back_top img");
// EventUtil.addEvent(document, "scroll", function () {
//     var target = EventUtil.getTarget(event);
//     if (target.scrollingElement.scrollTop > 300) {
//         back_top.style.display="block";
//     } else {
//         back_top.style.display="none";
//     }
// });
back_top.onmouseover=function(){
    back_img.setAttribute("src","images/back_top1.png");
};
back_top.onmouseout=function(){
    back_img.setAttribute("src","images/back_top.png");
};
back_top.onclick=function(){
    document.documentElement.scrollTop = 0;
};