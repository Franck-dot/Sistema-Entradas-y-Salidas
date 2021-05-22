<?php
    header('Content-Type: application/json');

    require "conexion.php";

    $año=date("Y");
    $mes=date("m");
    $mes_actual=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_salida FROM entradas_salidas WHERE hora_salida LIKE '$mes_actual%'";
    $result = mysqli_query($link, $sqlQuery);
    $row = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_pasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_salida FROM entradas_salidas WHERE hora_salida LIKE '$mes_pasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $row_ = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_antepasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_salida FROM entradas_salidas WHERE hora_salida LIKE '$mes_antepasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $row_c = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_anteantepasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_salida FROM entradas_salidas WHERE hora_salida LIKE '$mes_anteantepasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $row_cn = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_ante=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_salida FROM entradas_salidas WHERE hora_salida LIKE '$mes_ante%'";
    $result = mysqli_query($link, $sqlQuery);
    $row_cnt = $result->num_rows;

/* ******************************************** */

    $año=date("Y");
    $mes=date("m");
    $mes_actual=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_entrada FROM entradas_salidas WHERE hora_entrada LIKE '$mes_actual%'";
    $result = mysqli_query($link, $sqlQuery);
    $raw = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_pasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_entrada FROM entradas_salidas WHERE hora_entrada LIKE '$mes_pasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $raw_ = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_antepasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_entrada FROM entradas_salidas WHERE hora_entrada LIKE '$mes_antepasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $raw_c = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_anteantepasado=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_entrada FROM entradas_salidas WHERE hora_entrada LIKE '$mes_anteantepasado%'";
    $result = mysqli_query($link, $sqlQuery);
    $raw_cn = $result->num_rows;

    if($mes==1){
        $mes=12;
        $año=$año-1;
    }else{
         $mes=$mes-1;   
    };

    $mes_ante=$año.'-'.$mes;

    $sqlQuery = "SELECT hora_entrada FROM entradas_salidas WHERE hora_entrada LIKE '$mes_ante%'";
    $result = mysqli_query($link, $sqlQuery);
    $raw_cnt = $result->num_rows;

    /* ******************************************** */

    $data = array(
        $mes_actual.';'.$row.';'.$raw,
        $mes_pasado.';'.$row_.';'.$raw_,
        $mes_antepasado.';'.$row_c.';'.$raw_c,
        $mes_anteantepasado.';'.$row_cn.';'.$raw_cn,
        $mes_ante.';'.$row_cnt.';'.$raw_cnt
    );
    
    mysqli_close($link);

    echo json_encode($data);
?>