<!-- client/src/components/LiveEditor.vue -->
<template>
  <div>
    <textarea v-model="content" @input="updateContent"></textarea>
  </div>
</template>

<script>
export default {
  data() {
    return {
      content: '',
      ws: null,
    };
  },
  created() {
    this.ws = new WebSocket('ws://localhost:8080'); // Povezivanje s web server socketom

    // Obrada dolaznih poruka od WebSocket servera
    this.ws.onmessage = event => {
      this.content = event.data; // Ažuriranje podataka
    };
  },
  methods: {
    updateContent() {
      // Slanje podataka kao string
      this.ws.send(this.content);
    },
  },
  beforeUnmount() {
    // Zatvori WebSocket konekciju
    this.ws.close();
  },
};
</script>

<style scoped>
textarea {
  width: 100%;
  height: 400px;
}
</style>
