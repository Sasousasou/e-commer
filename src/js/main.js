const products = [
    { name: "Produit 1", img: "img/img1.jpg" },
    { name: "Produit 2", img: "img/img2.jpg" },
  ];
  
  function displayProduct(productIndex) {
    if (productIndex >= 0 && productIndex < products.length) {
      const product = products[productIndex];
  
      const imgElement = document.getElementById("productImage");
      const nameElement = document.getElementById("productName");
  
      imgElement.src = "src/mg/img1.jpg" + img1.jpg.img; // Mettre le chemin de l'image avec src/img/
      imgElement.alt = product.name; // Mettre le nom du produit
      nameElement.innerText = product.name; // Mettre le nom du produit dans le h2
    } else {
      console.error("Produit non valide.");
    }
  }
  
  // Affiche un produit au hasard (par exemple, le premier produit)
  displayProduct(0); // Change l'index pour afficher un autre produit (1 pour afficher le deuxième produit)
  