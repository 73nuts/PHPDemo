<?php
include_once ("conn.php");
include_once ("pHeader.php");

function json($result, $ts)
{
    // 定义一个数组，用于保存读取到的数据
    $state = array();
    // 遍历数据表
    while (@$arr = @mysqli_fetch_assoc($result)) {
        // 可以直接把读取到的数据赋值给数组或者通过字段名的形式赋值也可以
        $state[] = $arr;
        // $array[$arr['0']] = $arr;
    }
    $array = array(
        $ts => $state
    );
    // $objarr = array("state" => $array);
    // 最后通过json_encode()转化数组
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
    exit();
}

function jsonarr($result1, $ts1, $result2, $ts2, $result3, $ts3, $result4, $ts4, $result5, $ts5, $result6, $ts6, $result7, $ts7, $result8, $ts8, $result9, $ts9, $result10, $ts10, $result11, $ts11, $result12, $ts12, $result13, $ts13, $result14, $ts14, $result15, $ts15, $result16, $ts16, $result17, $ts17, $result18, $ts18, $result19, $ts19, $result20, $ts20, $result21, $ts21, $result22, $ts22, $result23, $ts23, $result24, $ts24, $result25, $ts25, $result26, $ts26, $result27, $ts27, $result28, $ts28, $result29, $ts29, $result30, $ts30, $result31, $ts31, $result32, $ts32, $result33, $ts33, $result34, $ts34, $result35, $ts35, $result36, $ts36, $result37, $ts37, $result38, $ts38, $result39, $ts39, $result40, $ts40, $result41, $ts41, $result42, $ts42, $result43, $ts43, $result44, $ts44, $result45, $ts45, $result46, $ts46, $result47, $ts47, $result48, $ts48, $result49, $ts49, $result50, $ts50, $result51, $ts51, $result52, $ts52, $result53, $ts53, $result54, $ts54, $result55, $ts55, $result56, $ts56, $result57, $ts57, $result58, $ts58, $result59, $ts59, $result60, $ts60, $result61, $ts61, $result62, $ts62, $result63, $ts63, $result64, $ts64, $result65, $ts65, $result66, $ts66, $result67, $ts67, $result68, $ts68, $result69, $ts69, $result70, $ts70, $result71, $ts71, $result72, $ts72, $result73, $ts73, $result74, $ts74, $result75, $ts75, $result76, $ts76, $result77, $ts77, $result78, $ts78, $result79, $ts79, $result80, $ts80, $result81, $ts81, $result82, $ts82, $result83, $ts83, $result84, $ts84, $result85, $ts85, $result86, $ts86, $result87, $ts87, $result88, $ts88, $result89, $ts89, $result90, $ts90, $result91, $ts91, $result92, $ts92, $result93, $ts93, $result94, $ts94, $result95, $ts95, $result96, $ts96, $result97, $ts97, $result98, $ts98, $result99, $ts99, $result100, $ts100)
{
    $state1 = array();
    $state2 = array();
    $state3 = array();
    $state4 = array();
    $state5 = array();
    $state6 = array();
    $state7 = array();
    $state8 = array();
    $state9 = array();
    $state10 = array();
    $state11 = array();
    $state12 = array();
    $state13 = array();
    $state14 = array();
    $state15 = array();
    $state16 = array();
    $state17 = array();
    $state18 = array();
    $state19 = array();
    $state20 = array();
    $state21 = array();
    $state22 = array();
    $state23 = array();
    $state24 = array();
    $state25 = array();
    $state26 = array();
    $state27 = array();
    $state28 = array();
    $state29 = array();
    $state30 = array();
    $state31 = array();
    $state32 = array();
    $state33 = array();
    $state34 = array();
    $state35 = array();
    $state36 = array();
    $state37 = array();
    $state38 = array();
    $state39 = array();
    $state40 = array();
    $state41 = array();
    $state42 = array();
    $state43 = array();
    $state44 = array();
    $state45 = array();
    $state46 = array();
    $state47 = array();
    $state48 = array();
    $state49 = array();
    $state50 = array();
    $state51 = array();
    $state52 = array();
    $state53 = array();
    $state54 = array();
    $state55 = array();
    $state56 = array();
    $state57 = array();
    $state58 = array();
    $state59 = array();
    $state60 = array();
    $state61 = array();
    $state62 = array();
    $state63 = array();
    $state64 = array();
    $state65 = array();
    $state66 = array();
    $state67 = array();
    $state68 = array();
    $state69 = array();
    $state70 = array();
    $state71 = array();
    $state72 = array();
    $state73 = array();
    $state74 = array();
    $state75 = array();
    $state76 = array();
    $state77 = array();
    $state78 = array();
    $state79 = array();
    $state80 = array();
    $state81 = array();
    $state82 = array();
    $state83 = array();
    $state84 = array();
    $state85 = array();
    $state86 = array();
    $state87 = array();
    $state88 = array();
    $state89 = array();
    $state90 = array();
    $state91 = array();
    $state92 = array();
    $state93 = array();
    $state94 = array();
    $state95 = array();
    $state96 = array();
    $state97 = array();
    $state98 = array();
    $state99 = array();
    $state100 = array();
    while (@$arr = @mysqli_fetch_assoc($result1)) {
        $state1[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result2)) {
        $arr['ProductInfo'] = '';
        $state2[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result3)) {
        $arr['Content'] = '';
        $state3[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result4)) {
        $state4[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result5)) {
        $state5[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result6)) {
        $state6[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result7)) {
        $state7[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result8)) {
        $state8[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result9)) {
        $state9[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result10)) {
        $state10[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result11)) {
        $state11[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result12)) {
        $state12[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result13)) {
        $state13[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result14)) {
        $state14[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result15)) {
        $state15[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result16)) {
        $state16[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result17)) {
        $state17[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result18)) {
        $state18[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result19)) {
        $state19[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result20)) {
        $state20[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result21)) {
        $state21[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result22)) {
        $state22[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result23)) {
        $state23[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result24)) {
        $state24[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result25)) {
        $state25[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result26)) {
        $state26[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result27)) {
        $state27[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result28)) {
        $state28[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result29)) {
        $state29[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result30)) {
        $state30[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result31)) {
        $state31[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result32)) {
        $state32[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result33)) {
        $state33[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result34)) {
        $state34[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result35)) {
        $state35[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result36)) {
        $state36[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result37)) {
        $state37[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result38)) {
        $state38[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result39)) {
        $state39[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result40)) {
        $state40[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result41)) {
        $state41[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result42)) {
        $state42[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result43)) {
        $state43[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result44)) {
        $state44[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result45)) {
        $state45[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result46)) {
        $state46[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result47)) {
        $state47[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result48)) {
        $state48[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result49)) {
        $state49[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result50)) {
        $state50[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result51)) {
        $state51[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result52)) {
        $state52[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result53)) {
        $state53[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result54)) {
        $state54[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result55)) {
        $state55[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result56)) {
        $state56[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result57)) {
        $state57[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result58)) {
        $state58[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result59)) {
        $state59[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result60)) {
        $state60[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result61)) {
        $state61[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result62)) {
        $state62[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result63)) {
        $state63[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result64)) {
        $state64[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result65)) {
        $state65[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result66)) {
        $state66[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result67)) {
        $state67[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result68)) {
        $state68[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result69)) {
        $state69[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result70)) {
        $state70[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result71)) {
        $state71[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result72)) {
        $state72[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result73)) {
        $state73[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result74)) {
        $state74[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result75)) {
        $state75[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result76)) {
        $state76[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result77)) {
        $state77[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result78)) {
        $state78[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result79)) {
        $state79[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result80)) {
        $state80[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result81)) {
        $state81[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result82)) {
        $state82[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result83)) {
        $state83[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result84)) {
        $state84[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result85)) {
        $state85[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result86)) {
        $state86[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result87)) {
        $state87[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result88)) {
        $state88[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result89)) {
        $state89[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result90)) {
        $state90[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result91)) {
        $state91[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result92)) {
        $state92[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result93)) {
        $state93[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result94)) {
        $state94[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result95)) {
        $state95[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result96)) {
        $state96[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result97)) {
        $state97[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result98)) {
        $state98[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result99)) {
        $state99[] = $arr;
    }
    while (@$arr = @mysqli_fetch_assoc($result100)) {
        $state100[] = $arr;
    }
    // 最后通过json_encode()转化数组
    $array = array(
        $ts1 => $state1,
        $ts2 => $state2,
        $ts3 => $state3,
        $ts4 => $state4,
        $ts5 => $state5,
        $ts6 => $state6,
        $ts7 => $state7,
        $ts8 => $state8,
        $ts9 => $state9,
        $ts10 => $state10,
        $ts11 => $state11,
        $ts12 => $state12,
        $ts13 => $state13,
        $ts14 => $state14,
        $ts15 => $state15,
        $ts16 => $state16,
        $ts17 => $state17,
        $ts18 => $state18,
        $ts19 => $state19,
        $ts20 => $state20,
        $ts21 => $state21,
        $ts22 => $state22,
        $ts23 => $state23,
        $ts24 => $state24,
        $ts25 => $state25,
        $ts26 => $state26,
        $ts27 => $state27,
        $ts28 => $state28,
        $ts29 => $state29,
        $ts30 => $state30,
        $ts31 => $state31,
        $ts32 => $state32,
        $ts33 => $state33,
        $ts34 => $state34,
        $ts35 => $state35,
        $ts36 => $state36,
        $ts37 => $state37,
        $ts38 => $state38,
        $ts39 => $state39,
        $ts40 => $state40,
        $ts41 => $state41,
        $ts42 => $state42,
        $ts43 => $state43,
        $ts44 => $state44,
        $ts45 => $state45,
        $ts46 => $state46,
        $ts47 => $state47,
        $ts48 => $state48,
        $ts49 => $state49,
        $ts50 => $state50,
        $ts51 => $state51,
        $ts52 => $state52,
        $ts53 => $state53,
        $ts54 => $state54,
        $ts55 => $state55,
        $ts56 => $state56,
        $ts57 => $state57,
        $ts58 => $state58,
        $ts59 => $state59,
        $ts60 => $state60,
        $ts61 => $state61,
        $ts62 => $state62,
        $ts63 => $state63,
        $ts64 => $state64,
        $ts65 => $state65,
        $ts66 => $state66,
        $ts67 => $state67,
        $ts68 => $state68,
        $ts69 => $state69,
        $ts70 => $state70,
        $ts71 => $state71,
        $ts72 => $state72,
        $ts73 => $state73,
        $ts74 => $state74,
        $ts75 => $state75,
        $ts76 => $state76,
        $ts77 => $state77,
        $ts78 => $state78,
        $ts79 => $state79,
        $ts80 => $state80,
        $ts81 => $state81,
        $ts82 => $state82,
        $ts83 => $state83,
        $ts84 => $state84,
        $ts85 => $state85,
        $ts86 => $state86,
        $ts87 => $state87,
        $ts88 => $state88,
        $ts89 => $state89,
        $ts90 => $state90,
        $ts91 => $state91,
        $ts92 => $state92,
        $ts93 => $state93,
        $ts94 => $state94,
        $ts95 => $state95,
        $ts96 => $state96,
        $ts97 => $state97,
        $ts98 => $state98,
        $ts99 => $state99,
        $ts100 => $state100
    );
    // $objarr = array("state" => $array);
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
    exit();
}
?>