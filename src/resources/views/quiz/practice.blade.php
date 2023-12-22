<div class="quiz_block">
                    <ul class="quiz_block_answer" id="quiz_block_answer">
                        @foreach ($question['choices'] as $choice) : ?>
                            <li>
                                <button class="quiz_block_answer_button" data-id="<?=($choice["question_id"]) ?>"  data-answer="<?= ($choice['valid']) ?>">
                                    <?= $choice["name"]; ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="quiz_false">
                    <h2 class="quiz_false_result">
                        不正解...
                    </h2>
                    <div class="quiz_false_block">
                        <div class="quiz_false_block_font">
                            A
                        </div>
                        <p class="quiz_false_block_text">
                            <?php foreach ($question['choices'] as $choice) : ?>
                                <?php if ($choice["valid"] === 1) : ?>
                                    <?= $choice["name"]; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
                <div class="quiz_right">
                    <h2 class="quiz_right_result quiz_false_result">
                        正解 !
                    </h2>
                    <div class="quiz_false_block">
                        <div class="quiz_false_block_font">
                            A
                        </div>
                        <p class="quiz_false_block_text">
                            <?php foreach ($question['choices'] as $choice) : ?>
                                <?php if ($choice["valid"] === 1) : ?>
                                    <?= $choice["name"]; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
                <?php if ($question["supplement"] != null) : ?>
                    <div class="quiz_cite"><?= $question["supplement"]; ?></div>
                <?php endif; ?>
                </div>