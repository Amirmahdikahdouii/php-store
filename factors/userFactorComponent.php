<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_login'])) {
    header("Location: /php-store/Accounts/login.php");
}
$userID = intval($_SESSION['user_id']);
?>
<div class="main-section-content-container" id="main-section-content-container-factors">
    <h1 class="main-section-content-title">Factors</h1>
    <div class="factors-container">
        <div class="factor-item">
            <div class="factor-item-header">
                <h3 class="factor-item-title">Factor Item 1</h3>
                <div class="factor-item-date-container">
                    <span class="factor-item-date">2021/02/01</span>
                    <span class="factor-item-menu-botton factor-item-menu-botton-open">&#x2304;</span>
                    <span class="factor-item-menu-botton factor-item-menu-botton-close">&#10005;</span>
                </div>
            </div>
            <div class="factor-item-according-container">
                <div class="factor-item-according-line">
                    <span class="factor-item-according-line-title">Date</span>
                    <span class="factor-item-according-line-value">2021/02/01</span>
                </div>
                <div class="factor-item-according-line">
                    <span class="factor-item-according-line-title">Payment Date</span>
                    <span class="factor-item-according-line-value">2021/02/01</span>
                </div>
                <div class="factor-item-according-line">
                    <span class="factor-item-according-line-title">Count</span>
                    <span class="factor-item-according-line-value">3</span>
                </div>
                <div class="factor-item-according-line">
                    <span class="factor-item-according-line-title">Price</span>
                    <span class="factor-item-according-line-value">25.00 $</span>
                </div>
                <div class="factor-item-according-line">
                    <span class="factor-item-according-line-title">Received</span>
                    <span class="factor-item-according-line-value">&#10004;</span>
                </div>
                <div class="more-detail-bottom-container center">
                    <a class="more-detail-bottom" href="#">More Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>