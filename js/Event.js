/**
 * Created by lenovo on 2018/8/24.
 */
var EventUtil={
    addEvent:function (element,type,handler){
        if(element.addEventListener){
            element.addEventListener(type,handler,false);    //DOM2级事件处理程序中的添加监听事件
        }else if (element.attachEvent){
            element.attachEvent("on"+type,handler);          //IE事件处理程序中的添加监听事件
        }else {
            element["on"+type]=handler;                    //DOM0级事件处理程序中的添加监听事件
        }
    },
    removeEvent:function (element,type,handler) {
        if(element.removeEventListener){
            element.removeEventListener(type,handler,false);
        }else if(element.detachEvent){
            element.detachEvent("on"+type,handler);
        }else{
            element["on"+type]=null; //DOM0级事件处理程序的删除方法
        }
    },
    getEvent:function(event){
        return event?event:window.event;           //获取访问内置对象event是哪种形式的
    },
    getTarget:function(event){
        return event.target||event.srcElement;
    },
    //阻止默认行为：
    preventDefault:function(event){
        if(event.preventDefault){
            return event.preventDefault();
        }else{
            return  event.returnValue=false;
        }
    },
    //阻止事件冒泡：
    stopPropagation:function (event){
        if(event.stopPropagation){
            return event.stopPropagation();
        }else{
            return  event.cancelBubble=true;
        }
    }

};
