<?php
require_once '../App.php';

    if($request->HasPost("submit") && $request->hasGet("id")){
        $id = $request->get("id");
        $title = $request->clean("title");

        $validation->validate("title",$title,["Required","Str"]);
        $errors = $validation->getError();


        if(empty($errors)){

            $stm = $conn->prepare("select `title` from todo where id =(:id)");
            $stm->bindParam(":id",$id,PDO::FETCH_ASSOC);
            $out = $stm->execute();

            if($out){

                $stm = $conn->prepare("update todo set `title` =(:title) where id =(:id)");
                $stm->bindParam(":title",$title,PDO::PARAM_STR);
                $stm->bindParam(":id",$id,PDO::PARAM_INT);
                $is_updated = $stm->execute();

                if($is_updated){

                    $session->set("success","data updated successfuly");
                $request->header("../index.php");
                }else{
                   
                    $session->set("errors",$errors);
                    $request->header("../edit.php?id=$id");
                }

            }else{

                $session->set("errors","error while update");
                $request->header("../edit.php?id=$id");
            }


        }else{

            $session->set("errors",$errors);
            $request->header("../edit.php?id=$id");
        }

    }else{

        $request->header("../edit.php?id=$id");
    }
