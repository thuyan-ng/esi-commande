describe('All groups', () => {
    it('Checks if all groups are displayed', () => {
      cy.visit('localhost:8000/groups')
      
      cy.get('#groups').select('E00')
      cy.get('#groups').select('E11')
      cy.get('#groups').select('E12')
    })
  })

  describe('Select group', () => {
    it('Checks if all groups are selectable', () => {
      cy.visit('localhost:8000/groups')
      
      cy.get('#groups').select('E00')
      cy.get('#groups').should('have.value', 'E00')
      cy.get('#groups').select('E11')
      cy.get('#groups').should('have.value', 'E11')
      cy.get('#groups').select('E12')
      cy.get('#groups').should('have.value', 'E12')
    })

    it('Checks if the students in selected group are displayed', () => {
        cy.get('#submit').click()
        cy.contains('Groupe')
    })
  })