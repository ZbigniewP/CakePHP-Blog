<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
// alert-warning
?>
<div class="message error alert-danger alert text-center" onclick="this.classList.add('hidden')"><?= $message ?></div>
