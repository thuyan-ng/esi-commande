describe('All categories', () => {
    it('Checks if all categories are displayed', () => {
        cy.visit('localhost:8000/categories')

        cy.contains('Nom : Ecran')
        cy.contains('Nom : Clavier')
        cy.contains('Nom : Souris')
        cy.contains('Nom : Ordinateur')
    })

    it('Checks if all categories are clickable', () => {
        cy.get("#categorie1").click()
        cy.visit('http://localhost:8000/showProductsInCategorie/1')
        cy.contains('Liste des produits de la catégorie Ecran')

        cy.visit('localhost:8000/categories')
        cy.get("#categorie2").click()
        cy.visit('http://localhost:8000/showProductsInCategorie/2')
        cy.contains('Liste des produits de la catégorie Clavier')

        cy.visit('localhost:8000/categories')
        cy.get("#categorie3").click()
        cy.visit('http://localhost:8000/showProductsInCategorie/3')
        cy.contains('Liste des produits de la catégorie Souris')

        cy.visit('localhost:8000/categories')
        cy.get("#categorie4").click()
        cy.visit('http://localhost:8000/showProductsInCategorie/4')
        cy.contains('Liste des produits de la catégorie Ordinateur')
    })
})
