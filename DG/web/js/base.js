/* 
* @Author: lpx
* @Date:   2016-02-29 15:23:36
* @Last Modified time: 2016-03-04 22:37:32
*/

$(document).ready(function(){
    timeManager = {};
    //双击页面元素不会出现蓝色区域
    $('body').bind("selectstart", function () { return false; });
    //禁用鼠标中键点击事件
    $(document).on('mousedown',function(Event)
    {
        if (1 === Event.button) Event.preventDefault()
    });
    // 用于隐藏和显示div
    showDiv = function(){
        var arr = arguments;
        var isString = true;
        for(var i=0;i<arr.length;i++){
            if(typeof arr[i] != 'string'){
                isString = false;
                break;
            }
        };
        if(isString){
            for(var i=0;i<arr.length;i++){
                if(i==arr.length-1){
                    $('#'+arr[i]).removeClass('hidden');
                }else{
                    $('#'+arr[i]).addClass('hidden');
                }
            }
        }else{
            console.log("base-showDiv参数错误：传入的参数必须是字符串格式，且为所要操作div的id,方法会显示最后一个div，隐藏前面的n个div。");
        }
    };

    //用于验证字符串是否是邮箱格式
    isEmail = function(str){
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
        return reg.test(str); 
    }
    //用于延时清除文字，str为要清除标签的id，time为时间，单位为毫秒
    clearHTML = function(str,time){
        if(timeManager.timer){
            clearTimeout(timeManager.timer);
        }
        timeManager.timer = setTimeout(function(){
            $('#'+str)[0].innerHTML = "";
        }, time);
    };

    //为元素加上active
    addActive = function(){
        this.addClass('active');
    };

    //将汉字转换为Unicode编码
    toUnicode = function(str){
        var temp;
        i = 0;
        r = '';
        len = str.length;
         
        for(; i<len; i++){
        temp = str.charCodeAt(i).toString(16);
         
        while(temp.length<4)
        temp = '0'+temp;
         
        r += '＼＼u'+temp;
        };
         
        return r;
    };
    
    //获取对象数组里的某一个对象，arr是对象数组，column是包含列名的字符串，value是在列里要找的值，函数返回一个对象数组里的对象
    getData = function(arr,column,value){
        for(var n in arr){
            if(arr[n][column] == value){
                return arr[n];
            }
        }
    };
    //
    getDataById = function(tableName,id){
    
        var defer = $.Deferred();
        $.ajax({
            // async: false,
            type:'post',
            dataType:'json',
            url:'/DG/web/ajax/getdata',
            data:{ 'table':tableName , 'id':id },
            success:function(data){
                defer.resolve(data);
            }
        });
        
        return defer.promise();
    };
    //获取自定义属性
    getAttr = function(obj,attrName){
        if(obj.dataset){
            return obj['dataset'][attrName];
        }else{
            return obj.getAttribute('data-'+attrName);
        }
    };
    var test = document.getElementById('test');

});