<?php
// Insert a review
function insertReview($clientId, $reviewText, $invId)
{
    $db = phpmotorsConnect();
    $sql = "INSERT INTO reviews (clientId, reviewText, invId) VALUES (:clientId, :reviewText, :invId)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
// Get reviews for a specific inventory item
function getReviewsByInv($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewText, r.reviewDate, c.clientFirstname, c.clientLastname FROM reviews  AS r 
    INNER JOIN inventory AS i ON i.invId = r.invId 
    INNER JOIN clients as c ON c.clientId = r.clientId
    WHERE r.invId = :invId 
    ORDER BY r.reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
// Get reviews written by a specific client
function getReviewsByClient($clientId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewDate, c.clientFirstname, c.clientLastname, i.invMake, i.invModel FROM clients AS c 
    INNER JOIN reviews as r ON c.clientId = r.clientId
    INNER JOIN inventory AS i ON i.invId = r.invId 
    WHERE c.clientId = :clientId ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
// Get a specific review
function getReview($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT review.reviewId, review.reviewText, review.reviewDate, review.invId, review.clientId, 
    client.clientFirstname, client.clientLastname FROM reviews review INNER JOIN clients client ON 
    client.clientId = review.clientId WHERE review.reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}
// Update a specific review
function updateReview($reviewText, $reviewId)
{
    $db = phpmotorsConnect();
    $sql = "UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $updatedInf = $stmt->rowCount();
    $stmt->closeCursor();
    return $updatedInf;
}
// Delete a specific review
function deleteReview($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
