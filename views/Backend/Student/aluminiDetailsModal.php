<div class="modal fade" data-backdrop="static" id="Alumini_details_Modal" tabindex="-1"
    aria-labelledby="projectAddModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div id="main"
                    style="margin: 0 !important; margin-top: 80px !important; display: flex; align-items: center; justify-content: center;">
                    <div style="width: 1000px; height: 500px;">
                        <div style="width: 100%; display: flex;">
                            <div
                                style="flex: 0 0 40%; max-width: 40%; width: 40%; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                                <img src="<?= assets("Upload/Users/25.jpg") ?>" alt=""
                                    style="height: 200px; width: 50%; border:3px solid #f1f1f1;">
                                <p style="font-size: 22px; font-weight: 600; margin-top: 5px;">
                                    Shishir
                                </p>
                                <div
                                    style="width: 100%; display: flex; align-items: center; justify-content: center; -moz-column-gap: 15px; column-gap: 15px;">
                                    <a href="" style="text-decoration: none;"><i class="fa-brands fa-linkedin"
                                            style="font-size: 26px;"></i></a>
                                    <a href="" style="text-decoration: none;"><i class="fa-brands fa-square-facebook"
                                            style="font-size: 26px;"></i></a>
                                    <a href="" style="text-decoration: none;"><i class="fa-brands fa-square-github"
                                            style="font-size: 26px;"></i></a>
                                </div>
                            </div>
                            <div style="flex: 0 0 60%; max-width: 60%; width: 60%;">
                                <div style="width: 100%; padding: 10px;">
                                    <div
                                        style="color: rgb(180, 3, 3); font-size: 20px; font-weight: 900; margin: 5px 0px 5px 0px; position: relative;">
                                        Education
                                    </div>
                                    <span style="font-size :16px;font-weight :600;">College : </span>
                                    <span style="font-size :15px;font-weight :500;">
                                    </span>
                                    <br>
                                    <span style="font-size :16px;font-weight :600;">Department : </span>
                                    <span style="font-size :15px;font-weight :500;">
                                    </span>
                                    <br>
                                    <?php if (isset($data["job_title"]) && $data["job_title"] !== "") { ?>
                                        <span style="font-size :16px;font-weight :600;">Position : </span>
                                        <span style="font-size :15px;font-weight :500;">
                                        </span>
                                        <br>
                                        <span style="font-size :15px;font-weight :500;">
                                        </span>
                                    <?php } ?>
                                </div>
                                <div style="width :100%;padding :10px;">
                                    <div style="color :rgb(180,3,3);font-size :20px;font-weight :900;margin :5px 0px;">
                                        Others
                                    </div>
                                    <span style="font-size :16px;font-weight :600;">Country :</span>
                                    <span style="font-size :15px;font-weight :500;">
                                    </span><br>
                                    <span style="font-size :16px;font-weight :600;">Email :</span>
                                    <span style="font-size :15px;font-weight :500;">
                                    </span><br>
                                    <span style="font-size :16px;font-weight :600;">Birt Date :</span>
                                    <span style="font-size :15px;font-weight :500;">
                                    </span><br>
                                    <span style="font-size :16px;font-weight :600;">Blood Group :</span>
                                    <span style="font-size :15px;font-weight :500;">
                                        <span style="font-size :16px;font-weight :600;">Print :</span>
                                        <a href="<?= url('/profile/print/') ?>"
                                            style="font-size: 16px; font-weight: 500; margin-top: 5px; color:green"><i
                                                class="fa-solid fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                        <div style="height :200px;width :100%;padding :20px;">
                            <div style="width :100%;padding :10px;">
                                <div style="color :rgb(180,3,3);font-size :20px;font-weight :900;margin :5px 0px;">
                                    About
                                </div>
                                <p
                                    style="font-size: 18px; font-family: 'Times New Roman', Times, serif; text-align: justify;">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>