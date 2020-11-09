describe('Connexion page', () => {
    it('Checks if can log in', () => {
      cy.visit('localhost:8000/connexion')
  
      cy.contains('Connexion')
      cy.contains('Créer un nouveau compte')

      cy.contains('Login')
      cy.contains('Mot de passe')
      cy.get('.form-update').submit()
    })
  })

  describe('Create a new account page', () => {
    it('Checks if can create a new account', () => {
      cy.visit('localhost:8000/addStudent')
  
      cy.contains('Login')
      cy.contains('Nom')
      cy.contains('Prénom')
      cy.contains('Mot de passe')
      cy.contains('Groupe')
      cy.contains('Confirmer')
    })
  })