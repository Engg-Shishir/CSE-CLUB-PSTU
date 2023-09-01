<div class="row blog-row">
    <div class="blog-card primary">
        <div class="top">
            <h1>Articles</h1>
            <p>Get updated with our latest software development news and events</p>
            <br>
            <a href="<?= url("/blog") ?>" class="discover">Discover more &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>

    <?php
    foreach ($blog as $key => $value) { ?>
        <div class="blog-card">
            <div class="top">
                <div class="topbox">
                    <img class="banner"
                        src="<?= assets("Upload/Blog/".$value["banner"]) ?>"/>
                    <img class="profile"
                        src="<?= assets("Upload/Users/".$value["uimage"]) ?>" />
                </div>
            </div>
            <div class="bottom-box">
                <div class="box1">
                    <a href="<?= url("/blog/category/".$value["bcslug"]) ?>" class="title">  <?= $value["bcname"] ?> :&nbsp;</a>
                    <a href="<?= url("/blog/".$value["blog_slug"]) ?>" class="link"><?= $value["title"] ?></a>
                </div>
                <div class="box2">
                    <a href="<?= url("/blog/author/".$value["uslug"]) ?>"><span>By</span><?= $value["uname"] ?></a>
                </div>
            </div>
        </div>
    <?php }
    ?>

</div>