<?php


namespace App\Controllers;

use App\model\User;

session_start();
class BlogController
{

    public function blogview($title)
    {

        $user = new User();

        /**
         * Query for Admin 
         * Describe : Admin can view any blog that are avilable in database, 
         */
        $BlogSql = "SELECT ud.name AS uname,
                            ud.image AS uimage,
                            ud.user_id AS uid,
                            bc.name AS bcname,
                            b.* FROM blogs AS b
                    INNER JOIN user_details AS ud ON ud.user_id=b.user_id
                    INNER JOIN blog_categories AS bc ON bc.category_id=b.category_id
                    WHERE b.blog_slug=?";
        if (isset($_SESSION["auth_role"]) && $_SESSION["auth_role"] == "admin") {
        }else{
            
            /**
             * Query for general user
             * Describe : Only active blog can view general user
             */
            $BlogSql .= " AND b.blog_status=1";
        }

        $stmt = $user->execute($BlogSql, [$title]);
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

}