document.addEventListener("DOMContentLoaded", function () {
  console.log("Frontend script is working");

  // Exemple de fonction pour ajouter un produit au panier
  function addToCart(productId) {
    console.log(`Produit ${productId} ajouté au panier.`);
  }

  // Ajouter un événement pour tester l'ajout au panier
  document.querySelector(".add-to-cart").addEventListener("click", function () {
    addToCart(1);
  });
});
