
<?php
$questions = $submission['question_data'] ?? [];

if (is_string($questions)) {
    $questions = json_decode($questions, true) ?? [];
}

if (!is_array($questions)) {
    $questions = [];
}

$mlaName = $submission['mla_name'] ?? 'MLA';
$constituency = $submission['constituency'] ?? 'N/A';
$overallRating = $submission['overall_rating'] ?? 0;
$manifestoFulfilled = $submission['manifesto_fulfilled'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MLA Rating Report - <?= esc($mlaName) ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px 15px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: #382344;
            color: white;
            padding: 28px;
            border-radius: 12px;
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 8px #00000010;
        }

        .summary-card h2 {
            color: #382344;
            margin: 8px 0;
        }

        .question-card {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #00000010;
        }

        .topic {
            color: #9aae78;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .question {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .answer {
            background: #f5f5f5;
            padding: 10px 12px;
            border-radius: 6px;
            margin: 7px 0;
        }

        .comment {
            margin-top: 12px;
            padding: 12px;
            background: #fffaf0;
            border-left: 4px solid #9aae78;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            color: #777;
            margin-top: 25px;
        }

        @media(max-width: 600px) {
            .summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>MLA Rating Report</h1>
        <p>Publicly Shared Rating Submission</p>
        <h2><?= esc($mlaName) ?></h2>
        <p>Constituency: <?= esc($constituency) ?></p>
        <small>Submission ID: #<?= esc($submission['id'] ?? '') ?></small>
    </div>

    <div class="summary">

        <div class="summary-card">
            <div>Overall Rating</div>
            <h2><?= esc($overallRating) ?> / 5</h2>
        </div>

        <div class="summary-card">
            <div>Manifesto Fulfilled</div>
            <h2><?= esc($manifestoFulfilled) ?>%</h2>
        </div>

    </div>

    <h2>Submitted Answers</h2>

    <?php if (empty($questions)): ?>

        <div class="question-card">
            No question answers found.
        </div>

    <?php else: ?>

        <?php foreach ($questions as $index => $item): ?>

            <div class="question-card">

                <div class="topic">
                    <?= esc($item['topic'] ?? 'Question ' . ($index + 1)) ?>
                </div>

                <div class="question">
                    <?= esc($item['question'] ?? '') ?>
                </div>

                <?php
                $answers = $item['selected_answers'] ?? [];

                if (is_array($answers) && !empty($answers)):
                    foreach ($answers as $answer):
                ?>

                    <div class="answer">
                        <?php
                        if (is_array($answer)) {
                            echo esc($answer['answer'] ?? $answer['value'] ?? '');
                        } else {
                            echo esc($answer);
                        }
                        ?>
                    </div>

                <?php
                    endforeach;
                endif;
                ?>

                <?php if (!empty($item['other_answer'])): ?>
                    <div class="answer">
                        <strong>Other Answer:</strong>
                        <?= esc($item['other_answer']) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($item['custom_message'])): ?>
                    <div class="comment">
                        <strong>Comment:</strong><br>
                        <?= nl2br(esc($item['custom_message'])) ?>
                    </div>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

    <div class="footer">
        <p>MLA Monitoring System</p>
        <p>This report is shared for public viewing.</p>
    </div>

</div>

</body>
</html>
