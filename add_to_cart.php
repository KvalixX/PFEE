<?php
session_start();

// Vérifiez si l'ID est passé et est valide
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['id']) && is_numeric($data['id'])) {
    $productId = (int)$data['id'];

    // Vérifiez si le panier existe dans la session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Ajoutez le produit au panier (incrémenter si déjà présent)
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // Exemple d'ajout d'un produit avec des détails
        $_SESSION['cart'][$productId] = [
            'id' => $productId,
            'quantity' => 1
        ];
    }

    // Réponse JSON de succès
    echo json_encode(['success' => true]);
} else {
    // Réponse JSON en cas d'erreur
    echo json_encode(['success' => false, 'message' => 'ID produit invalide.']);
}
