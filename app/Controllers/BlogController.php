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
        } else {

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



    public function blogBypage($number=1){
        $user = new User();

        if(intval($number)<=0){
            redirects("/blog/page/1");
        }
        $_SESSION["page"]=$number;

        $page_first_result = (intval($number)-1) * 4;


        $sql = "SELECT  ud.name AS uname,
                        ud.user_slug AS uslug,
                        ud.image AS uimage,
                        ud.user_id AS uid,
                        bc.name AS bcname,
                        bc.category_slug AS bcslug,
                        b.* FROM blogs AS b
            INNER JOIN user_details AS ud ON ud.user_id=b.user_id
            INNER JOIN blog_categories AS bc ON bc.category_id=b.category_id 
            WHERE b.blog_status = 1
            ORDER BY blog_id DESC LIMIT ". $page_first_result . ','. 4;

        $stmt = $user->execute($sql);
        $blog = $stmt->fetchAll();


        $sql = "SELECT blog_id FROM blogs WHERE blog_status=?";
        $stmt = $user->execute($sql,[1]);
        $AllBlog =  $stmt->fetchAll();
        

        
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
        
        $compact = [
            "blog" => $blog,
            "AllBlog"=>$AllBlog,
            "settings" => $settings,
            "carnivals" => $carnivals,
            "blogCategory" => $blogCategory
        ];

        return view("Frontend/Blog/blog.php", compact("compact"));
    }

}