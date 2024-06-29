<!-- client/src/App.vue -->
<template>
  <div id="app">
    <header>
      <h1>Aktuarska</h1>
    </header>
    <main>
      <LiveEditor />
    </main>
  </div>
</template>

<script>
import LiveEditor from './components/LiveEditor.vue';

export default {
  name: 'App',
  components: {
    LiveEditor,
  },
};
</script>

<style>
#app {
  font-family: Arial, Helvetica, sans-serif;
  margin: 20px;
}

header {
  text-align: center;
  margin-bottom: 20px;
}

main {
  max-width: 600px;
  margin: 0 auto;
}
</style>
