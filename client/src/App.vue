<!-- client/src/App.vue -->
<template>
  <div id="app">
    <header>
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
}

header {
}

main {
  margin: 0 auto;
}
</style>
