<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>기본재고입력</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="../img/favicon.png" rel="icon">
    <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../css/style.css" rel="stylesheet">

<!--    <script ></script>-->

    <style>
        /*td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}*/

        .selected {
            background-color: brown;
            color: #FFF;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

    <script type="text/javascript">
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            <h1><a>기본재고입력</a></h1>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
<!--                <li class="menu-active"><a href="#intro">资料输入</a></li>-->
                <li><a href="material.php">원자재입력</a></li>
                <li><a href="basic_stock.php">기본재고입력</a></li>
                <li><a href="../test/stock.php">재고생성</a></li>
                <li><a href="#order">材料订货</a></li>
                <li><a href="#check">入库对账</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header>
<main>
    <section id="intro">
        <form method="post">
            <div class="intro-text">
                <div class="container column" style="margin-top: 30%; width: 72%">
                    <!--==========================
                      Class
                    ============================-->
                    <div>
                        <label for="ibox_class">
                            <input type="text"
                                   name="ibox_class"
                                   id="ibox_class"
                                   list="class_list"
                                   placeholder="Class"
                                   autocomplete="off"
                                   style="width: 162px"
                                   value="<?php
                                   if (isset($_POST['ibox_class'])) {
                                       echo htmlentities($_POST['ibox_class']);
                                   } ?>">
                        </label>
                        <datalist id="class_list">
                            <?php echo updateDatalist('class'); ?>
                        </datalist>
                    </div>
                    <!--==========================
                      Item
                    ============================-->
                    <div>
                        <label for="ibox_item">
                            <input type="text"
                                   name="ibox_item"
                                   id="ibox_item"
                                   list="item_list"
                                   placeholder="Item"
                                   autocomplete="off"
                                   style="width: 162px"
                                   value="<?php
                                   if (isset($_POST['ibox_item'])) {
                                       echo htmlentities($_POST['ibox_item']);
                                   } ?>">
                        </label>
                        <datalist id="item_list">
                            <?php echo updateDatalist('item'); ?>
                        </datalist>
                    </div>
                    <!--==========================
                      Design
                    ============================-->
                    <div>
                        <label for="ibox_design">
                            <input type="text"
                                   name="ibox_design"
                                   id="ibox_design"
                                   list="design_list"
                                   placeholder="Design"
                                   autocomplete="off"
                                   style="width: 162px"
                                   value="<?php
                                   if (isset($_POST['ibox_design'])) {
                                       echo htmlentities($_POST['ibox_design']);
                                   } ?>">
                        </label>
                        <datalist id="design_list">
                            <?php echo updateDatalist('design'); ?>
                        </datalist>
                    </div>
                    <!--==========================
                      Quantity
                    ============================-->
                    <div>
                        <label for="ibox_qty">
                            <input type="number"
                                   name="ibox_qty"
                                   id="ibox_qty"
                                   placeholder="Qty"
                                   style="width: 162px"
                                   value="<?php
                                   if (isset($_POST['ibox_qty'])) {
                                       echo htmlentities($_POST['ibox_qty']);
                                   } ?>">
                        </label>
                    </div>
                    <!--==========================
                      Buttons onclick="showMaterial('material')"
                    ============================-->
                    <div>
                        <a href="#basic_stock_view" class="btn-get-started btn-info scrollto" style="outline: none" onclick="showMaterial('basic_stock_view')">보기
                        </a>
                        <input type="submit" name="save_material" class="btn-get-started" style="background: none; outline: none" value="저장">
                    </div>
                    <div>
                        <input type="submit" name="show_all" class="btn-get-started scrollto" value="전체검색" style="background: none; outline: none">
                        <input type="submit" name="show_cond" class="btn-get-started scrollto" value="조건검색" style="background: none; outline: none">
                    </div>
                    <div>
                        <input type="submit" name="create" class="btn-get-started" style="background: none; outline: none" value="create">
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--==========================
      material
    ============================-->
<?php
//if (isset($_POST['btn_show'])) {
//
//}
//
//if (isset($_POST['btn_test'])) {
//    $class = $_POST['ibox_class'];
//    echo '
//        <section id="test" class="section-bg">
//        <div class="container-fluid">
//        <div class="section-header">
//        <h3 class="section-title">기본재고</h3>
//        <span class="section-divider"></span>
//        <table id="mat_table" class="container" style="overflow-x: auto; font-size: 10pt; text-align: center">
//        <thead>
//        <tr style="border-bottom: 1px dotted silver;">
//        <th>Class</th>
//        <th>Item</th>
//        <th>Design</th>
//        <th>Qty</th>
//        <th>Worker</th>
//        </tr>
//        </thead>
//        <tbody id="mat_tbody" class="dynamics">
//';
////    update material set date=REPLACE(date, ' ', ''), supplier=REPLACE(supplier, ' ', ''), item=REPLACE(item, ' ', ''), design=REPLACE(design, ' ',''), qty=REPLACE(qty, ' ', ''), month=REPLACE(month, ' ', ''), class=REPLACE(class, ' ', '')
//    $sql = "SELECT * FROM material WHERE class='{$class}'";
//    $conn = mysqli_connect("localhost", "admin", "qwer1234", "outlook_bone_china");
//    $res = mysqli_query($conn, $sql);
//    $num = 0;
//    while ($row = mysqli_fetch_array($res)) {
//        $num += 1;
//        echo '<tr style="border-bottom: 1px dotted silver;"><td>' .
//            $num . '</td><td>' .
//            $row['date'] . '</td><td>' .
//            $row['supplier'] . '</td><td>' .
//            $row['item'] . '</td><td>' .
//            $row['design'] . '</td><td>' .
//            $row['qty'] . '</td><td>' .
//            $row['month'] . '</td><td>' .
//            $row['class'] . '</td><td>' .
//            $row['worker'] . '</td></tr>';
//    }
//    echo
//    '</tbody>
//    </table>
//    </div>
//    </div>
//    </section>';
//}
//?>
</main>

<!--==========================
  Show materials
============================-->
<script>
    function test() {
        $("btn_test").change(function () {
            window.scroll(0, 0);
            window.location.hash = '#test';
        })

    }
    function clearTable() {
        $("#mat_tbody").empty();
    }

    function showMaterial(position) {
        var x = document.getElementById(position);
        x.style.display = "block";
    }
    function hideMaterial(position) {
        var x = document.getElementById(position);
        x.style.display = "none";
    }
</script>

<footer class="footer-links">

</footer>

<a href="#" class="back-to-top" onclick="hideMaterial('basic_stock_view')"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery/jquery-migrate.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/superfish/hoverIntent.js"></script>
<script src="../lib/superfish/superfish.min.js"></script>
<script src="../lib/magnific-popup/magnific-popup.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="../contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="../js/main.js"></script>

</body>
</html>

<?php

#region POST
if (array_key_exists('save_material', $_POST)) {
    updateMaterial();
}
if (array_key_exists('add_supplier', $_POST)) {
    add_list($_POST['ibox_supplier'], 'supplier');
}
if (array_key_exists('add_item', $_POST)) {
    add_list($_POST['ibox_item'], 'item');
}
if (array_key_exists('add_design', $_POST)) {
    add_list($_POST['ibox_design'], 'design');
}
if (array_key_exists('add_class', $_POST)) {
    add_list($_POST['ibox_class'], 'class');
}
if (array_key_exists('pop_supplier', $_POST)) {
    pop_list($_POST['ibox_supplier'], 'supplier');
}
if (array_key_exists('pop_item', $_POST)) {
    pop_list($_POST['ibox_item'], 'item');
}
if (array_key_exists('pop_design', $_POST)) {
    pop_list($_POST['ibox_design'], 'design');
}
if (array_key_exists('pop_class', $_POST)) {
    pop_list($_POST['ibox_class'], 'class');
}
if (array_key_exists('show_all', $_POST)) {
    getMaterial('all');
    alert("전체 검색 완료.");
}
if (array_key_exists('show_cond', $_POST)) {
    $arr = array();

    $class      = ($_POST['ibox_class']);
    $item       = ($_POST['ibox_item']);
    $design     = ($_POST['ibox_design']);

    if (!empty($class)) {
        $arr['class'] = $class;
    }
    if (!empty($item)) {
        $arr['item'] = $item;
    }
    if (!empty($design)) {
        $arr['design'] = $design;
    }

    getMaterial($arr);

    $cond = "";
    foreach ($arr as $k => $v) {
        $cond = $cond.$k."=$v,";
    }
    $cond = substr($cond, 0, -1);
    alert($cond." 조건부 검색 완료.");
}

if (array_key_exists('row-1', $_POST)) {
    alert('row-1 선택');
}
#endregion POST

function showMaterial($condition) {
    if ($condition == 'all') {
        $sql = "SELECT * FROM basic_stock";
    }
    else {
        $sql = "SELECT * FROM basic_stock WHERE ";
        foreach ($condition as $k => $v) {
            $sql = $sql.$k."='{$v}',";
        }
        $sql = substr($sql, 0, -1);
    }
    $conn = mysqli_connect("localhost", "admin", "qwer1234", "outlook_bone_china");
    $res = mysqli_query($conn, $sql);

    echo '
        <section id="basic_stock_view" class="section-bg" style="display: none; margin-bottom: 10%">
        <div class="container-fluid">
        <div class="section-header">
        <h3 class="section-title">원자재목록</h3>
        <span class="section-divider"></span>
        <table id="mat_table" class="container" style="overflow-x: auto; font-size: 10pt; text-align: center">
        <thead>
        <tr style="border-bottom: 1px dotted silver;">
        <th>No</th>
        <th>Class</th>
        <th>Item</th>
        <th>Design</th>
        <th>Qty</th>
        <th>Worker</th>
        </tr>
        </thead>
        <tbody id="mat_tbody" class="dynamics">
';

    $num = 0;
    while ($row = mysqli_fetch_array($res)) {
        $num += 1;
        echo '<tr style="border-bottom: 1px dotted silver"><td>' .
            $num . '</td><td>' .
            $row['class'] . '</td><td>' .
            $row['item'] . '</td><td>' .
            $row['design'] . '</td><td>' .
            $row['qty'] . '</td><td>' .
            $row['worker'] . '</td></tr>';
    }
    echo
    '</tbody>
    </table>
    </div>
    </div>
    </section>';
}

function update($name) {
    $conn = mysqli_connect("localhost", "admin", "qwer1234", "outlook_bone_china");
    $sql = "SELECT * FROM name_info WHERE kind='{$name}'";
    $res = mysqli_query( $conn, $sql );
    while( $row = mysqli_fetch_array( $res ) ) {
        $var = htmlentities($row['name']);
        echo "<option value='$var'>";
    }
}

function save_material() {

    $date       = ($_POST['ibox_date']);
    $supplier   = ($_POST['ibox_supplier']);
    $item       = ($_POST['ibox_item']);
    $design     = ($_POST['ibox_design']);
    $qty        = ($_POST['ibox_qty']);
    $month      = ($_POST['ibox_month'])."月份";
    $class      = ($_POST['ibox_class']);
    $worker     = ($_SESSION['user_id']);

    if (empty($supplier)) {
        alert("supplier 값을 입력하세요.");
        return;
    }
    if (empty($item)) {
        alert("item 값을 입력하세요.");
        return;
    }
    if (empty($design)) {
        alert("design 값을 입력하세요.");
        return;
    }
    if (empty($qty)) {
        alert("quantity 값을 입력하세요.");
        return;
    }
    if (empty($class)) {
        alert("class 값을 입력하세요.");
        return;
    }
    
    $conn = mysqli_connect("localhost", "admin", "qwer1234", "outlook_bone_china");

    $sql = "INSERT INTO material (date, supplier, item, design, qty, month, class, worker) 
            VALUES ('{$date}', '{$supplier}', '{$item}', '{$design}', {$qty}, '{$month}', '{$class}', '{$worker}')";

    if (mysqli_query($conn, $sql)) {
        alert("정상적으로 저장되었습니다.");
    }
}

function add_list($value, $name) {
    if (empty($value)) {
        alert("{$name} 값을 입력하세요.");
        return;
    }
    $conn = mysqli_connect("localhost", "admin", "qwer1234", "outlook_bone_china");
    $sql = "SELECT EXISTS (SELECT * FROM {$name} where {$name}={$value}) as Chk";

    $res = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (intval($res['Chk'])) {
        alert("{$name} : {$value} 항목은 이미 존재합니다.");
        return;
    }

    $sql = "INSERT INTO {$name} VALUES ({$value})";
    if (mysqli_query($conn, $sql)) {
        alert("{$name} : {$value} 항목 추가 완료");
    }
}

function pop_list($value, $name) {

}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>