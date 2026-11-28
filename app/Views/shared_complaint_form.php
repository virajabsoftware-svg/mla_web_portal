
<?php
$complaint = $complaint ?? [];
$attachments = $attachments ?? [];
$mlaName = $mlaName ?? 'Not Assigned';

$complaintTitle = $complaint['title'] ?? 'Complaint';
$complaintId = $complaint['complaint_id'] ?? ($complaint['id'] ?? 'N/A');
$priority = $complaint['priority'] ?? 'Medium';
$status = $complaint['status'] ?? 'Pending';
$location = $complaint['location'] ?? 'Not Available';
$description = $complaint['description'] ?? 'No description available';
$district = $complaint['district_name'] ?? 'Not Available';
$constituency = $complaint['constituency_name'] ?? 'Not Available';
$createdAt = $complaint['created_at'] ?? null;

$shareUrl = current_url();
$shareText = 'Complaint: ' . $complaintTitle .
    ' | Complaint ID: ' . $complaintId .
    ' | Status: ' . $status .
    ' | View details: ' . $shareUrl;

$priorityClass = strtolower($priority);
$statusClass = strtolower(str_replace(' ', '-', $status));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($complaintTitle) ?> | Complaint Report</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f1;
            color: #263126;
            min-height: 100vh;
            padding: 30px 15px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: linear-gradient(135deg, #536d2b, #7f9d43);
            color: #fff;
            padding: 30px;
            border-radius: 18px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            opacity: .9;
            line-height: 1.6;
        }

        .report-card {
            background: #fff;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0,0,0,.05);
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 22px;
            color: #536d2b;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .complaint-heading {
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #263126;
            overflow-wrap: anywhere;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-item {
            padding: 15px;
            background: #f8faf5;
            border: 1px solid #edf1e7;
            border-radius: 12px;
            min-width: 0;
        }

        .detail-label {
            font-size: 12px;
            font-weight: 700;
            color: #829078;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: .5px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: #303c2d;
            overflow-wrap: anywhere;
        }

        .description {
            line-height: 1.8;
            font-size: 14px;
            color: #566052;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .badge {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            background: #edf2e5;
            color: #536d2b;
        }

        .priority-high,
        .priority-urgent {
            background: #fff0ed;
            color: #c0392b;
        }

        .priority-medium {
            background: #fff7e5;
            color: #a66a00;
        }

        .priority-low {
            background: #eaf5ec;
            color: #287b42;
        }

        .status-resolved,
        .status-completed {
            background: #e7f6eb;
            color: #238044;
        }

        .status-pending,
        .status-in-progress {
            background: #fff5df;
            color: #a66a00;
        }

        .status-escalated,
        .status-rejected {
            background: #ffeded;
            color: #bd3535;
        }

        .attachments {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .attachment img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e8ece3;
        }

        .attachment a {
            display: block;
            margin-top: 7px;
            font-size: 12px;
            color: #536d2b;
            text-decoration: none;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .share-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 13px 18px;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            opacity: .9;
        }

        .whatsapp { background: #25D366; }
        .facebook { background: #1877F2; }
        .telegram { background: #229ED9; }
        .twitter { background: #141414; }
        .copy { background: #536d2b; }
        .native { background: #64748b; }

        .footer {
            text-align: center;
            color: #879080;
            font-size: 12px;
            padding: 15px;
        }

        @media(max-width: 600px) {
            body { padding: 15px 10px; }

            .header, .report-card {
                padding: 20px;
                border-radius: 14px;
            }

            .header h1 { font-size: 22px; }
            .complaint-heading { font-size: 19px; }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .share-btn {
                flex: 1 1 calc(50% - 10px);
                padding: 12px 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1><i class="fa-solid fa-shield-halved"></i> Public Complaint Report</h1>
        <p>Complaint information shared through the MLA Monitoring System.</p>
    </div>

    <div class="report-card">

        <div class="section-title">
            <i class="fa-solid fa-file-circle-exclamation"></i>
            Complaint Details
        </div>

        <h2 class="complaint-heading"><?= esc($complaintTitle) ?></h2>

        <div class="details-grid">

            <div class="detail-item">
                <div class="detail-label">Complaint ID</div>
                <div class="detail-value">#<?= esc($complaintId) ?></div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Status</div>
                <div class="detail-value">
                    <span class="badge status-<?= esc($statusClass) ?>">
                        <?= esc($status) ?>
                    </span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Priority</div>
                <div class="detail-value">
                    <span class="badge priority-<?= esc($priorityClass) ?>">
                        <?= esc($priority) ?>
                    </span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Location</div>
                <div class="detail-value"><?= esc($location) ?></div>
            </div>

            <div class="detail-item">
                <div class="detail-label">District</div>
                <div class="detail-value"><?= esc($district) ?></div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Constituency</div>
                <div class="detail-value"><?= esc($constituency) ?></div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Assigned MLA</div>
                <div class="detail-value"><?= esc($mlaName) ?></div>
            </div>

            <?php if (!empty($createdAt)): ?>
                <div class="detail-item">
                    <div class="detail-label">Submitted Date</div>
                    <div class="detail-value">
                        <?= esc(date('d M Y, h:i A', strtotime($createdAt))) ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <div class="report-card">
        <div class="section-title">
            <i class="fa-solid fa-align-left"></i>
            Complaint Description
        </div>

        <p class="description"><?= esc($description) ?></p>
    </div>

    <?php if (!empty($attachments)): ?>
        <div class="report-card">
            <div class="section-title">
                <i class="fa-solid fa-paperclip"></i>
                Attached Evidence
            </div>

            <div class="attachments">
                <?php foreach ($attachments as $file): ?>
                    <?php
                    $fileUrl = base_url('uploads/complaint/' . rawurlencode(basename($file)));
                    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    ?>

                    <div class="attachment">
                        <?php if ($isImage): ?>
                            <a href="<?= esc($fileUrl) ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?= esc($fileUrl) ?>" alt="Complaint attachment">
                            </a>
                        <?php endif; ?>

                        <a href="<?= esc($fileUrl) ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa-solid fa-download"></i>
                            View Attachment
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="report-card">
        <div class="section-title">
            <i class="fa-solid fa-share-nodes"></i>
            Share Complaint
        </div>

        <p style="font-size:14px;color:#687363;line-height:1.7;margin-bottom:20px;">
            Share this complaint report with others using the options below.
        </p>

        <div class="share-buttons">

            <a class="share-btn whatsapp"
               href="https://wa.me/?text=<?= rawurlencode($shareText) ?>"
               target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp
            </a>

            <a class="share-btn facebook"
               href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode($shareUrl) ?>"
               target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-facebook-f"></i> Facebook
            </a>

            <a class="share-btn telegram"
               href="https://t.me/share/url?url=<?= rawurlencode($shareUrl) ?>&text=<?= rawurlencode($shareText) ?>"
               target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-telegram"></i> Telegram
            </a>

            <a class="share-btn twitter"
               href="https://twitter.com/intent/tweet?text=<?= rawurlencode($shareText) ?>"
               target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-x-twitter"></i> X
            </a>

            <button type="button" class="share-btn copy" onclick="copyComplaintLink()">
                <i class="fa-solid fa-link"></i> Copy Link
            </button>

            <button type="button" class="share-btn native" id="nativeShareBtn">
                <i class="fa-solid fa-share"></i> More
            </button>

        </div>
    </div>

    <div class="footer">
        <p>MLA Monitoring System | Public Complaint Report</p>
    </div>

</div>

<script>
    const complaintShareUrl = <?= json_encode($shareUrl) ?>;
    const complaintShareText = <?= json_encode($shareText) ?>;

    async function copyComplaintLink() {
        try {
            await navigator.clipboard.writeText(complaintShareUrl);
            alert('Complaint link copied successfully!');
        } catch (error) {
            const input = document.createElement('textarea');
            input.value = complaintShareUrl;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            input.remove();
            alert('Complaint link copied successfully!');
        }
    }

    document.getElementById('nativeShareBtn').addEventListener('click', async function () {
        if (navigator.share) {
            try {
                await navigator.share({
                    title: 'Complaint Report',
                    text: complaintShareText,
                    url: complaintShareUrl
                });
            } catch (error) {
                if (error.name !== 'AbortError') {
                    alert('Unable to share this report.');
                }
            }
        } else {
            copyComplaintLink();
        }
    });
</script>

</body>
</html>
