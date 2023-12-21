/**
 * Mocking client-server processing
 */
import axios from 'axios';

export default {
  async fetchUsers() {
    const res = await axios.get('/users');
    return res.data;
  },

  async fetchUser(userId) {
    const res = await axios.get('/users/'+userId);
    return res.data;
  },

  async saveUser(user) {
    await axios.post('/users', user);
  },

  async changePassword(id, data) {
    await axios.post('/users/' + id + '/change-password', data);
  },

}