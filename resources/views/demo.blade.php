<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .line{
            display: flex;
        }
        .box{
            width: 200px;
            height: 200px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            border: 1px solid #111;
        }
        .item{
            width: 50px;
            height: 50px;
            background-color: #000;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }
        .item1{
        }


        .flex-direction{
            display: flex;
        }
        .row{
            flex-direction: row;
        }
        .row-reverse{
            flex-direction: row-reverse;
        }
        .column{
            flex-direction: column;
        }
        .column-reverse{
            flex-direction: column-reverse;
        }


        .flex-wrap{
            display: flex;
        }
        .nowrap{
            flex-wrap: nowrap;
        }
        .wrap{
            flex-wrap: wrap;
        }
        .wrap-reverse{
            flex-wrap: wrap-reverse;
        }


        .justify-content{
            display: flex;
        }
        .justify-content.flex-start{
            justify-content: flex-start;
        }
        .justify-content.flex-end{
            justify-content: flex-end;
        }
        .justify-content.center{
            justify-content: center;
        }
        .justify-content.space-between{
            justify-content: space-between;
        }
        .justify-content.space-around{
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h2>flex-direction，默认值row</h2>
    <div class="line">
        <div class="box flex-direction row">
            <span class="item item1"></span>
        </div>
        <div class="box flex-direction row-reverse">
            <span class="item item1"></span>
        </div>
        <div class="box flex-direction column">
            <span class="item item1"></span>
        </div>
        <div class="box flex-direction column-reverse">
            <span class="item item1"></span>
        </div>
    </div>
    <h2>flex-wrap，默认值nowrap</h2>
    <div class="line">
        <div class="box flex-wrap nowrap">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box flex-wrap wrap">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box flex-wrap wrap-reverse">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
    </div>
    <h2>flex-flow 是flex-direction和flex-wrap的简写形式，默认值为row nowrap</h2>
    <h2>justify-content,默认值flex-start</h2>
    <div class="line">
        <div class="box justify-content flex-start">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box justify-content flex-end">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box justify-content center">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box justify-content space-between">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <div class="box justify-content space-around">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
    </div>
    <h2>align-items属性定义项目在交叉轴上如何对齐。</h2>
    <h2>align-content属性定义了多根轴线的对齐方式。如果项目只有一根轴线，该属性不起作用。</h2>
    <h2>order属性定义项目的排列顺序。数值越小，排列越靠前，默认为0。</h2>
    <h1>flex属性是flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto。后两个属性可选。</h1>
    <h2>flex-grow属性定义项目的放大比例，默认为0，即如果存在剩余空间，也不放大。</h2>
    <h2>flex-shrink属性定义了项目的缩小比例，默认为1，即如果空间不足，该项目将缩小。</h2>
    <h2>flex-basis属性定义了在分配多余空间之前，项目占据的主轴空间（main size）。浏览器根据这个属性，计算主轴是否有多余空间。它的默认值为auto，即项目的本来大小。</h2>
    <h2>align-self属性允许单个项目有与其他项目不一样的对齐方式，可覆盖align-items属性。默认值为auto，表示继承父元素的align-items属性，如果没有父元素，则等同于stretch。</h2>
</body>
</html>