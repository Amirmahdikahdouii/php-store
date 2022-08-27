<?php
require_once "./authenticateUser.php";
require_once "../../settings/dbconfig.php";
$JSONResponse = ['title' => "", 'message' => '', 'status' => 0];
function returnResponse($title, $message, $status = 0)
{
    global $JSONResponse;
    $JSONResponse['title'] = $title;
    $JSONResponse['message'] = $message;
    $JSONResponse['status'] = $status;
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}

// Get data from post
if (!isset($_POST['data'])) {
    returnResponse("Error", "Data is not valid!");
}
$data = $_POST['data'];
$data = json_decode($data, TRUE);
$userID = intval($_SESSION['user_id']);
$commentID = intval($data['commentID']);
if ($userID < 1 or $commentID < 1) {
    returnResponse("Error", "Data Is Not Valid! $userID");
}
$sql = "SELECT * FROM product_comment_like WHERE comment_id='$commentID' AND user_id='$userID'";
$commentLikeExists = mysqli_query($db_connection, $sql);
$commentLikeExists = mysqli_fetch_assoc($commentLikeExists);
if ($commentLikeExists !== null) {
    $sql = "DELETE FROM product_comment_like WHERE comment_id='$commentID' AND user_id='$userID'";
    $deleteLikedComment = mysqli_query($db_connection, $sql);
    returnResponse("Warning", "Comment Status Updated!");
}
$sql = "INSERT INTO product_comment_like (user_id, comment_id) VALUES ('$userID', '$commentID')";
$likeComment = mysqli_query($db_connection, $sql);
returnResponse("Warning", "Comment Status Updated!", 1);
