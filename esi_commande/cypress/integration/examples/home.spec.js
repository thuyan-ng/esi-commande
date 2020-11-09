describe('Home page', () => {
    it('Visits the home page', () => {
      cy.visit('localhost:8000')
  
      cy.contains('Esi - commande')
      
      cy.get('nav').contains('Accueil')
      cy.get('nav').contains('Produits')
      cy.get('nav').contains('Categories')
      cy.get('nav').contains('Groupes')
      cy.get('nav').contains('Connexion')
    })
  })