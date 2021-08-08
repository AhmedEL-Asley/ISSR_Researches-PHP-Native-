<?php
    include '../config/connect.php';
    if(isset($_POST["type"]))
    {
        if($_POST["type"] == "department_data")
        {
            $query = "SELECT * FROM issr_departments ORDER BY id ASC";
            $statement = $con->prepare($query);
            $statement->execute();
            $data = $statement->fetchAll();
            foreach($data as $row)
            {
                $output[] = array('id'  => $row["id"],'name'  => $row["name"]);
            }
            echo json_encode($output);
        }
        else
        {
            $query = "SELECT * FROM issr_subjects WHERE department = '".$_POST["department_id"]."' AND id NOT IN (SELECT subject FROM issr_subjects_doctors_registration WHERE doctor =  '".$_POST["user"]."') AND issr_subjects.active = 1 ORDER BY id ASC ";
            $statement = $con->prepare($query);
            $statement->execute();
            $data = $statement->fetchAll();
            foreach($data as $row)
            {
                $output[] = array('id'  => $row["id"],'name'  => $row["name"]);
            }
            echo json_encode($output);
        }
    }
?>
