<?php


namespace App\Controllers\Auth;

use App\model\User;

class AuthBlogController
{

    public function blogview($title)
    {

        $user = new User();

        /**
         * Query for Admin 
         * Describe : Admin can view any blog that are avilable in database, 
         */
        $sql = "SELECT ud.name AS uname,
                        ud.image AS uimage,
                        ud.user_id AS uid,
                        bc.name AS bcname,
                        b.* FROM blogs AS b
                INNER JOIN user_details AS ud ON ud.user_id=b.user_id
                INNER JOIN blog_categories AS bc ON bc.category_id=b.category_id
                WHERE b.blog_slug=?";

        if (!isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] !== "admin") {
            /**
             * Query for general user
             * Describe : Only active blog can view general user
             */
            $sql .= " AND b.blog_status=1";
        }

        $stmt = $user->execute($sql, [$title]);
        $blog = $stmt->fetchAll();
        $row = $stmt->rowCount();

        /**
         * If no record found for avobe query return back into home page
         * 
        */
        if ($row <= 0) {
            redirects("/");
        }

        $sql = "SELECT settings.*,ca.title AS carTitle,ca.slug AS carSlug
        FROM settings
        LEFT JOIN carnivals AS ca
        ON settings.nav_carnival_id = ca.carnival_id";
        $stmt = $user->execute($sql);
        $settings = $stmt->fetchAll();

        $user = new User();
        $sql = "SELECT c.title,c.slug FROM carnivals AS c WHERE status=1";
        $stmt = $user->execute($sql);
        $carnivals = $stmt->fetchAll();


        $blogCategory = $user->all("blog_categories");


        $sql = "SELECT  b.title AS blogtitle,b.blog_slug FROM blogs AS b
                INNER JOIN user_details AS ud ON ud.user_id=b.user_id";
        $stmt = $user->execute($sql);
        $authorBlog = $stmt->fetchAll();

        $compact = [
            "blog" => $blog,
            "settings" => $settings,
            "carnivals" => $carnivals,
            "blogCategory" => $blogCategory,
            "authorBlog" => $authorBlog

        ];

        return view("Frontend/Blog/blogview.php", compact("compact"));
    }

    public function blogInsertPage()
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


        return view("Backend/Admin/Blog/blogInsert.php", compact("compact"));
    }


    public function blogInsert()
    {
        $imageDetails = fileDetails($_FILES, "banner");
        $data = [
            "title" => $_POST["title"],
            "details" => $_POST["details"],
            "category_id" => $_POST["category_id"],
            "banner" => $imageDetails["fname"]
        ];

        if(intval($_POST["read_time"]) <= 0){
            $_SESSION["error_message"] = "Blog reading time is not insert";
            redirects("/blogInsert");
        }

        if (isBlank($data)) {
            $_SESSION["error_message"] = "All field required";
            redirects("/blogInsert");
        } else {

            $slug = slug($_POST["title"]);
            $user = new User();
            if ($user->exists("blogs", "title", $_POST["title"])) {
                $_SESSION["error_message"] = "Blog Title alredy exists";
                redirects("/blogInsert");
            }

            $NewFileName = $slug . "." . $imageDetails["fext"];
            $data["banner"] = $NewFileName;
            $data += ["blog_slug" => $slug];
            $data += ["user_id" => $_SESSION['auth_id']];
            $data += ["read_time" => intval($_POST["read_time"])];

            $imgExtArray = ["jpg", "png", "svg"];
            foreach ($imgExtArray as $key => $value) {
                unlinkFile("assets/Upload/Blog/" . $slug . "." . $value);
            }
            fileStore($imageDetails["source"], "assets/Upload/Blog/" . $NewFileName);


            $sql = "INSERT INTO blogs (`title`,`details`,`blog_slug`,`category_id`,`banner`,`user_id`,`read_time`)
                            VALUES (:title,:details,:blog_slug,:category_id,:banner,:user_id,:read_time)";

            $run = $user->insert($sql, $data); // $run = 1 or 0
            if ($run) {
                $_SESSION["success_message"] = "Blog Crereated";
            } else {
                $_SESSION["error_message"] = "Something going wrong!";
            }

            redirects("/blogInsert");

        }



    }

}