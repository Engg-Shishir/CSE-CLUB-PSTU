<?php


namespace App\Controllers\Admin;

use App\model\User;

class ClubActivityController
{

    public function clubactivity()
    {

        $user = new User();
        if (isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "" && $_SESSION["auth_role"] == "admin") {

            $activityData = $user->all("activity");

            $settings = $user->settings();
            $compact = [
                "activityData" => $activityData,
                "settings" => $settings
            ];

            return view("Backend/Admin/Activity/clubactivity.php", compact("compact"));

        } else {
            $_SESSION["error_message"] = "who are you??";
            redirects("/login");
        }
    }

    public function insertActivity()
    {

        $user = new User();
        $imageDetails = fileDetails($_FILES, "image");
        $data = [
            "image" => $imageDetails["fname"],
            "event_name" => $_POST["event_name"],
            "description" => $_POST["description"],
            "year" => $_POST["year"]
        ];



        if (isBlank($data)) {
            $_SESSION["error_message"] = "Alll field is required";
            redirects("/admin/clubactivity");
        } else {
            if (!isImage($imageDetails["fext"])) {
                $_SESSION["error_message"] = "Wrong file selected !";
                redirects("/admin/clubactivity");
            } else {
                $slug = slug($_POST["event_name"]);
                $bannerName = $slug . "." . $imageDetails["fext"];
                $data["image"] = $bannerName;


                $sql = "SELECT * FROM activity WHERE event_name=?";
                $stmt = $user->execute($sql, [$_POST["event_name"]]);
                $isFind = $stmt->fetchAll();

                if ($stmt->rowCount() <= 0) {
                    // Insert
                    fileStore($imageDetails["source"], "assets/Upload/ClubActivity/" . $bannerName);

                    $sql = "INSERT INTO activity (`image`,`event_name`,`description`,`year`) 
                                               VALUES (:image,:event_name,:description,:year)";

                    $run = $user->insert($sql, $data); // $run = 1 or 0
                    if ($run) {
                        $_SESSION["success_message"] = "Activity inserted";
                    } else {
                        $_SESSION["error_message"] = "Something going wrong!";
                    }
                    redirects("/admin/clubactivity");
                } else {
                    $_SESSION["success_message"] = "Title Already exist";
                    redirects("/admin/clubactivity");
                }
            }
        }
    }

}