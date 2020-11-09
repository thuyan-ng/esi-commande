describe('Navigation', () => {
  it('Cheks that all links in navbar workd', () => {
    cy.visit('localhost:8000')
    cy.get('nav').contains('Accueil').click()
    cy.visit('localhost:8000').contains('Esi - commande')

    cy.get('nav').contains('Produits').click()
    cy.visit('localhost:8000/produits').contains('Tous les produits')
    
    cy.get('nav').contains('Categories').click()
    cy.visit('localhost:8000/categories').contains('Liste de toutes les catégories')

    cy.get('nav').contains('Groupes').click()
    cy.visit('localhost:8000/groups').contains('Liste des différents groupes')

    cy.visit('localhost:8000/order').contains('Contenu du panier')

    cy.get('nav').contains('Connexion').click()
    cy.visit('localhost:8000/connexion').contains('Connexion')
  })
})