<?php


namespace App\Controllers\Admin;

use App\model\User;

class ClubRulesController
{

    public function rulesPage()
    {

        $user = new User();
        if (isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "" && $_SESSION["auth_role"] == "admin") {

            $rulesData = $user->all("rulespage");

            $settings = $user->settings();
            $compact = [
                "rulesData" => $rulesData,
                "settings" => $settings
            ];

            return view("Backend/Admin/Static/clubRules.php", compact("compact"));

        } else {

        }
    }

    public function insertRules()
    {

        $user = new User();
        $data = [
            "description" => $_POST["description"]
        ];


        if (isBlank($data)) {
            $_SESSION["error_message"] = "Field is required";
            redirects("/admin/facultylaw");
        } else {
            $sql = "SELECT * FROM rulespage";
            $stmt = $user->execute($sql);
            $aboutData = $stmt->fetchAll();

            if ($stmt->rowCount() <= 0) {
                // Insert
                $sql = "INSERT INTO rulespage (`description`) VALUES (:description)";

                $run = $user->insert($sql, $data); // $run = 1 or 0
                if ($run) {
                    $_SESSION["success_message"] = "Rules inserted";
                } else {
                    $_SESSION["error_message"] = "Something going wrong!";
                }
                redirects("/admin/facultylaw");
            } else {
                $sql = "UPDATE rulespage SET description = :description";
                $user->updateTable($sql, $data);
                $_SESSION["success_message"] = "Rules Updated";
                redirects("/admin/facultylaw");
            }
        }
    }

}