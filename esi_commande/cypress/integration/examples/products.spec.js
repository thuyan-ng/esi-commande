describe('All products', () => {
    it('Checks if all products are displayed', () => {
      cy.visit('localhost:8000/produits')
  
      cy.contains('BENQ - GW2280 21.5"/1920X1080/3000:1/5MS')
      cy.contains('MSI - Optix MAG341CQ 24" UWQHD/244Hz Gaming Monito')
      cy.contains('Logitech - Keyboard K120 for Business')
      cy.contains('Rapoo')
      cy.contains('Microsoft - Surface Pro 7')
      cy.contains('Apple - MacBook pro 2019')
    })
  })

  describe('Add to cart button', () => {
    it('Checks if add to cart button is clickable', () => {
      cy.visit('localhost:8000/produits')
      cy.get('.product-button').click({multiple : true})
    })
  })