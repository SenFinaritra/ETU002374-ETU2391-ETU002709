<?php

    class outils{
        function authentification($email,$password){
            $crud=new crud();
            $clients=new Tclients(null,null,$email,null,$password);
            try{
                $result=$crud->selectObject($clients);
                if(count($result)!=0){
                    if($result[0]->fonction==0){
                        header("Location:../views/back-office/accueil.php");
                        return true;
                    }
                    else{
                        header("Location:../views/front-office/accueil.php");
                        return true;
                    }
                }
                return false;
            }catch(Exception $e){
                throw $e;
            }
        }
    }

?>