<h1>Create Article</h1>
<form method="post" action="/article/store">
    <input type="text" name="ref" placeholder="Reference" required>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="number" step="0.01" name="prixUnitaire" placeholder="Prix Unitaire" required>
    <input type="number" name="qte" placeholder="Quantité" required>
    <button type="submit">Save</button>
</form>
