<?php

require_once '../App.php';

if($request->hasGet("id")){
    $id = $request->get("id");

    if($request->hasGet("name")){
        $name = $request->get("name");

        $stm = $conn->prepare("update todo set `status`=(:name) where id =(:id) ");

        $stm->bindParam(":name",$name,PDO::PARAM_STR);
        $stm->bindParam(":id",$id,PDO::PARAM_INT);
        $out = $stm->execute();

        if($out){

            $session->set("success","success status");
            $request->header("../index.php");
        }else{

            $session->set("errors","status error");
            $request->header("../index.php");
        }
    }else{

        $request->header("../index.php");
    }

}else{
    $request->header("../index.php");
}
