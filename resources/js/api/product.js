/**
 * Mocking client-server processing
 */
import axios from 'axios';

export default {
  async fetchProducts() {
    const res = await axios.get('/products');
    return res.data;
  },

  async fetchProduct(productId) {
    const res = await axios.get('/products/'+productId);
    return res.data;
  },

  async postProduct(product) {
    await axios.post('/product', product);
  },
}