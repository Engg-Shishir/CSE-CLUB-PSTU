<?php


namespace App\Controllers\Admin;

use App\model\User;

class AdminBlogController
{


    public function categoryshow()
    {
        $user = new User();
        if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {

            $blogCategory = $user->all("blog_categories");


        }
        $settings = $user->settings();
        $compact = [
            "blogCategory" => $blogCategory,
            "settings" => $settings
        ];


        return view("Backend/Admin/Blog/blogCategory.php", compact("compact"));
    }

    public function BlogManage()
    {
        $user = new User();
        if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] !== "") {
            $sql = "SELECT ud.name AS uname,
                           ud.image AS uimage,
                           ud.user_id AS uid,
                           bc.name AS bcname,
                           b.* FROM blogs AS b
                    INNER JOIN user_details AS ud ON ud.user_id=b.user_id
                    INNER JOIN blog_categories AS bc ON bc.category_id=b.category_id";

            $stmt = $user->execute($sql);
            $blog = $stmt->fetchAll();
        }

        $settings = $user->settings();
        $compact = [
            "blog" => $blog,
            "settings" => $settings
        ];


        return view("Backend/Admin/Blog/blog.php", compact("compact"));
    }







    public function deleteCollege($code)
    {
        $objs = new User();
        $res = $objs->delete("colleges", "college_code", $code);
        $_SESSION["success_message"] = "College Delete Successfully";
        redirects("/admin/college");
    }



    public function blogcategoryInsert()
    {
        $data = [
            "name" => $_POST["name"],
            "description" => $_POST["description"]
        ];

        if (isBlank($data)) {
            $_SESSION["error_message"] = "All field required";
            redirects("/admin/blogcategory");
        } else {

            $user = new User();
            if ($user->exists("blog_categories", "name", $_POST["name"])) {
                $_SESSION["error_message"] = "Category alredy exists";
                redirects("/admin/blogcategory");
            }

            $data += ["category_slug" => slug($_POST["name"])];


            $sql = "INSERT INTO blog_categories (`name`,`description`,`category_slug`) VALUES (:name,:description,:category_slug)";

            $run = $user->insert($sql, $data); // $run = 1 or 0
            if ($run) {
                $_SESSION["success_message"] = "CAtegory Inserted";
            } else {
                $_SESSION["error_message"] = "Something going wrong!";
            }

            redirects("/admin/blogcategory");

        }



    }


    public function BlogStatus($id)
    {

        $objs = new User();
        $fetch = $objs->byId("blogs", "blog_id", $id);

        if ($fetch["blog_status"] == 1) {
            $blog_status = 0;
        } else {
            $blog_status = 1;
        }

        $DB = new User();
        $sql = "UPDATE blogs set blog_status=:blog_status WHERE blog_id=:blog_id";
        $data = ["blog_status" => $blog_status, "blog_id" => $id];
        // unlinkFile("assets/Upload/Partners/".$fetch["image"]);
        // $res = $objs->delete("collaborators", "colla_id", $id);
        $DB->updateTable($sql, $data);
        $_SESSION["success_message"] = "Blog Updated";
        redirects("/admin/blog");
    }





}