<?php
require_once dirname(__FILE__) . '/Utilities/DataBase.php';
$pdo = new DataBase();
require_once dirname(__FILE__) . '/Config.php';
$config = new Config();
require_once dirname(__FILE__) . '/Utilities/Utilities.php';
$utilities = new Utilities();
?>

<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ACM-ICPC 报名表</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
    <!-- CSS Files -->

</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            <h3>ACM-ICPC 报名表</h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
            <a href="#overview" class="mdl-layout__tab is-active">报名</a>
            <a href="#features" class="mdl-layout__tab">报名列表</a>
            <!--            <a href="#faq" class="mdl-layout__tab">关于</a>-->
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
            <section class="section--center mdl-grid mdl-grid--no-spacing">
                <div class="mdl-cell mdl-cell--12-col">
                    <h3>比赛相关说明</h3>
                    <ul>
                        <li>本次比赛参赛队员每人次收取10元报名费。报名码的购买地址：
                            <a href="https://dwz.lc/Ccgj7WN">https://dwz.lc/Ccgj7WN</a></li>
                        <li>比赛形式为ACM赛制。(10~13题5小时)。</li>
                        <li>正式赛中使用 <a href="https://cometoj.com">Comet OJ</a>
                            在线测评系统进行比赛，比赛过程中禁止使用任何电子通信设备，可携带相关纸质书籍和打印文档。</li>
                        <li>比赛时间2019年12月14日 13:00 - 18:00。</li>
                        <li>报名截止日期为2019年12月7日24:00。</li>
                        <li>报名后请加临大ACM交流群，群号 676653973</li>
                    </ul>
                </div>
            </section>

            <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                <div class="mdl-card mdl-cell mdl-cell--12-col">
                    <div class="mdl-card__supporting-text">
                        <!--                        <h4>报名信息</h4>-->

                        <!-- Numeric Textfield -->
                        <form action="lib/submit.php" method="post" id="info">

                            <h5>学院</h5>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                                <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="0">
                                <span class="mdl-radio__label">数学与统计学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="1">
                                <span class="mdl-radio__label">文学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                                <input type="radio" id="option-3" class="mdl-radio__button" name="options" value="2">
                                <span class="mdl-radio__label">机械与车辆工程学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                                <input type="radio" id="option-4" class="mdl-radio__button" name="options" value="3">
                                <span class="mdl-radio__label">商学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-5">
                                <input type="radio" id="option-5" class="mdl-radio__button" name="options" value="4">
                                <span class="mdl-radio__label">法学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-6">
                                <input type="radio" id="option-6" class="mdl-radio__button" name="options" value="5">
                                <span class="mdl-radio__label">外国语学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-7">
                                <input type="radio" id="option-7" class="mdl-radio__button" name="options" value="6">
                                <span class="mdl-radio__label">化学化工学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-8">
                                <input type="radio" id="option-8" class="mdl-radio__button" name="options" value="7">
                                <span class="mdl-radio__label">生命科学学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-9">
                                <input type="radio" id="option-9" class="mdl-radio__button" name="options" value="8">
                                <span class="mdl-radio__label">信息科学与工程学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-10">
                                <input type="radio" id="option-10" class="mdl-radio__button" name="options" value="9">
                                <span class="mdl-radio__label">传媒学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-11">
                                <input type="radio" id="option-11" class="mdl-radio__button" name="options" value="10">
                                <span class="mdl-radio__label">教育学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-12">
                                <input type="radio" id="option-12" class="mdl-radio__button" name="options" value="11">
                                <span class="mdl-radio__label">美术学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-13">
                                <input type="radio" id="option-13" class="mdl-radio__button" name="options" value="12">
                                <span class="mdl-radio__label">音乐学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-14">
                                <input type="radio" id="option-14" class="mdl-radio__button" name="options" value="13">
                                <span class="mdl-radio__label">体育与健康学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-15">
                                <input type="radio" id="option-15" class="mdl-radio__button" name="options" value="14">
                                <span class="mdl-radio__label">土木工程与建筑学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-16">
                                <input type="radio" id="option-16" class="mdl-radio__button" name="options" value="15">
                                <span class="mdl-radio__label">自动化与电气工程学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-17">
                                <input type="radio" id="option-17" class="mdl-radio__button" name="options" value="16">
                                <span class="mdl-radio__label">物流学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-18">
                                <input type="radio" id="option-18" class="mdl-radio__button" name="options" value="17">
                                <span class="mdl-radio__label">资源环境学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-19">
                                <input type="radio" id="option-19" class="mdl-radio__button" name="options" value="18">
                                <span class="mdl-radio__label">马克思主义学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-20">
                                <input type="radio" id="option-20" class="mdl-radio__button" name="options" value="19">
                                <span class="mdl-radio__label">药学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-21">
                                <input type="radio" id="option-21" class="mdl-radio__button" name="options" value="20">
                                <span class="mdl-radio__label">教师教育学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-22">
                                <input type="radio" id="option-22" class="mdl-radio__button" name="options" value="21">
                                <span class="mdl-radio__label">创业学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-23">
                                <input type="radio" id="option-23" class="mdl-radio__button" name="options" value="22">
                                <span class="mdl-radio__label">历史文化学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-24">
                                <input type="radio" id="option-24" class="mdl-radio__button" name="options" value="23">
                                <span class="mdl-radio__label">物理与电子工程学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-25">
                                <input type="radio" id="option-25" class="mdl-radio__button" name="options" value="24">
                                <span class="mdl-radio__label">材料科学与工程学院</span>
                            </label>
                            <br/>

                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-26">
                                <input type="radio" id="option-26" class="mdl-radio__button" name="options" value="25">
                                <span class="mdl-radio__label">农林科学学院</span>
                            </label>
                            <br/>


                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="code" type="text" id="code" required>
                                <label class="mdl-textfield__label" for="code">报名码</label>
                                <span class="mdl-textfield__error">请输入报名码</span>
                            </div>
                            <br/>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="name" type="text" id="name" required>
                                <label class="mdl-textfield__label" for="name">姓名</label>
                                <span class="mdl-textfield__error">请输入姓名</span>
                            </div>
                            <br/>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="studentId" type="text" pattern="\d{12}$"
                                       id="studentId"
                                       required>
                                <label class="mdl-textfield__label" for="studentId">学号</label>
                                <span class="mdl-textfield__error">请输入学号</span>
                            </div>

                            <br/>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" name="phone" type="text" pattern="^1\d{10}$"
                                       id="phone" required>
                                <label class="mdl-textfield__label" for="phone">联系方式</label>
                                <span class="mdl-textfield__error">请输入手机号码</span>
                            </div>
                            <br/>

                            <br/>
                            <!-- Colored raised button -->
                            <button type="button" onclick="document.getElementById('info').submit();"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                Button
                            </button>
                        </form>
                    </div>
                </div>
            </section>

        </div>

        <!-- features begin -->
        <div class="mdl-layout__tab-panel" id="features">

            <section class=" mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                <table align="center"
                       class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
                    <?php if (isset($_GET['adm']) && $_GET['adm'] != null && $_GET['adm'] == 'lyu1767') { ?>
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">编号</th>
                        <th>姓名</th>
                        <th>学号</th>
                        <th>手机号</th>
                        <th>院系</th>
                        <th>报名时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM register_form.participants LIMIT 600";
                    $result = $pdo->query($sql);
                    if ($result->rowCount() != 0) {
                        $result = $result->fetchALL();
                        foreach ($result as $item) {
                            ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $item['id'] ?></td>
                                <td><?php echo $utilities->decrypt($item['name'], $config->getSALT()) ?></td>
                                <td><?php echo $utilities->decrypt($item['studentId'], $config->getSALT()) ?></td>
                                <td><?php echo $utilities->decrypt($item['phone'], $config->getSALT()) ?></td>
                                <td><?php echo $item['college'] ?></td>
                                <td><?php echo $item['register_time'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    }else{ ?>
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">编号</th>
                        <th>姓名</th>
                        <th>学号</th>
                        <th>院系</th>
                        <th>报名时间</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $sql = "SELECT * FROM register_form.participants LIMIT 600";
                    $result = $pdo->query($sql);
                    if ($result->rowCount() != 0) {
                        $result = $result->fetchALL();
                        foreach ($result as $item) {
                            ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $item['id'] ?></td>
                                <td><?php echo $utilities->decrypt($item['name'], $config->getSALT()) ?></td>
                                <td><?php echo substr($utilities->decrypt($item['studentId'], $config->getSALT()), 0, -4) ?>
                                    ****
                                </td>
                                <td><?php echo $item['college'] ?></td>
                                <td><?php echo $item['register_time'] ?></td>
                            </tr>
                            <?php
                        }
                    }
                    }

                    ?>

                    </tbody>
                </table>

            </section>


        </div>
        <!-- feature end -->

        <section class="section--center mdl-grid mdl-grid--no-spacing">
            <div class="mdl-cell mdl-cell--12-col">
                <h4 align="center">临沂大学ACM-ICPC程序设计实验室</h4>
            </div>
        </section>
    </main>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>

