<?php


namespace App\Controllers\Admin;

use App\model\User;

class BlogController
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

    public function blogshow()
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

    public function blogview($title)
    {
        $user = new User();
        $sql = "SELECT ud.name AS uname,
                       ud.image AS uimage,
                       ud.user_id AS uid,
                       bc.name AS bcname,
                       b.* FROM blogs AS b
                INNER JOIN user_details AS ud ON ud.user_id=b.user_id
                INNER JOIN blog_categories AS bc ON bc.category_id=b.category_id
                WHERE b.blog_slug=?";

        $stmt = $user->execute($sql,[$title]);
        $blog = $stmt->fetchAll();

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
            "blogCategory" =>$blogCategory,
            "authorBlog" => $authorBlog

        ];

        // parray($compact);

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

    public function blogInsert()
    {
        $imageDetails = fileDetails($_FILES, "banner");
        $data = [
            "title" => $_POST["title"],
            "details" => $_POST["details"],
            "category_id" => $_POST["category_id"],
            "banner" => $imageDetails["fname"]
        ];

        if (isBlank($data)) {
            $_SESSION["error_message"] = "All field required";
            redirects("/admin/blogInsert");
        } else {

            $slug = slug($_POST["title"]);
            $user = new User();
            if ($user->exists("blogs", "title", $_POST["title"])) {
                $_SESSION["error_message"] = "Blog Title alredy exists";
                redirects("/admin/blogInsert");
            }

            $NewFileName = $slug . "." . $imageDetails["fext"];
            $data["banner"] = $NewFileName;
            $data += ["blog_slug" => $slug];
            $data += ["user_id" => $_SESSION['auth_id']];

            $imgExtArray = ["jpg", "png", "svg"];
            foreach ($imgExtArray as $key => $value) {
                unlinkFile("assets/Upload/Blog/" . $slug . "." . $value);
            }
            fileStore($imageDetails["source"], "assets/Upload/Blog/" . $NewFileName);


            $sql = "INSERT INTO blogs (`title`,`details`,`blog_slug`,`category_id`,`banner`,`user_id`)
                              VALUES (:title,:details,:blog_slug,:category_id,:banner,:user_id)";

            $run = $user->insert($sql, $data); // $run = 1 or 0
            if ($run) {
                $_SESSION["success_message"] = "Blog Crereated";
            } else {
                $_SESSION["error_message"] = "Something going wrong!";
            }

            redirects("/admin/blogInsert");

        }



    }



}