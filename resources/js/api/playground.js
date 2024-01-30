import axios from 'axios';

export default {
  async fetchPlaygrounds() {
    const res = await axios.get('/vue-playgrounds');
    return res.data;
  },

  async fetchPlayground(playgroundId) {
    const res = await axios.get('/vue-playgrounds/' + playgroundId);
    return res.data;
  },

  async updatePlayground(playgroundId, playground) {
    await axios.put('/vue-playgrounds/' + playgroundId, playground);
  },

  // async deletePlayground(playgroundId) {
  //   await axios.delete('/vue-playgrounds/delete/' + playgroundId);
  // },

};