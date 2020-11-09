describe('Your order', () => {
    it('Checks if all ordered products are displayed', () => {
      cy.visit('localhost:8000/order')
  
      if("{{Session::get('currentOrder')}}" === null ){
        cy.contains('Aucun article dans le panier pour le moment')
      } else {
          cy.get("#buy-button").click()
          cy.contains('Votre commande a été effectuée!')
      }
    })
  })