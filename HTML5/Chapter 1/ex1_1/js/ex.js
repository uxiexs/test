/**
 * Created by uxeix on 2016/4/18.
 */
    /*使用document.getElementById()方法获取指向canvas的引用*/
var canvas = document.getElementById('canvas'),
/*在canvas对象上调用getContext('2d')方法获取绘图环境变量(注意,"2d"中的"d"必须小写)*/
    context = canvas.getContext('2d');
context.beginPath();
/*=====使用绘图环境对象在canvas元素上进行绘制begin=====*/
canvas.width = 600;
canvas.height = 300;
//context.font = '38pt Arial';   //字符大小 样式
context.font = 'small-caps italic 700 38pt Arial menu';
context.fillStyle = 'cornflowerblue';     //字符颜色
context.strokeStyle = 'blue'; //字符轮廓线
context.fillText('Hello Canvas',canvas.width/2 -150,canvas.height/2 +15);   //绘制字符
context.strokeText('Hello Canvas',canvas.width/2 -150,canvas.height/2 +15); //绘制字符轮廓线
context.stroke();
/*=====使用绘图环境对象在canvas元素上进行绘制begin=====*/
/*==================HTML5路径开始=====================*/
/**
 * 1.lineTo();
 * 2.arcTo();
 * 3.quadraticCruveTo();   // 向下弯曲;
 * 4.bezierCurveTo();       // 先向上弯曲,再向下弯曲;
 */
//context.beginPath();
//context.moveTo(100, 20);
//context.lineTo(200, 160);
//context.quadraticCurveTo(230, 200, 250, 120);
//context.bezierCurveTo(290, -40, 300, 200, 400, 150);
//context.lineTo(500, 90);
//context.lineWidth = 15;
//context.strokeStyle = '#dd4814';
//context.stroke();
/*==================HTML5路径结束=====================*/