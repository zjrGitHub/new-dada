//window.onload只能运行一次
window.onload=function (){
    p();
};
function p() {
    var box2 = document.querySelector(".box2");
    //获取整个大盒子的宽度：
    var box2_width = box2.offsetWidth;
    console.log(box2_width);
    //获取装img的每个盒子
    var b = document.querySelectorAll(".box2 .box2_img");
    //获取一个盒子的宽度
    var b_width = b[0].offsetWidth;
    console.log(b_width);
    var num = Math.floor(box2_width / b_width);
    console.log(num);
    //将每个图片高度放在一个数组中
    var box_height = [];
//            var imgs=document.querySelectorAll(".box2_img img");
//            var index=imgs.length;
    let minheight = minind = mh = 0;
    for (let n = 0; n < b.length; n++) {
        //第一行的图片的处理方法：
        if (n < num) {
            //将每个盒子的高度都push到一个数组中，然后再定位到固定的位子
            box_height.push(b[n].offsetHeight);
            b[n].style.position = 'absolute';
            //每个图片的left都是移动到对应的下标乘以每个盒子宽度
            b[n].style.left = b_width * n + 'px';
        } else {
            //再处理第一排之外的图片
            //首先获取第一排高度数组中的最小值
            minheight = Math.min.apply(Math, box_height);
            console.log(minheight);
            //获取到最小高度的那个下标
            minind = box_height.indexOf(minheight);
            console.log(minind);
            //再改变n>num时的图片的定位
            b[n].style.position = 'absolute';
            //left值为每个盒子乘以最小高度值得下标
            b[n].style.left = b_width * minind + 'px';
            //top值就是最小高度值
            b[n].style.top = minheight + 'px';
            //改变高度最小值
            mh = b[n].offsetHeight;
            box_height[minind] = box_height[minind] + mh;
        }
    }
    //用.给数组box_height分隔
    //给box2加上一个动态的高度，就是由高度数组中的最大高度来决定
    box2.style.height = Math.max(...box_height)+'px';
    console.log(box_height);
}

