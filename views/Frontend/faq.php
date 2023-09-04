<?php
if (count($faqs) > 0) {
    ?>
    <div class="row faq-row">
        <h2>FREQUENTLY ASKED QUESTIONS</h2>
        <div class="accordion-row">
            <?php
            foreach ($faqs as $key => $value) {
                ?>
                <div class="accordion accordion-<?= $key + 1 ?>">
                    <div class="question" onclick="toggleFaq(<?= $key + 1 ?>)">
                        <h3>
                            <?= $value["question"] ?>
                        </h3>
                        <i class="fa-solid fa-angle-down fa-angle-down-<?= $key + 1 ?>"></i>
                    </div>
                    <div class="answer answer<?= $key + 1 ?>">
                        <P>
                            <?= $value["ans"] ?>
                        </P>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
    </div>
    <?php
}
?>