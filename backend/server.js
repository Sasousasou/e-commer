const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const productRoutes = require("./routes/productRoutes");
const mongoose = require("mongoose");

// Middleware
app.use(bodyParser.json());

// Routes
app.use("/api/products", productRoutes);

// Démarrer le serveur
const port = 5000;
app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
